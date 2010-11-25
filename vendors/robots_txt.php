<?php

	/* Robots.txt interpreter. Version 1.2

		Change Log

		1.2	* Bug fix for dumb author(!)
		1.1	* Bug fix for domain names that have non-word and/or non-digit characters
			* Added doxygen documentation
		1.0	Original Release

		Copyright (c) Andy Pieters <Pieters.Andy@gmail.com>

		This software is released under the terms of the GPL v3, as found on http://www.gnu.org/licenses/gpl-3.0.txt
		
		Abstract

		Robots exclusion standard is considered propper netiquette, so any kind of script that exhibits
		crawling-like behavior is expected to abide by it.

		The intended use of this class is to feed it a url before you intend to visit it. The class will
		automatically attempt to read the robots.txt file and will return a boolean value to indicate if
		you are allowed to visit this url.

		Maximum Crawl-delays and request-rates maxed-out at 60seconds.

		The class will block until the detected crawl-delay (or request-rate) allows visiting the url.

		For instance, if Crawl-delay is set to 3, the Robots_txt::urlAllowed() method will block for 3
		seconds when called a second time. An internal clock is kept with the last visited time, so if
		the delay is already expired, the method will not block.

		Example usage

		foreach($arrUrlsToVisit as $strUrlToVisit) {

			if(Robots_txt::urlAllowed($strUrlToVisit,$strUserAgent)) {

				#visit url, do processing. . . 
			}
		}

		The simple example above will ensure you abide by the wishes of the site owners.

		Note: an unofficial non-standard extension exists, that limits the times that crawlers
			  are allowed to visit a site. I choose to ignore this extension because I feel it
			  is unreasonable.

		Note: You are only *required* to specify your userAgent the first time you call the urlAllowed method, and
			  only the first value is ever used.

		For the real geeks out there, note that the way I set it up, I require the use of a public method, but only
		inside the class can an instance be created, and no instance is ever returned to the outside. So, is it still
		a public method? */

	/** @brief Robots_txt class
		@author Andy Pieters @a Pieters.Andy@gmail.com

		The intended use of this class is to feed it a url before you intend to visit it. The class will
		automatically attempt to read the robots.txt file and will return a boolean value to indicate if
		you are allowed to visit this url. */
	class Robots_txt {

		/** @brief The useragent name to use when evaluating robots.txt files */
		protected $strUserAgent;

		/** @brief Internal array to cache some rules. The '-' index is for disallows, the '+' index is for allows */
		protected $arrRules=array('-'=>array(), '+'=>array());

		/** @brief Cached crawl delay */
		protected $intDelay=0;

		/** @brief Internal variable to log last visit date/time */
		protected $intLastVisit=null;

		/** @brief Cached hostname  to crawl */
		protected $strHost=null;

		/** @brief Internal variable to cache instances of this class */
		protected static $arrInstances=array();

		/** @brief Internal variable to store useragent name */
		protected static $strReportedUserAgent=null;

		/** @brief Class constructor, can only be called from inside the class (or its children)
			@param $strUrl the url that robots.txt is located on
			@param $strUserAgent the useragent name */
		protected function __construct($strUrl,$strUserAgent) {

			$parsed = parse_url($strUrl);
			
			$this->init($parsed['scheme'],$parsed['host'],$strUserAgent);
		}
		
		/** @brief Initializes this instance, retrieves the robots.txt file and parses it
			@param $strScheme the protocol the host is on (http,https)
			@param $strHost the host to crawl,check robots.txt
			@param $strUserAgent the useragent name
			@throws Exception in case empty parameters are passed */
		protected function init($strScheme,$strHost,$strUserAgent) {

			if( (strlen(($this->strUserAgent=$strUserAgent))) && (strlen(($this->strScheme=$strScheme))) && (strlen(($this->strHost=$strHost)))) {

				$this->parseFile($strUserAgent,file_get_contents("$strScheme://$strHost/robots.txt"));
				
			} else {

				throw new Exception('Syntax: new Robots_txt($strScheme,$strHost,$strUserAgent)');
			}
			
		}

		/** @brief Parses a robots.txt file
			@param $strUserAgent The useragent name to use when looking for matches
			@param $strRobotsFile The contents of a robots.txt file */
		protected function parseFile($strUserAgent,$strRobotsFile) {

			if(strlen($strRobotsFile)) {

				#convert end of line markers. Expected: CR or CR/LF, or LF
				#What it does: it converts all CR/LF to LF, and then converts all CR to LF. So the expected output always has LF as line endings

				$strRobotsFile=str_replace(array("\r\n","\r"),"\n",$strRobotsFile);
			
				if((($intCount=count((($arrRules=explode("\n",$strRobotsFile))))))) {

					$blUserAgentMatched=$blReadAgent=false;
					
					for($intCounter=0; $intCounter<$intCount; $intCounter++) {

						if( (strlen(($strLine=trim($arrRules[$intCounter])))) && (!(preg_match('/^\s*#.*$/',$strLine)))) {

							#I know, the strpos function may return 0, but if the : is the first character, I can't use the input anyway

							if(strpos($strLine,':')) {

								$arrNameValuePair=explode(':',$strLine);

								$strCommand=trim(strtolower($arrNameValuePair[0]));

								$strArgument=trim($arrNameValuePair[1]);

								switch($strCommand) {

									case 'user-agent': {

										/** ``The value of this field is the name of the robot the record is describing access policy for.
											  If more than one User-agent field is present the record describes an identical access policy
											  for more than one robot. At least one field needs to be present per record.

											  The robot should be liberal in interpreting this field. A case insensitive substring match of
											  the name without version information is recommended.

											  If the value is '*', the record describes the default access policy for any robot that has not
											  matched any of the other records. It is not allowed to have multiple such records in the "/robots.txt" file.
										*/

										#Replace non-standards extension of using * inside the User-agent string, like Mediapartners-Google*
										#since we are already doing a substring match, it is not needed anyway

										$strArgument=preg_replace('#\w\*#',null,$strArgument);

										#case insensitive substring match it is then

										if( (!$blReadAgent) && (!$blUserAgentMatched) && (($strArgument=='*') || (stripos($strUserAgent,$strArgument)!==false))) {

											$blUserAgentMatched=true;
										}

										break;
									}

									case 'disallow': {

										if($blUserAgentMatched && ($strArgument)) {

											/** @NOTE 	Although it is not a stable standard extension to use * to mean exclude all pages,
														We will add support for it here */
														
											$this->arrRules['-'][]=($strArgument=='*'?'/':$strArgument);
										}

										break;
									}

									/* non-standard extension */

									case 'allow': {
									
										if($blUserAgentMatched && ($strArgument)) {

											/** @NOTE 	Although it is not a stable standard extension to use * to mean exclude all pages,
														We will add support for it here */
														
											$this->arrRules['+'][]=($strArgument=='*'?'/':$strArgument);
										}

										break;
									}

									/* non-standard extension */
									case 'request-rate': {

										if(preg_match('#^(\d+)\s*/\s*(\d+)$#',$strArgument,$arrMatches)) {

											if((int) $arrMatches[2]) {

												$fltDelay=abs((int) $arrMatches[2]/(int) $arrMatches[1]);

												if((int) $fltDelay!=$fltDelay) {

													$fltDelay=((int) $fltDelay)+1;
												}
											}
										}
									}

									#fall through to crawl-delay
									
									case 'crawl-delay': {

										if($blUserAgentMatched && ((int) $strArgument)) {

											#a delay of more then a minute is in my humble opinion unreasonable
											#so anything above 60 seconds is truncated

											$intDelay=abs((int) $strArgument);

											$intDelay=($intDelay>59?60:$intDelay);

											$this->intDelay=$intDelay;

										}

									}

									break;
								}
							}
							
						} else {

							#anything that is not a directive, means end of matched userAgent

							if($blUserAgentMatched) {

								$blReadAgent=true;
							}
							
							$blUserAgentMatched=false;
						}
					}
				}
			}
		}

		/** @brief Internal backend for static member urlAllowed
			@param $strUrl The url to check */
		public function __urlAllowed($strUrl) {

			$blOut=false;

			#check if we are allowed to crawl this url. CASE MATTERS

			$blMatched=false;

			# Order: Deny,Allow (Deny has priority over Allow)
			if(count($this->arrRules['-'])) {

				foreach($this->arrRules['-'] as $strRule) {

					#To Exclude, we check if the url starts with the rule
					
					if($strRule=='/' || (strpos($strUrl,$strRule)===0)) {
							
						$blMatched=true;

						break;
					}
				}
			}
								
			if(($blMatched) && (count($this->arrRules['+']))) {

				foreach($this->arrRules['+'] as $strRule) {

					#To override an exclude, an exact match is required in the include

					if($strRule=='/' || ($strUrl==$strRule)) {

						$blMatched=$blOut=true;

						break;
					}
				}
				
			}

			$blOut=(!$blMatched?true:$blOut);

			$intExpire=$this->intLastVisit+$this->intDelay;

			if($blOut) {

				#blocking is only necessary if we ARE allowed to visit
					
				while($intExpire>time()) {

					usleep(100000);
				}

				$this->intLastVisit=time();
			}

			return $blOut;
		}

		/** @brief Check if the scheme (protocol is supported)
			@param $strUrl The url to check
			@param $arrResult The url split in its components (scheme,host,url); passed by reference
			@returns boolean */
		public static function isSupportedScheme($strUrl,array &$arrResult=null) {

			$blOut=false;

			if(strlen(($strUrl=trim(strtolower($strUrl))))) {

				# Version 1.1: added -_ as supported characters in domain name, and added 'u' (unicode) pattern modifier
				if(preg_match('#^(https?)://([\w\d\-_]+(\.[\w\d\-_]+)+)(/*.*)$#u',$strUrl,$arrMatches)) {

					$strUrl=trim($arrMatches[4]);

					$strUrl=($strUrl==''?'/':$strUrl);
					
					$arrResult=array('scheme'=>$arrMatches[1],
									 'host'=>$arrMatches[2],
									 'url'=>$strUrl);

					$blOut=true;
				}
			}

			return $blOut;
		}

		/** @brief Class factory
			@param $strScheme the protocol the host is on (http,https)
			@param $strHost the host to crawl,check robots.txt
			@param $strUserAgent the useragent name
			@returns instance of Robots_txt class */
		protected static function &getInstance($strScheme,$strHost,$strUserAgent) {

			$objOut=null;

			if((($intCount=count(self::$arrInstances)))) {

				for($intCounter=0; $intCounter<$intCount; $intCounter++) {

					if(self::$arrInstances[$intCounter]->strHost==$strHost && self::$arrInstances[$intCounter]->strScheme==$strScheme) {

						$objOut=self::$arrInstances[$intCounter];

						break;
					}
				}
			}

			if(!$objOut) {

				$objOut=new Robots_txt($strScheme,$strHost,$strUserAgent);

				self::$arrInstances[]=$objOut;
			}

			return $objOut;
		}

		/** @brief Checks if the url may be crawled
			@param $strUrl the url to check
			@param $strUserAgent the useragent name
			@returns boolean
			@throws Exception if $strUserAgent is missing on first call, if an instance cannot be created, or if an invalid url is passed */
		public static final function urlAllowed($strUrl,$strUserAgent=null) {

			$blOut=null;
			
			//check userAgent

			$strUserAgent=trim($strUserAgent);

			if(is_null(self::$strReportedUserAgent) && (strlen($strUserAgent))) {

				self::$strReportedUserAgent=$strUserAgent;
			}

			if(is_null(self::$strReportedUserAgent)) {

				throw new Exception('strUserAgent is required on first call to Robots_txt::urlAllowed()');
			}

			if(self::isSupportedScheme($strUrl,$arrResult)) {

				if((($objEngine=self::getInstance($arrResult['scheme'],$arrResult['host'],self::$strReportedUserAgent)))) {

					$blOut=$objEngine->__urlAllowed($arrResult['url']);
					
				} else {

					throw new Exception('Cannot get Robots_txt instance.');
				}
			} else {

				throw new Exception('Invalid URL');
			}

			return $blOut;
		}
	}