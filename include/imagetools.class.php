<?php

/**
 * @package The Search Engine Project
 * @version 2.0
 * @copyright (C) 2005 by TSEP Development Team
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @since TSEP 0942
 * @author Manfred Jedlicka
 *
 * following will be filled automatically by SubVersion!
 * Do not change by hand!
 *  $LastChangedDate: 2005-07-09 10:49:37 +0200 (Sat, 09 Jul 2005) $
 *  @lastedited $LastChangedBy: manfred $
 *  $LastChangedRevision: 231 $
 *
*/


/** 
 * Provides functionality to handle ContentImages 
 **/
class imageTools {
	
	var $mImageUrl = "";
	
	/**
     * Constructor
     * @access protected
     */
	function imageTools($pImageUrl = "") {
		if ( $pImageUrl != "" )
			$this->setImageUrl($pImageUrl);
	}
	
	/**
	 * set the Image URL
	 * 
	 * @access public
	 * @return void 
	 **/
	function setImageUrl($pImageUrl) {
		$this->mImageUrl = $pImageUrl;
	}
	
	/**
	 * returns the Image URL
	 * 
	 * @access public
	 * @return void 
	 **/
	function getImageUrl() {
		return($this->mImageUrl);
	}
	
	/**
	 * returns, if the Image URL exists (true or false)
	 * 
	 * @access public
	 * @return void 
	 **/
	function imageExists() {
		if ( $this->getImageUrl() == "" )
			return ( false );
			
		$lhFn = @fopen($this->getImageUrl(),"r");
		if ( $lhFn )
			fclose($lhFn);
		return( $lhFn ? true: false );
	}
		
	/**
	 * returns the getimagesize()-array
	 * 
	 * @access public
	 * @return void 
	 **/
	function getImageSize() {

		if ( $this->imageExists() == false )
			return( false );

		$larrSize = getimagesize($this->getImageUrl());
		$w = $larrSize[0];
		$h = $larrSize[1];
		return($larrSize);
	}

		
	/**
	 * returns width and height of the image not exceeding the
	 * bounds, given as parameter (respects the aspect ratio)
	 * 
	 * @access public
	 * @return void 
	 **/
	function getShrinkedImageSize($wMax = 9999, $hMax = 9999) {
		if ( !($larrSize = $this->getImageSize()) )
			return ( false );
			
		$w = $larrSize[0];
		$h = $larrSize[1];
		$wFact = ( $wMax / $w );
		$hFact = ( $hMax / $h );
		if ( $wFact < 1 or $hFact < 1 ) {
			$Fact = ( $wFact < $hFact ) ? $wFact : $hFact;
			$w = intval($w * $Fact);
			$h = intval($h * $Fact);
		}
		return(array($w,$h));
	}
	
	/**
	 * returns the width and height as a string: "width=x height=y"
	 * 
	 * @access public
	 * @return void 
	 **/
	function getImageSizeHTML() {
		if ( !($larrSize = $this->getImageSize()) )
			return ( false );

		$w = $larrSize[0];
		$h = $larrSize[1];
		return("width=$w height=$h");
	}
	
	/**
	 * returns the width and height as a string: "width=x height=y"
	 * width- and height-parms defines, which bounds the image must not exceed
	 * (respects the aspect ratio)
	 * 
	 * @access public
	 * @return void 
	 **/
	function getShrinkedImageSizeHTML($wMax = 9999, $hMax = 9999) {
		if ( !($larrSize = $this->getShrinkedImageSize($wMax, $hMax)) )
			return ( false );

		$w = $larrSize[0];
		$h = $larrSize[1];
		return("width=$w height=$h");
	}

		
}
?>
