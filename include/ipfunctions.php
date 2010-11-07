<?php

/**
 * Handle IP address formatting, resolving, etc...
 * 
 * @package The Search Enging Project
 * @version $1.0$
 * @copyright (C) 2005 by TSEP Development Team
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @since TSEP 0941
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
 * Uses PEAR classes
 **/
require_once( TSEP_INCLUDE_DIR."/IPv6.php" );
require_once( TSEP_INCLUDE_DIR."/IPv4.php" );

	/**
	 * formatIP()
	 * 
	 * Formats an IP address to the TSEP standard "000.000.000.000".
	 * It can handle both IPv4 and IPv6 addresses (e.g. 1080:0:0:0:0:800:0:417A).
	 * 
	 * @param string $ipAddress The unformatted IP address
	 * @return string The formatted IP address or FALSE if not a valid IP address
	 **/
	function formatIP( $ipAddress ) {
		$segments = explode( ".", $ipAddress );
		
		/**
		 * Check if this is a valid address
		 * and determine the mask to use for formatting.
		 **/
		if ( Net_IPv4::validateIP( $ipAddress ) ) {
		    $mask = "%03s";
		} elseif ( Net_IPv6::checkIPv6( $ipAddress ) ) {
			$mask = "%04s";
		} else {
			return FALSE;
		}
		
		for ( $i=0; $i < count( $segments ); $i++ ) {
			$segments[$i] = sprintf($mask,  $segments[$i]);
		}

		return implode( ".", $segments );
	}
	

	/**
	 * Gets the hostname that goes with the specified IP address.
	 * gethostbyaddr returns the IP address if it couldn't resolve.
	 * It also takes forever to time-out.
	 * I haven't been able to find a solution to this problem.
	 * 
	 * @param string $ipAddress The IP address to resolve
	 * @return string Host name on success, IP address on failure
	 **/
	function resolveIP( $ipAddress ) {
		return @gethostbyaddr( $ipAddress );
	}
	
	/**
	 * Checks if the IP address is a valid IPv4 address
	 * 
	 * @param string $ipAddress The address that is to be checked
	 * @return bool TRUE if valid
	 **/
	function isIPv4( $ipAddress ) {
		return Net_IPv4::validateIP( $ipAddress );
	}
	
	/**
	 * Checks if the IP address is a valid IPv6 address
	 * 
	 * @param string $ipAddress The address that is to be checked
	 * @return bool TRUE if valid
	 **/
	function isIPv6( $ipAddress ){
		return Net_IPv6::checkIPv6( $ipAddress );
	}

?>
