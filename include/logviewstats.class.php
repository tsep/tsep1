<?php

/**
 * @package The Search Engine Project
 * @version 1.0
 * @copyright (C) 2005 by TSEP Development Team
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @since TSEP 0941
 * @tables tsep_log
 * @author Toon Goedhart
 *
 * following will be filled automatically by SubVersion!
 * Do not change by hand!
 *  $LastChangedDate: 2005-06-11 18:55:44 +0200 (Sa, 11 Jun 2005) $
 *  @lastedited $LastChangedBy: toon $
 *  $LastChangedRevision: 134 $
 *
*/


/** 
 * This class handles all statistics calculations on the _log table.
 **/
class logviewStats {
	
	var $_tableName = null;
	var $_TSEPDBConnection = null;
	var $_DomainUnresolved = null;
	var $_IPNotLogged = null;
	
	/**
     * Constructor
     * @access protected
     */
	function logviewStats() {
		global  $tsep_lng;
		
		$this->_tableName = db::$prefix."log";
		$this->_TSEPDBConnection = $tsepdbconnection;
		$this->_DomainUnresolved = $tsep_lng["logviewstats_DomainUnresolved"];
		$this->_IPNotLogged = $tsep_lng["logview_no_IP"];
	}
	
	/**
	 * Counts the number of records in the _log table
	 * 
	 * @access public
	 * @return integer Number of records 
	 **/
	function getNrRecords() {
		$qry = "SELECT count(idlog) FROM ".$this->_tableName;
		$result = mysql_query( $qry, $this->_TSEPDBConnection ) or die( mysql_error() );
		if ( mysql_num_rows($result) > 0 ) {
			list( $nrRecords ) = mysql_fetch_row( $result );
		}
		
		return $nrRecords;
	}
	
	/**
	 * Counts the number of setup entries on results (logtype = 0)
	 * 
	 * @access public
	 * @return integer Number of setup entries 
	 **/
	function getNrSetupEntries() {
		return $this->_getNrLogStrings( 0 );
	}
	
	/**
	 * Counts the number of search queries (logtype = 1)
	 * 
	 * @access public
	 * @return integer Number of search queries 
	 **/
	function getNrSearchQueries() {
		return $this->_getNrLogStrings( 1 );
	}
	
	/**
	 * Counts the number of clicks on results (logtype = 2)
	 * 
	 * @access public
	 * @return integer Number of URL clicks 
	 **/
	function getNrClicks() {
		return $this->_getNrLogStrings( 2 );
	}
	
	/**
	 * Counts the distinct searchwords.
	 * This routine takes the stopwords that were defined
	 * at the time of the searchquery into account.
	 * It doesn't check if the searchword is a stopword now.
	 * 
	 * @access public
	 * @return integer All distinct searchwords
	 **/
	function getNrSearchwords() {
		$allWords = array();
		
		$qry = "SELECT logstring, stopwords FROM ".$this->_tableName." WHERE typeoflog=1";
		$result = mysql_query( $qry, $this->_TSEPDBConnection ) or die( mysql_error() );
		
		if ( mysql_num_rows($result) > 0 ) {
		
			while ( list( $searchString, $stopwords ) = mysql_fetch_row( $result ) ) {
				$tmpWords = str_word_count( $searchString, 1 );
				$tmpStopwords = str_word_count( $stopwords, 1 );
				
				foreach ( $tmpWords as $word ) {
					/**
					 * If the word wasn't a stopword at the time of the
					 * searchqueries execution it can be indexed.
					 **/
					if ( array_search( $word, $tmpStopwords ) === FALSE ) {
						
						$word = strtolower( $word );
						if ( array_search( $word, $allWords ) === FALSE ) {
						    $allWords[] = $word;
						}
					}
				} // foreach
			} // while
		}
		
		if ( count( $allWords ) > 0 ) {
			return count( $allWords );
		} else {
			return 0;
		}
	}
	
	/**
	 * Counts the distinct stopwords
	 * 
	 * @access public
	 * @return integer All distinct stopwords
	 **/
	function getNrStopwords() {
		$allWords = array();
		
		$qry = "SELECT DISTINCT stopwords FROM ".$this->_tableName." WHERE typeoflog=1";
		$result = mysql_query( $qry, $this->_TSEPDBConnection ) or die( mysql_error() );
		
		if ( mysql_num_rows($result) > 0 ) {
		
			while ( list( $searchString ) = mysql_fetch_row( $result ) ) {
				$tmpWords = str_word_count( $searchString, 1 );
				
				foreach ( $tmpWords as $word ) {
					$word = strtolower( $word );
					
					if ( array_search( $word, $allWords ) === FALSE ) {
					    $allWords[] = $word;
					}
				} // foreach
			} // while
		}
		
		if ( count( $allWords ) > 0 ) {
			return count( $allWords );
		} else {
			return 0;
		}
	}
	
	/**
	 * Counts the number of distinct ip addresses
	 * 
	 * @access public
	 * @return integer Number of ip addresses
	 **/
	function getNrIPs() {
		$qry = "SELECT DISTINCT ip FROM ".$this->_tableName;
		$result = mysql_query( $qry, $this->_TSEPDBConnection ) or die( mysql_error() );
		$nrRecords = mysql_num_rows($result);
		
		return $nrRecords;
	}
	
	/**
	 * Counts the number of distinct domains
	 * 
	 * @access public
	 * @return integer Number of domains
	 **/
	function getNrDomains() {
		$qry = "SELECT DISTINCT ipresolved FROM ".$this->_tableName;
		$result = mysql_query( $qry, $this->_TSEPDBConnection ) or die( mysql_error() );
		$nrRecords = mysql_num_rows($result);
		
		return $nrRecords;
	}
	
	/**
	 * Gets the top X searchqueries
	 * 
	 * @access public
	 * @param integer $top The top number of searchqueries to return
	 * @return array Top X searchqueries 
	 **/
	function getTopSearchqueries( $top ) {
		return $this->_getTopX( $top, 1 );
	}

	/**
	 * Gets the top X clicks
	 * 
	 * @access public
	 * @param integer $top The top number of clicks to return
	 * @return array Top X clicks 
	 **/
	function getTopClicks( $top ) {
		return $this->_getTopX( $top, 2 );
	}
	
	/**
	 * Gets the top X unique searchwords.
	 * This routine takes the stopwords that were defined
	 * at the time of the searchquery into account.
	 * It doesn't check if the searchword is a stopword now.
	 * 
	 * @access public
	 * @param integer $top Top number of searchwords to return
	 * @return integer All distinct searchwords
	 **/
	function getTopSearchwords( $top ) {
		/**
		 * PHP doesn't allow a function to be declared multiple times.
		 * If _getTopX is called more than once the function "_compareTopXDesc"
		 * would be declared more than once and PHP will choke.
		 **/
		if ( !function_exists( "_compareTopXSearchWordsDesc" ) ) {
			/**
			 * This routine is called by usort to
			 * aid in sorting the array descending on count.
			 **/
			function _compareTopXSearchWordsDesc( $a, $b ) {
				if ($a['count'] == $b['count']) {
					return 0;
				} elseif ($a['count'] > $b['count']) {
					return -1;
				} else {
					return 1;
				}
			} // _compareTopXSearchWordsDesc
		}

		/**
		 * The array that holds all distinct words
		 **/
		$allWords = array();
		/**
		 * This array is an index to $allWords.
		 * It's used because "array_search" can't handle 
		 * multi-dimensional arrays.
		 **/
		$allWordsIndex = array();
		$i = 0;
		
		$qry = "SELECT logstring, stopwords FROM ".$this->_tableName." WHERE typeoflog=1";
		$result = mysql_query( $qry, $this->_TSEPDBConnection ) or die( mysql_error() );
		
		if ( mysql_num_rows($result) > 0 ) {
		
			while ( list( $searchString, $stopwords ) = mysql_fetch_row( $result ) ) {
				$tmpWords = str_word_count( $searchString, 1 );
				$tmpStopwords = str_word_count( $stopwords, 1 );
				
				foreach ( $tmpWords as $word ) {
					/**
					 * If the word wasn't a stopword at the time of the
					 * searchqueries execution it can be indexed.
					 **/
					if ( array_search( $word, $tmpStopwords ) === FALSE ) {

						$word = strtolower( $word );
						
						$row = array_search( $word, $allWordsIndex );
						if ( $row === FALSE ) {
						    /**
						     * Register the new string in the array
						     **/
						    $allWords[$i]["string"] = $word;
							$allWords[$i]["count"] = 1;
							
							/**
							 * Register the word in the index
							 **/
							$allWordsIndex[$i] = $word;
	
							$i++;
						} else {
							$allWords[$row]["count"]++;
						}
					} // if
				} // foreach
			} // while
		}
		
		unset( $allWordsIndex );
		usort( $allWords, "_compareTopXSearchWordsDesc" );
		
		/**
		 * If $top == 0 then show all records.
		 * Otherwise show top $top records.
		 **/
		if ( $top > 0 ) {
			$allWords = array_slice( $allWords, 0, $top );
		}
		
		return $allWords;
	}
	
	/**
	 * Gets the top X unique topwords
	 * 
	 * @access public
	 * @param integer $top Top number of topwords to return
	 * @return integer All distinct topwords
	 **/
	function getTopStopwords( $top ) {
		/**
		 * PHP doesn't allow a function to be declared multiple times.
		 * If _getTopX is called more than once the function "_compareTopXDesc"
		 * would be declared more than once and PHP will choke.
		 **/
		if ( !function_exists( "_compareTopXStopWordsDesc" ) ) {
			/**
			 * This routine is called by usort to
			 * aid in sorting the array descending on count.
			 **/
			function _compareTopXStopWordsDesc( $a, $b ) {
				if ($a['count'] == $b['count']) {
					return 0;
				} elseif ($a['count'] > $b['count']) {
					return -1;
				} else {
					return 1;
				}
			} // _compareTopXStopWordsDesc
		}

		/**
		 * The array that holds all distinct words
		 **/
		$allWords = array();
		/**
		 * This array is an index to $allWords.
		 * It's used because "array_search" can't handle 
		 * multi-dimensional arrays.
		 **/
		$allWordsIndex = array();
		$i = 0;
		
		$qry = "SELECT stopwords FROM ".$this->_tableName." WHERE typeoflog=1";
		$result = mysql_query( $qry, $this->_TSEPDBConnection ) or die( mysql_error() );
		
		if ( mysql_num_rows($result) > 0 ) {
		
			while ( list( $searchString ) = mysql_fetch_row( $result ) ) {
				$tmpWords = str_word_count( $searchString, 1 );
				
				foreach ( $tmpWords as $word ) {
					$word = strtolower( $word );
					
					$row = array_search( $word, $allWordsIndex );
					if ( $row === FALSE ) {
					    /**
					     * Register the new string in the array
					     **/
					    $allWords[$i]["string"] = $word;
						$allWords[$i]["count"] = 1;
						
						/**
						 * Register the word in the index
						 **/
						$allWordsIndex[$i] = $word;

						$i++;
					} else {
						$allWords[$row]["count"]++;
					}
				} // foreach
			} // while
		}
		
		unset( $allWordsIndex );
		usort( $allWords, "_compareTopXStopWordsDesc" );
		
		/**
		 * If $top == 0 then show all records.
		 * Otherwise show top $top records.
		 **/
		if ( $top > 0 ) {
			$allWords = array_slice( $allWords, 0, $top );
		}
		
		return $allWords;
	}
	
	/**
	 * Gets the top X number of distinct ip addresses
	 * 
	 * @access public
	 * @param integer $top Top number of records to return
	 * @return array Top x number of ip addresses
	 **/
	function getTopIPs( $top ) {
		/**
		 * PHP doesn't allow a function to be declared multiple times.
		 * If _getTopX is called more than once the function "_compareTopXIPsDesc"
		 * would be declared more than once and PHP will choke.
		 **/
		if ( !function_exists( "_compareTopXIPsDesc" ) ) {
			/**
			 * This routine is called by usort to
			 * aid in sorting the array descending on count.
			 **/
			function _compareTopXIPsDesc( $a, $b ) {
				if ($a['count'] == $b['count']) {
					return 0;
				} elseif ($a['count'] > $b['count']) {
					return -1;
				} else {
					return 1;
				}
			} // _compareTopXIPsDesc
		}

		/**
		 * The array that holds all distinct words
		 **/
		$allIPs = array();
		/**
		 * This array is an index to $allIPs.
		 * It's used because "array_search" can't handle 
		 * multi-dimensional arrays.
		 **/
		$allIPsIndex = array();
		$i = 0;
		
		$qry = "SELECT ip FROM ".$this->_tableName;
		$result = mysql_query( $qry, $this->_TSEPDBConnection ) or die( mysql_error() );
		
		if ( mysql_num_rows($result) > 0 ) {
		
			while ( list( $IPAddress ) = mysql_fetch_row( $result ) ) {
				if ( $IPAddress == "" ) {
				    $IPAddress = $this->_IPNotLogged;
				}
				
				$row = array_search( $IPAddress, $allIPsIndex );
				if ( $row === FALSE ) {
				    /**
				     * Register the new string in the array
				     **/
				    $allIPs[$i]["string"] = $IPAddress;
					$allIPs[$i]["count"] = 1;
					
					/**
					 * Register the word in the index
					 **/
					$allIPsIndex[$i] = $IPAddress;

					$i++;
				} else {
					$allIPs[$row]["count"]++;
				}
			} // while
		}
		
		unset( $allIPsIndex );
		usort( $allIPs, "_compareTopXIPsDesc" );
		
		/**
		 * If $top == 0 then show all records.
		 * Otherwise show top $top records.
		 **/
		if ( $top > 0 ) {
			$allIPs = array_slice( $allIPs, 0, $top );
		}
		
		return $allIPs;
	}
	
	/**
	 * Gets the top X number of distinct domains
	 * 
	 * @access public
	 * @param integer $top Top number of records to return
	 * @return array Top x number of domains
	 **/
	function getTopDomains( $top ) {
		/**
		 * PHP doesn't allow a function to be declared multiple times.
		 * If _getTopX is called more than once the function "_compareTopXDomainsDesc"
		 * would be declared more than once and PHP will choke.
		 **/
		if ( !function_exists( "_compareTopXDomainsDesc" ) ) {
			/**
			 * This routine is called by usort to
			 * aid in sorting the array descending on count.
			 **/
			function _compareTopXDomainsDesc( $a, $b ) {
				if ($a['count'] == $b['count']) {
					return 0;
				} elseif ($a['count'] > $b['count']) {
					return -1;
				} else {
					return 1;
				}
			} // _compareTopXDomainsDesc
		}

		/**
		 * The array that holds all distinct words
		 **/
		$allDomains = array();
		/**
		 * This array is an index to $allDomains.
		 * It's used because "array_search" can't handle 
		 * multi-dimensional arrays.
		 **/
		$allDomainsIndex = array();
		$i = 0;
		
		$qry = "SELECT ipresolved FROM ".$this->_tableName;
		$result = mysql_query( $qry, $this->_TSEPDBConnection ) or die( mysql_error() );
		
		if ( mysql_num_rows($result) > 0 ) {
		
			while ( list( $Domain ) = mysql_fetch_row( $result ) ) {
				if ( $Domain == "" ) {
				    $Domain = $this->_DomainUnresolved;
				}
				
				$row = array_search( $Domain, $allDomainsIndex );
				if ( $row === FALSE ) {
				    /**
				     * Register the new string in the array
				     **/
				    $allDomains[$i]["string"] = $Domain;
					$allDomains[$i]["count"] = 1;
					
					/**
					 * Register the word in the index
					 **/
					$allDomainsIndex[$i] = $Domain;

					$i++;
				} else {
					$allDomains[$row]["count"]++;
				}
			} // while
		}
		
		unset( $allDomainsIndex );
		usort( $allDomains, "_compareTopXDomainsDesc" );
		
		/**
		 * If $top == 0 then show all records.
		 * Otherwise show top $top records.
		 **/
		if ( $top > 0 ) {
			$allDomains = array_slice( $allDomains, 0, $top );
		}
		
		return $allDomains;
	}
	
	/**
	 * Gets the number of logstrings
	 * @access protected
	 * @param integer $logType Type of logstring to return
	 * @return integer Nr of records
	 **/
	function _getNrLogStrings( $logType ) {
		$qry = "SELECT count(typeoflog) FROM ".$this->_tableName." WHERE typeoflog=$logType";
		$result = mysql_query( $qry, $this->_TSEPDBConnection ) or die( mysql_error() );
		if ( mysql_num_rows($result) > 0 ) {
			list( $nrRecords ) = mysql_fetch_row( $result );
		}
		
		return $nrRecords;
	}
	
	/**
	 * Gets the top X logstrings
	 * @access protected
	 * @param integer $top Number of top X records to return (0 = all)
	 * @param integer $logType Type of logstring to return
	 * @return array List with the top X logstrings
	 **/
	function _getTopX( $top, $logType ) {

		/**
		 * PHP doesn't allow a function to be declared multiple times.
		 * If _getTopX is called more than once the function "_compareTopXDesc"
		 * would be declared more than once and PHP will choke.
		 **/
		if ( !function_exists( "_compareTopXDesc" ) ) {
			/**
			 * This routine is called by usort to
			 * aid in sorting the array descending on count.
			 **/
			function _compareTopXDesc( $a, $b ) {
				if ($a['count'] == $b['count']) {
					return 0;
				} elseif ($a['count'] > $b['count']) {
					return -1;
				} else {
					return 1;
				}
			} // _compareTopXDesc
		}

		/**
		 * The array that holds all distinct clicks
		 **/
		$theLogStrings = array();
		/**
		 * This array is an index to $theLogStrings.
		 * It's used because "array_search" can't handle 
		 * multi-dimensional arrays.
		 * Values are stored as MD5 hash to save memory space.
		 **/
		$theLogStringsIndex = array();
		$i = 0;
		
		$qry = "SELECT logstring FROM ".$this->_tableName." WHERE typeoflog=$logType";
		$result = mysql_query( $qry, $this->_TSEPDBConnection ) or die( mysql_error() );
		if ( mysql_num_rows($result) > 0 ) {
			
			while ( list( $logString ) = mysql_fetch_row( $result ) ) {
				$logString = strtolower( $logString );
				$MD5logString = md5( $logString );
				
				$row = array_search( $MD5logString, $theLogStringsIndex );
				if ( $row === FALSE ) {
				    /**
				     * Register the new string in the array
				     **/
				    $theLogStrings[$i]["string"] = $logString;
					$theLogStrings[$i]["count"] = 1;
					
					/**
					 * Register the MD5 hash in the index
					 **/
					$theLogStringsIndex[$i] = $MD5logString;
					
					$i++;
				} else {
				    $theLogStrings[$row]["count"]++;
				}
			}
		}
		
		unset( $theLogStringsIndex );
		usort( $theLogStrings, "_compareTopXDesc" );

		/**
		 * If $top == 0 then show all records.
		 * Otherwise show top $top records.
		 **/
		if ( $top > 0 ) {
			$theLogStrings = array_slice( $theLogStrings, 0, $top );
		}
		
		return $theLogStrings;
	}
	
}
?>
