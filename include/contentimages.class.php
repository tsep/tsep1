<?php

/**
 * @package The Search Engine Project
 * @version 2.0
 * @copyright (C) 2005 by TSEP Development Team
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @since TSEP 0942
 * @tables tsep_internal
 * @author Manfred Jedlicka
 *
 * following will be filled automatically by SubVersion!
 * Do not change by hand!
 *  $LastChangedDate: 2005-07-09 10:49:37 +0200 (Sat, 09 Jul 2005) $
 *  @lastedited $LastChangedBy: manfred $
 *  $LastChangedRevision: 231 $
 *
*/

//require_once( "../include/global.php" );
require_once( TSEP_INCLUDE_DIR."/contentimages.class.php" );

/** 
 * Provides functionality to handle ContentImages 
 **/
class ContentImages {
	
	var $CONTENTPI_TYPE_DEFAULT = "default";
	
	var $CIFL_FN_PREFIX = "TSEP_CIFL_";
	var $CIFL_FNTF_PREFIX = "TSEP_CIFL_TF";
	
	var $museContentImages = false;
	var $mDefaultImageFileName = "";
	var $mDefaultImageFile = "";
	var $DefaultImageURL = "";
	var $DefaultImageGeometry = "";
	var $arrConfigContentPi;
	var $mPageUrl = "";
	var $mContentImageFile = "";
	var $mContentImageFileName = "";
	var $mContentImageFileExt = "";
	var $mContentImageURL = "";
	var $mContentImageType = "";
	
	var $mIndexerFilelistFile = "";
	var $mIndexerFilelistFileCt = 0;
	
	var $marrReplacePattern;
	
	/**
     * Constructor
     * @access protected
     */
	function ContentImages() {
		global $tsep_config;

		require_once( TSEP_INCLUDE_DIR."/configfunctions.php" );

		$this->marrReplacePattern = array();        
		$this->arrConfigContentPi = ReadValuesFromInternal("stringtag='configcontentimg'");
		$this->museContentImages = ( isset($this->arrConfigContentPi['configcontentimg_mode']) ? ( $this->arrConfigContentPi['configcontentimg_mode'] == "true" )  : false);
		$this->mContentImageFileExt = $this->arrConfigContentPi['configcontentimg_imageext'];
		if ($this->useContentImages() == false)
			return;

		if (!empty($this->arrConfigContentPi['configcontentimg_FnDefaultImage']))
			$this->mDefaultImageFileName = $this->arrConfigContentPi['configcontentimg_FnDefaultImage'] . $this->getContentImageFileExt();
		else
			$this->mDefaultImageFileName = "no_default_contentimage_defined";
		$this->DefaultImageURL = $this->arrConfigContentPi['configcontentimg_webpath'] . "/" . $this->mDefaultImageFileName;
		$this->mDefaultImageFile = $this->arrConfigContentPi['configcontentimg_abspath'] . "/" . $this->mDefaultImageFileName;
		$this->DefaultImageGeometry = $this->getContentImageGeometry($this->mDefaultImageFile);
	}
	
	/**
	 * sets diverse informations for the ContentImage, which has to be used by the given PageUrl
	 * (if no page-associated Image exists, the default-image is used)
	 * 
	 * @access public
	 * @return void 
	 **/
	function setPageURL($pPageUrl) {

		if ( $this->useContentImages() == false )
			return;
			
		$this->mPageUrl = $pPageUrl;

		$lMD5FileName = $this->buildMD5FileName($this->getPageURL()) . $this->getContentImageFileExt();
		$lMD5File = $this->arrConfigContentPi['configcontentimg_abspath'] . "/" . $lMD5FileName;
		$lMD5Url  = $this->arrConfigContentPi['configcontentimg_webpath'] . "/" . $lMD5FileName;
		if (is_file($lMD5File)) {
			$this->mContentImageFileName = $lMD5FileName;
			$this->mContentImageFile = $lMD5File;
			$this->mContentImageURL = $lMD5Url;
			$this->mContentImageType = "md5";
		} else {
			$this->mContentImageFileName = $this->mDefaultImageFileName;
			$this->mContentImageFile = $this->mDefaultImageFile;
			$this->mContentImageURL = $this->DefaultImageURL;
			$this->mContentImageType = $this->CONTENTPI_TYPE_DEFAULT;
		}
	}
	
	/**
	 * returns the currently set/used url
	 * 
	 * @access public
	 * @return void 
	 **/
	function getPageURL() {
		return ($this->mPageUrl);
	}

	/**
	 * returns true or false depending on the state of 'use'-ContentImages
	 * 
	 * @access public
	 * @return void 
	 **/
	function useContentImages() {
		return($this->museContentImages);
	}

	/**
	 * returns an URL of either an existing ContentImage, a default-image or "" if none
	 * 
	 * @access public
	 * @return void 
	 **/
	function getContentImageURL() {

		if ( $this->useContentImages() == false )
			return("");

	    return($this->mContentImageURL); 
	}

	/**
	 * delete the ContentImage associated to the set url (not the default-images)
	 * 
	 * @access public
	 * @return void 
	 **/
	function deleteContentImage() {
		if ( $this->useContentImages() == false )
			return("");
			
		if ( $this->getContentImageType() == $this->CONTENTPI_TYPE_DEFAULT )
			return("");
		unlink($this->getContentImageFile());
	}

	/**
	 * returns the name-part of the filename of either an existing ContentImage, a default-image or "" if none
	 * 
	 * @access public
	 * @return void 
	 **/
	function getContentImageFileName() {

		if ( $this->useContentImages() == false )
			return("");

	    return($this->mContentImageFileName); 
	}

	/**
	 * returns the filename extension to be used for ContentImages
	 * 
	 * @access public
	 * @return void 
	 **/
	function getContentImageFileExt() {
	    return($this->mContentImageFileExt); 
	}

	/**
	 * returns the 'absolute' filename of either an existing ContentImage, a default-image or "" if none
	 * 
	 * @access public
	 * @return void 
	 **/
	function getContentImageFile() {

		if ( $this->useContentImages() == false )
			return("");

	    return($this->mContentImageFile); 
	}

	/**
	 * returns the type of the ContentImage to be used for the set pageurl
	 *    'default'	if the page has no own ContentImage
	 *    'md5'		if the page has its own ContentImage
	 * 
	 * @access public
	 * @return void 
	 **/
	function getContentImageType() {

		if ( $this->useContentImages() == false )
			return("");

	    return($this->mContentImageType); 
	}
		
	/**
	 * Build md5-name
	 * 
	 * @access public
	 * @return void 
	 **/
	function buildMD5FileName($pUrl = false) {
		return(md5( ( $pUrl == false ) ? $this->getPageURL() : $pUrl ));
	}
	
	/**
	 * returns maxX-definition
	 * 
	 * @access public
	 * @return void 
	 **/
	function getContentImageMaxX() {

		if ( $this->useContentImages() == false )
			return("");

		return intval($this->arrConfigContentPi['configcontentimg_maxX']);
	}

	
	/**
	 * returns maxY-definition
	 * 
	 * @access public
	 * @return void 
	 **/
	function getContentImageMaxY() {

		if ( $this->useContentImages() == false )
			return("");

		return intval($this->arrConfigContentPi['configcontentimg_maxY']);
	}

	
	/**
	 * returns geometry of ContentImage to be used (as HTML-width-height-string)
	 * 
	 * @access public
	 * @return void 
	 **/
	function getContentImageGeometry($pFn = false) {

		if ( $this->useContentImages() == false )
			return("");

		$lFn = ( $pFn == false ) ? $this->getContentImageURL() : $pFn;
		
		$wMax = intval($this->arrConfigContentPi['configcontentimg_maxX']);
		$hMax = intval($this->arrConfigContentPi['configcontentimg_maxY']);

		$myImage = new imageTools($lFn);
		if ( $myImage->imageExists() )
			$lGeometry = $myImage->getShrinkedImageSizeHTML($wMax,$hMax);
		else
			$lGeometry = "width=$wMax height=$hMax";
		$myImage = NULL;

		return($lGeometry);
	}

	/**
	 * returns the filename extension for the transformation-file
	 * (the extension is retrieved from the admin-defined transformation-file)
	 * 
	 * @access private
	 * @return void 
	 **/
	function getFileListTransformExt($pTransformId) {

		if ( $this->useContentImages() == false )
			return("");

		if ( !preg_match("/\\.([^\\.]+)$/", $this->arrConfigContentPi["configcontentimg_flisttrans${pTransformId}_template_filename"], $lMatches ) )
			return "";
		else
			return($lMatches[0]);
	}

	/**
	 * returns the 'absolute' transformation-template-filename 
	 * 
	 * @access private
	 * @return void 
	 **/
	function getFileListTransformFnTemplate($pTransformId) {

		if ( $this->useContentImages() == false )
			return("");

		return ( $this->arrConfigContentPi["configcontentimg_abspath_flists"] . "/transformation_templates/" . $this->arrConfigContentPi["configcontentimg_flisttrans${pTransformId}_template_filename"] );
	}

	/**
	 * set the FilelistFilename providing the name-part of the file as parm
	 * the function respects parm given
	 * - with or without the "Content Image Filelist"-prefix and
	 * - with or without the extension ".txt"
	 * - a possibly path-part is removed
	 * blanks are replaced by '_'
	 * 
	 * @access public
	 * @return void 
	 **/
	function setIndexerFilelistFile($pIProfileName) {

		if ( $this->useContentImages() == false )
			return("");
		$lFileName = $pIProfileName;
		if ( preg_match("/\\/([^\\/]+)$/", $lFileName, $lMatches) ) // remove path
			$lFileName = $lMatches[1];
		if ( !preg_match("/^" . $this->CIFL_FN_PREFIX . "/", $lFileName))
			$lFileName = $this->CIFL_FN_PREFIX . $lFileName;
		$lFileName = preg_replace("/ /", "_", $lFileName);

		if ( !preg_match("/\\.txt$/", $lFileName))
			$lFileName .= ".txt";

		$this->mIndexerFilelistFile = $this->arrConfigContentPi['configcontentimg_abspath_flists'] . "/" . $lFileName;
	}

	/**
	 * returns an array of filelist- and filelist-transformation-files
	 * 
	 * array[][0] = type (0=filelist, 1=transformation1, 2=transformation2)
	 * array[][1] = abspath/filename 
	 * array[][2] = webpath/filename
	 * array[][3] = filename
	 * array[][4] = comment-string
	 * 
	 * the array is sorted by:
	 *  1. file-A
	 *  2. file-A-transform1 
	 *  3. file-A-transform2 
	 *  4. file-B
	 *  5. file-B-transform1 
	 *  6. file-B-transform2
	 *  ... 
	 * 
	 * @access public
	 * @return void 
	 **/
	function getContentImageFilelistDirFilelist() {

		if ( $this->useContentImages() == false )
			return(false);

		if ($d = @dir($this->arrConfigContentPi['configcontentimg_abspath_flists'])) {
			while ((@$entry = $d->read()) != "") {
				$labsFileName = $this->arrConfigContentPi['configcontentimg_abspath_flists'] . "/" . $entry;
				$lwebFileName = $this->arrConfigContentPi['configcontentimg_webpath_flists'] . "/" . $entry;
				if ( preg_match("/^" . $this->CIFL_FN_PREFIX . "(.+)\.txt/", $entry, $lMatches))
					$larrFn[$lMatches[1]."0"] = array(0, $labsFileName, $lwebFileName, $entry, "#");
				if ( preg_match("/^" . $this->CIFL_FNTF_PREFIX . "1_(.+)\\" . $this->getFileListTransformExt(1) . "$/", $entry, $lMatches))
					$larrFn[$lMatches[1]."1"] = array(1, $labsFileName, $lwebFileName, $entry, $this->arrConfigContentPi["configcontentimg_flisttrans1_comment"]);
				if ( preg_match("/^" . $this->CIFL_FNTF_PREFIX . "2_(.+)\\" . $this->getFileListTransformExt(2) . "$/", $entry, $lMatches))
					$larrFn[$lMatches[1]."2"] = array(2, $labsFileName, $lwebFileName, $entry, $this->arrConfigContentPi["configcontentimg_flisttrans2_comment"]);
			}
			@ksort($larrFn);
			return (isset($larrFn) ? $larrFn : false);
		}
		return(false);
	}

	/**
	 * initiates both transformations (if set)
	 *
	 * @access public
	 * @return void 
	 **/
	function doTransform() {

		if ( $this->useContentImages() == false )
			return("");
		if ( $this->getIndexerFilelistFile() == "" )
			return("");

		$lTransform1 = ( isset($this->arrConfigContentPi['configcontentimg_flisttrans1_active']) ? ( $this->arrConfigContentPi['configcontentimg_flisttrans1_active'] == "true" ) : false); 
		$lTransform2 = ( isset($this->arrConfigContentPi['configcontentimg_flisttrans2_active']) ? ( $this->arrConfigContentPi['configcontentimg_flisttrans2_active'] == "true" ) : false);
		
		if ( $lTransform1 == true )
			$this->doTransformFile(1);
		if ( $lTransform2 == true )
			$this->doTransformFile(2);
	}

	/**
	 * do the transformation and create the outputfile
	 * 
	 * @access private
	 * @return void 
	 **/
	function doTransformFile($pTransformId) {
		global $tsep_lng;
		
		if (!file_exists($this->getIndexerFilelistFile()))
			return ("");

		if (!preg_match("/^.+\/" . $this->CIFL_FN_PREFIX . "(.+)\.txt$/", $this->getIndexerFilelistFile(), $lMatches))
			return("");

		$lFileName = $lMatches[1];
		$lFileNameExt = $this->getFileListTransformExt($pTransformId);
		
		$lFnTemplate = $this->getFileListTransformFnTemplate($pTransformId);
		$lFnIn = $this->getIndexerFilelistFile();
		$lFnOut = $this->arrConfigContentPi['configcontentimg_abspath_flists'] . "/" . $this->CIFL_FNTF_PREFIX . $pTransformId . "_" . $lFileName . $lFileNameExt;

		// set replacement-patterns
		$this->setReplacePattern();
		$this->setReplacePattern("FNTRANS", $lFnOut);
		$lTmpFn = $this->arrConfigContentPi['configcontentimg_abspath_flists'] . "/" . $this->CIFL_FNTF_PREFIX . "1_" . $lFileName . $this->getFileListTransformExt(1);
		$this->setReplacePattern("FNTRANS1", $lTmpFn);
		$this->setReplacePattern("FNTRANS1DOS", preg_replace('/\//', '\\', $lTmpFn ));
		$lTmpFn = $this->arrConfigContentPi['configcontentimg_abspath_flists'] . "/" . $this->CIFL_FNTF_PREFIX . "2_" . $lFileName . $this->getFileListTransformExt(2);
		$this->setReplacePattern("FNTRANS2", $lTmpFn);
		$this->setReplacePattern("FNTRANS2DOS", preg_replace('/\//', '\\', $lTmpFn ));
		$this->setReplacePattern("IMAGE_FILEEXT", $this->getContentImageFileExt());
		$this->setReplacePattern("IMAGE_ABSPATH", $this->arrConfigContentPi['configcontentimg_abspath']);
		$this->setReplacePattern("IMAGE_ABSPATHDOS", preg_replace('/\//', '\\', $this->arrConfigContentPi['configcontentimg_abspath']));
		$this->setReplacePattern("IMAGE_WEBPATH", $this->arrConfigContentPi['configcontentimg_webpath']);

		$lComment = $this->arrConfigContentPi["configcontentimg_flisttrans${pTransformId}_comment"];
		
		$lhFnIn = fopen($lFnIn, "r");
		$lPageUrlCt = 0;
		$larrPAGES = array();
		while (!feof($lhFnIn)) {
			$lRec = fgets($lhFnIn);
			if ( trim($lRec) == "" )
				continue;
			if ( preg_match("/^#/", $lRec ))
				continue;
				
			preg_match("/^([^ ]+) +(.+) *$/", $lRec, $lMatches);
			$lPageUrl = $lMatches[2];
			
			$larrPAGES[] = array(	"PAGEURL"	=> $lPageUrl,
									"PAGENO"	=> ++$lPageUrlCt,
									"MD5NAME"	=> $this->buildMD5FileName($lPageUrl)
								);
		}
		fclose($lhFnIn);
		$this->setReplacePattern("PAGES", $larrPAGES);

		$larrTemplate = file($lFnTemplate);
		
		$lhFnOut = fopen($lFnOut, "w");
		fwrite($lhFnOut, "$lComment TSEP " . sprintf($tsep_lng['contentimg_filelistTF'], $pTransformId) . " - " . $this->arrConfigContentPi["configcontentimg_flisttrans${pTransformId}_template_filename"] . "\n");
		fwrite($lhFnOut, $this->runReplacePattern($larrTemplate));
		fclose($lhFnOut);
		return;
	}

	/**
	 * sets a replace-pattern for later replacement-use by runReplacePattern()
	 * 
	 * @access private
	 * @return void 
	 **/
	function setReplacePattern($pKey = false, $pData = false) {

		if ( $this->useContentImages() == false )
			return("");
			
		if ( $pKey == false ) { // empty array
			$this->marrReplacePattern = array();
			return;
		}

		$this->marrReplacePattern["\{$pKey\}"] = $pData;
	}

	/**
	 * replace patterns, previously defined via setReplacePattern()
	 * 
	 * This routine simulates a simple "smarttemplate.php"-engine and is thought to be replaced by
	 * smarttemplate, if we introduce it to TSEP
	 * 
	 * replacements, TSEP currently supports:
	 * 
	 * FNTRANS			'absolute' filename of the currently created transformation-file
	 * FNTRANS1			'absolute' filename of the transformation-file 1
	 * FNTRANS1DOS		'absolute' filename of the transformation-file 1 in DOS-syntax (backslash-path-delimiter)
	 * FNTRANS2			'absolute' filename of the transformation-file 2
	 * FNTRANS2DOS		'absolute' filename of the transformation-file 2 in DOS-syntax (backslash-path-delimiter)
	 * IMAGE_FILEEXT	filename extension used for ContentImages
	 * IMAGE_ABSPATH	'absolute' path, where ContentImages are stored
	 * IMAGE_ABSPATHDOS	'absolute' path, where ContentImages are stored in DOS-syntax (backslash-path-delimiter)
	 * IMAGE_WEBPATH	path for web-access, where ContentImages are stored
	 * within the block
	 * <!-- BEGIN PAGES -->
	 * 	PAGEURL			url of the page
	 * 	PAGENO			pagenumber (simple count of the page within the PAGES-block)
	 * 	MD5NAME			md5name associated to the PAGEURL
	 * <!-- END PAGES -->
	 * 
	 * @access private
	 * @return void 
	 **/
	function runReplacePattern($parrTempl) {

		if ( $this->useContentImages() == false )
			return("");

		$lOut = "";
		$lBlockInd = -1;
		$lBlockName = "";
		for ( $i=0; $i<count($parrTempl); $i++) {
			if ( preg_match("/<!-- +BEGIN +(.+) +-->/", $parrTempl[$i], $lMatches)) {
				$lStartLoop = ++$i;
				$lBlockName = $lMatches[1];
				$lBlockInd = 0;
			}
			
			if ( preg_match("/<!-- +END +(.+) +-->/", $parrTempl[$i], $lMatches))
				if ( ++$lBlockInd < count($this->marrReplacePattern['{'.$lBlockName.'\\}']) )
					$i = $lStartLoop;
				else {
					$i++;
					$lBlockInd = -1;
				}

			$lRec = $parrTempl[$i]; 					
			foreach ( $this->marrReplacePattern as $key1 => $data1) {
				if ( gettype($data1) == "array" ) {
					if ( $lBlockInd > -1 ) {
						if ( $key1 == '{'.$lBlockName.'\\}' ) {
							foreach ( $data1[$lBlockInd] as $key2 => $data2 ) {
								$key2 = '/\\{' . $key2 . '\\}/';
								$lRec = preg_replace($key2, $data2, $lRec);
							}
						}
					}
				} else {
					$key1 = '/' . $key1 . '/';
					$lRec = preg_replace($key1, $data1, $lRec);
				}
			}
			$lOut .= $lRec;
		}
		return($lOut);
	}

	/**
	 * delete the ContentImageFilelist-file
	 * 
	 * @access public
	 * @return void 
	 **/
	function initIndexerFilelistFile() {

		if ( $this->useContentImages() == false )
			return("");
		if ( $this->getIndexerFilelistFile() == "" )
			return("");

		@unlink($this->getIndexerFilelistFile());
		$this->mIndexerFilelistFileCt = 0;
	}

	/**
	 * returns the ContentImageFilelist-file
	 * 
	 * @access public
	 * @return void 
	 **/
	function getIndexerFilelistFile() {
		return($this->mIndexerFilelistFile);
	}

	/**
	 * appends an "md5name pageurl"-entry to the ContentImageFilelist-file 
	 * 
	 * @access public
	 * @return void 
	 **/
	function addIndexerFilelistFileEntry($pPageUrl) {
		if ( $this->useContentImages() == false )
			return("");

		$lMD5FileName = $this->buildMD5FileName($pPageUrl) . $this->getContentImageFileExt();
		$this->writetoIndexerFilelistFile("$lMD5FileName $pPageUrl\n");
		$this->mIndexerFilelistFileCt++;
	}

		
	/**
	 * append a line to the ContentImageFilelist-file
	 * 
	 * @access public
	 * @return void 
	 **/
	function writetoIndexerFilelistFile($pStr) {
		global $tsep_lng;

		if ( $this->useContentImages() == false )
			return("");

		if (!($lhFn = fopen($this->getIndexerFilelistFile(),"a")))
			echo sprintf($tsep_lng['err_fopen_append'], $this->getIndexerFilelistFile()) . "<br>";
		else
			if (!(fwrite($lhFn, "$pStr")))
				echo sprintf($tsep_lng['err_fwrite'], $this->getIndexerFilelistFile()) . "<br>";
			else
				fclose($lhFn);
	}
		
	/**
	 * return the amount of "md5name pageurl"-entries within the ContentImageFilelist-file
	 * 
	 * @access public
	 * @return void 
	 **/
	function getIndexerFilelistFileCt() {
		return($this->mIndexerFilelistFileCt);
	}

}
?>
