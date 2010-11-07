<?php
//
// +----------------------------------------------------------------------+
// | PHP Version 4                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2003 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the PHP license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available at through the world-wide-web at                           |
// | http://www.php.net/license/2_02.txt.                                 |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Authors: Eric Kilfoil <eric@ypass.net>                               |
// +----------------------------------------------------------------------+
//
/**
 * 2005-04-26::Toon Goedhart
 * Code slightly modified to remove dependancy on PEAR package.
 * Essentially replaced references to PEAR::raiseError and PEAR::isError
 * by custom return codes.
 *
 * following will be filled automatically by SubVersion!
 * Do not change by hand!
 *  $LastChangedDate: 2005-05-17 17:18:57 +0200 (Di, 17 Mai 2005) $
 *  @lastedited $LastChangedBy: olaf $
 *  $LastChangedRevision: 41 $
 *
*/


/**
 * Map of bitmasks to subnets
 *
 * This array contains every valid netmask.  The index of the dot quad
 * netmask value is the corresponding CIDR notation (bitmask).
 */
$GLOBALS['Net_IPv4_Netmask_Map'] = array(
            0 => "0.0.0.0",
            1 => "128.0.0.0",
            2 => "192.0.0.0",
            3 => "224.0.0.0",
            4 => "240.0.0.0",
            5 => "248.0.0.0",
            6 => "252.0.0.0",
            7 => "254.0.0.0",
            8 => "255.0.0.0",
            9 => "255.128.0.0",
            10 => "255.192.0.0",
            11 => "255.224.0.0",
            12 => "255.240.0.0",
            13 => "255.248.0.0",
            14 => "255.252.0.0",
            15 => "255.254.0.0",
            16 => "255.255.0.0",
            17 => "255.255.128.0",
            18 => "255.255.192.0",
            19 => "255.255.224.0",
            20 => "255.255.240.0",
            21 => "255.255.248.0",
            22 => "255.255.252.0",
            23 => "255.255.254.0",
            24 => "255.255.255.0",
            25 => "255.255.255.128",
            26 => "255.255.255.192",
            27 => "255.255.255.224",
            28 => "255.255.255.240",
            29 => "255.255.255.248",
            30 => "255.255.255.252",
            31 => "255.255.255.254",
            32 => "255.255.255.255"
        );


/**
* Class to provide IPv4 calculations
*
* Provides methods for validating IP addresses, calculating netmasks,
* broadcast addresses, network addresses, conversion routines, etc.
*
* @author  Eric Kilfoil <edk@ypass.net>
* @package Net_IPv4
* @version 1.0
* @access  public
*/
class Net_IPv4
{
    var $ip = "";
    var $bitmask = false;
    var $netmask = "";
    var $network = "";
    var $broadcast = "";
    var $long = 0;

    /**
     * Validate the syntax of the given IP adress
     *
     * Using the PHP long2ip() and ip2long() functions, convert the IP
     * address from a string to a long and back.  If the original still
     * matches the converted IP address, it's a valid address.  This
     * function does not allow for IP addresses to be formatted as long
     * integers.
     *
     * @param  string $ip IP address in the format x.x.x.x
     * @return bool       true if syntax is valid, otherwise false
     */
    function validateIP($ip)
    {
        if ($ip == long2ip(ip2long($ip))) {
            return(TRUE);
        } else {
            return(FALSE);
        }
    }

    /**
     * Validate the syntax of the given IP address (compatibility)
     *
     * This function is identical to Net_IPv4::validateIP().  It is included
     * merely for compatibility reasons.
     *
     * @param  string $ip IP address
     * @return bool       true if syntax is valid, otherwise false
     */
    function check_ip($ip)
    {
        return($this->validateIP($ip));
    }

    /**
     * Validate the syntax of a four octet netmask
     *
     * There are 33 valid netmask values.  This function will compare the
     * string passed as $netmask to the predefined 33 values and return
     * true or false.  This is most likely much faster than performing the
     * calculation to determine the validity of the netmask.
     *
     * @param  string $netmask Netmask
     * @return bool       true if syntax is valid, otherwise false
     */
    function validateNetmask($netmask)
    {
        if (! in_array($netmask, $GLOBALS['Net_IPv4_Netmask_Map'])) {
            return(FALSE);
        }
        return(TRUE);
    }

    /**
     * Parse a formatted IP address
     *
     * Given a network qualified IP address, attempt to parse out the parts
     * and calculate qualities of the address.
     *
     * The following formats are possible:
     *
     * [dot quad ip]/[ bitmask ]
     * [dot quad ip]/[ dot quad netmask ]
     * [dot quad ip]/[ hex string netmask ]
     *
     * The first would be [IP Address]/[BitMask]:
     * 192.168.0.0/16
     *
     * The second would be [IP Address] [Subnet Mask in quad dot notation]:
     * 192.168.0.0/255.255.0.0
     *
     * The third would be [IP Address] [Subnet Mask as Hex string]
     * 192.168.0.0/ffff0000
     *
     * Usage:
     *
     * $cidr = '192.168.0.50/16';
     * $net = Net_IPv4::parseAddress($cidr);
     * echo $net->network; // 192.168.0.0
     * echo $net->ip; // 192.168.0.50
     * echo $net->broadcast; // 192.168.255.255
     * echo $net->bitmask; // 16
     * echo $net->long; // 3232235520 (long/double version of 192.168.0.50)
     * echo $net->netmask; // 255.255.0.0
     *
     * @param  string $ip IP address netmask combination
     * @return object     true if syntax is valid, otherwise false
     */
    function parseAddress($address)
    {
        $myself = new Net_IPv4;
        if (strchr($address, "/")) {
            $parts = explode("/", $address);
            if (! $myself->validateIP($parts[0])) {
                return FALSE;
            }
            $myself->ip = $parts[0];

            // Check the style of netmask that was entered 
            /*
             *  a hexadecimal string was entered
             */
            if (eregi("^([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$", $parts[1], $regs)) {
                // hexadecimal string
                $myself->netmask = hexdec($regs[1]) . "." .  hexdec($regs[2]) . "." .
                    hexdec($regs[3]) . "." .  hexdec($regs[4]);

            /*
             *  a standard dot quad netmask was entered.
             */
            } else if (strchr($parts[1], ".")) {
                if (! $myself->validateNetmask($parts[1])) {
                    return FALSE;
                }
                $myself->netmask = $parts[1];

            /*
             *  a CIDR bitmask type was entered
             */
            } else if ($parts[1] >= 0 && $parts[1] <= 32) {
                // bitmask was entered
                $myself->bitmask = $parts[1];

            /*
             *  Some unknown format of netmask was entered
             */
            } else {
                return FALSE;
            }
            $myself->calculate();
            return($myself);
        } else if ($myself->validateIP($address)) {
            $myself->ip = $address;
            return($myself);
        } else {
            return FALSE;
        }
    }
    
    /**
     * Calculates network information based on an IP address and netmask.
     *
     * Fully populates the object properties based on the IP address and
     * netmask/bitmask properties.  Once these two fields are populated,
     * calculate() will perform calculations to determine the network and
     * broadcast address of the network.
     *
     * @return mixed     true if no errors occured, otherwise PEAR_Error object
     */
    function calculate() {
        $validNM = $GLOBALS['Net_IPv4_Netmask_Map'];

        if (! is_a($this, "net_ipv4")) {
            $myself = new Net_IPv4;
            return FALSE;
        }

        /* Find out if we were given an ip address in dot quad notation or
         * a network long ip address.  Whichever was given, populate the
         * other field
         */
        if (strlen($this->ip)) {
            if (! $this->validateIP($this->ip)) {
                return FALSE;
            }
            $this->long = $this->ip2double($this->ip);
        } else if (is_numeric($this->long)) {
            $this->ip = long2ip($this->long);
        } else {
           return FALSE;
        }

        /*
         * Check to see if we were supplied with a bitmask or a netmask.
         * Populate the other field as needed.
         */
        if (strlen($this->bitmask)) {
            $this->netmask = $validNM[$this->bitmask];
        } else if (strlen($this->netmask)) {
            $validNM_rev = array_flip($validNM);
            $this->bitmask = $validNM_rev[$this->netmask];
        } else {
            return FALSE;
        }
        $this->network = long2ip(ip2long($this->ip) & ip2long($this->netmask));
        $this->broadcast = long2ip(ip2long($this->ip) |
                (ip2long($this->netmask) ^ ip2long("255.255.255.255")));
        return(TRUE);
    }

	function getNetmask($length) {
		$ipobj = Net_IPv4::parseAddress("0.0.0.0/" . $length);
		if ( $ipobj <> FALSE ) {
			$mask = $ipobj->netmask;
			unset($ipobj);
			return($mask);
		}
		return(FALSE);
	}

	function getNetLength($netmask) {
		$ipobj = Net_IPv4::parseAddress("0.0.0.0/" . $length);
		if ( $ipobj <> FALSE ) {
			$bitmask = $ipobj->bitmask;
			unset($ipobj);
			return($bitmask);
		}
		return(FALSE);
	}

	function getSubnet($ip, $netmask) {
		$ipobj = Net_IPv4::parseAddress($ip . "/" . $netmask);
		if ( $ipobj <> FALSE ) {
			$net = $ipobj->network;
			unset($ipobj);
			return($net);
		}
		return(FALSE);
	}

	function inSameSubnet($ip1, $ip2) {
		if (! is_object($ip1) || strtolower(get_class($ip1)) != "net_ipv4") {
			$ipobj1 = Net_IPv4::parseAddress($ip1);
			if ( !$ipobj ) {
                return FALSE;
			}
		}
		if (! is_object($ip2) || strtolower(get_class($ip2)) != "net_ipv4") {
			$ipobj2 = Net_IPv4::parseAddress($ip2);
			if ( !$ipobj ) {
                return FALSE;
			}
		}
		if ($ipobj1->network == $ipobj2->network &&
				$ipobj1->bitmask == $ipobj2->bitmask) {
				return(TRUE);
		}
		return(FALSE);
	}

    /**
     * Converts a dot-quad formmated IP address into a hexadecimal string
     */
    function atoh($addr)
    {
        if (! Net_IPv4::validateIP($addr)) {
            return(FALSE);
        }
        $ap = explode(".", $addr);
        return(sprintf("%02x%02x%02x%02x",
                    $ap[0], $ap[1],
                    $ap[2], $ap[3]));
    }

    /**
     * Converts a hexadecimal string into a dot-quad formatted IP address
     */
    function htoa($addr)
    {
        if (eregi("^([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$",
                    $addr, $regs)) {
            return(hexdec($regs[1]) . "." .  hexdec($regs[2]) . "." .
                hexdec($regs[3]) . "." .  hexdec($regs[4]));
        }
        return(FALSE);
    }
    /**
     * Converts an IP address to a PHP double.  Better than ip2long because
     * a long in PHP is a signed integer.
     */
    function ip2double($ip)
    {
        return((double)(sprintf("%u", ip2long($ip))));
    }

    /**
     * Determines whether or not the supplied IP is within the supplied network.
     *
     * This function determines whether an IP address is within a network.
     * The IP address ($ip) must be supplied in dot-quad format, and the
     * network ($network) may be either a string containing a CIDR
     * formatted network definition, or a Net_IPv4 object.
     *
     * @param  string $ip A quad-dot representation of an IP address 
     * @param  string $network A string representing the network in CIDR format or a Net_IPv4 object.
     * @return boolean  true if the IP address exists within the network
     */
    function ipInNetwork($ip, $network)
    {
        if (! is_object($network) || get_class($network) != 'net_ipv4') {
            $network = Net_IPv4::parseAddress($network);
        }
        if (! is_object($network) || get_class($network) != 'net_ipv4') {
            return($network);
        }
        $net = Net_IPv4::ip2double($network->network);
        $bcast = Net_IPv4::ip2double($network->broadcast);
        $ip = Net_IPv4::ip2double($ip);
        unset($network);
        if ($ip >= $net && $ip <= $bcast) {
            return(TRUE);
        }
        return(FALSE);
        return((double)(sprintf("%u", ip2long($ip))));
    }
}

/*
 * vim: sts=4 ts=4 sw=4 cindent fdm=marker
 */
?>
