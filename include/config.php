<?php
/**
* Simple configuration. Once this contained all config, since 0.913 the config is stored in the database. Now we read the configuration from the DBConnectionData.php and the database
*
* @tables tsep_internal
* @author Olaf Noehring
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: 2005-06-11 18:55:44 +0200 (Sa, 11 Jun 2005) $
*  @lastedited $LastChangedBy: toon $
*  $LastChangedRevision: 134 $
*
*/


/*
.-------------------------------- CREDITS -------------------------------------------------------------------.
|       Software by     :       Olaf Noehring, Girish R
|       Version         :       TSEP 0.9nnn
|       Contact         :       Olaf Noehring: Email address on website http://www.team-noehring.de (main development since 0.9beta (excluding))
|                               girishr at gmail.com (main development until 0.9beta (including))
|       Support & Info  :       http://sourceforge.net/projects/tsep/
|       Last modified on:       2004-07-20
|       Last modified by:       Olaf Noehring
|       Filename        :       config.php
|       --------------------------------------------------------
|       Copyright (c) 2002-2004, Girish R & Olaf Noehring. All Rights Reserved.
|       --------------------------------------------------------
|
|       We are happy to hear about your comments, suggestions, enquires and requirements!
|
|       This file is part of TSEP (The Search Engine Project)
|
|       This program is free software; you can redistribute it and/or modify
|       it under the terms of the GNU General Public License as published by
|       the Free Software Foundation; either version 2 of the License, or (at
|       your option) any later version.
|
|       This program is distributed in the hope that it will be useful, but
|       WITHOUT ANY WARRANTY; without even the implied warranty of
|       MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
|       General Public License for more details.
|
|       You should have received a copy of the GNU General Public License along
|       with this program; if not, write to the Free Software Foundation, Inc.,
|       59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
'----------------------------------------------------------------------------------------------------------------'
*/
// complete changes of config.php in verion 0.912


// ##############################################################################
//                      no changes below !!
// ##############################################################################

// this is because mm created it's own file (and I was too lazy to correct everty occurence)

# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_tsepdbconnection = $db_server;
$database_tsepdbconnection = $db_name;
$username_tsepdbconnection = $db_usrname;
$password_tsepdbconnection = $db_pwd;
$tsepdbconnection = mysql_connect($hostname_tsepdbconnection, $username_tsepdbconnection, $password_tsepdbconnection) or trigger_error(mysql_error(),E_USER_ERROR);

// ==== START === assign configuration values from database ===============
$db_tablename = db::$prefix."internal";
mysql_select_db($database_tsepdbconnection);
$query_tsepconfiguration = "SELECT * FROM $db_tablename WHERE stringtag = 'config'";
$tsepconfiguration = mysql_query($query_tsepconfiguration) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
$row_tsepconfiguration = mysql_fetch_assoc($tsepconfiguration);
$totalRows_tsepconfiguration = mysql_num_rows($tsepconfiguration);
        do
        {
                if (!preg_match("/^ *group +level +/i", $row_tsepconfiguration['fieldtype'])) {
                   $str = $row_tsepconfiguration['description'];
                   $tsep_config["$str"] = ( $row_tsepconfiguration["valuetype"] == "s" ? $row_tsepconfiguration["stringvalue"] : (int)$row_tsepconfiguration["numericvalue"] );

                // ! ! ! for backwardcompatibility only ! ! !
                   $tsep_config["$str"] = $tsep_config["$str"];
                }
        } while ($row_tsepconfiguration = mysql_fetch_assoc($tsepconfiguration));
// ==== END === assign configuration values from database ===============
mysql_free_result($tsepconfiguration);

// set first alternating color
$tsep_config['Color'] = $tsep_config['Color_1'];
$tsep_config['Color']        = $tsep_config['Color_1'];

// read the debug function if user whishes
if ($tsep_config['Use_Debug_Print']=="true")
{
        include_once( TSEP_INCLUDE_DIR."/debugprint.php");
}

?>
