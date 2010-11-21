<?php
function start_script($url){
  $parts=parse_url($url);
 
  $fp = fsockopen($parts['host'], 
          isset($parts['port'])?$parts['port']:80, 
          $errno, $errstr, 30);
 
  if (!$fp) {
      return false;
  } else {
      $out = "POST ".$parts['path']." HTTP/1.1\r\n";
      $out.= "Host: ".$parts['host']."\r\n";
      $out.= "Content-Type: application/x-www-form-urlencoded\r\n";
      $out.= "Content-Length: ".strlen($parts['query'])."\r\n";
      $out.= "Connection: Close\r\n\r\n";
      if (isset($parts['query'])) $out.= $parts['query'];
 
      fwrite($fp, $out);
      fclose($fp);
      return true;
  }
}