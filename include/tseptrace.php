<?php
/**
* print debug messages if "debug function" if set to true in configuration
*
* @author Manfred Jedlicka
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate$
*  @lastedited $LastChangedBy$
*  $LastChangedRevision$
*
*/


/**
* _TsepTrace
*
* outputs $pMsg
* if $pMsg = '_TsepTrace_Closeup_', the trace-messages are displayed within a complete block
*
* @param $pMsg
*/
//------------------------------------------------------------------------------
/*
function _TsepTrace($pMsg) {
   global $tsep_config;
   static $arr_TsepTrace;

   $pStyle = "color:maroon;background-color:yellow;font-family:monospace;";

   $lDoTrace = false;
   if ( /*$tsep_config['Use_Debug_Print'] == "true" )
      $lDoTrace = true;
   if ( isset($_SESSION["debugtrace"]) )
      if ( $_SESSION["debugtrace"] == 'on' )
         $lDoTrace = true;
         
   if ( $lDoTrace == false )
      return;
      
   if ( $pMsg != '_TsepTrace_Closeup_' ) {
      echo "<div style='$pStyle'><b>TSEPTrace:</b> $pMsg</div>\n";
      $arr_TsepTrace[] = $pMsg;
      return;
   }
   if (!$arr_TsepTrace)
      return;
   echo "<br><br><div style='$pStyle;font-size:x-large;'><b>BEGIN TsepTrace_Closeup: listing all Traces again in one block</b></div><br>\n";
   while ( list($key1,$data1) = each($arr_TsepTrace) )
      echo "<div style='$pStyle'>$data1</div>\n";
   echo "<br><div style='$pStyle;font-size:x-large;'><b>END TsepTrace_Closeup</b></div>\n";
}*/
?>
