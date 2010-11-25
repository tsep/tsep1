<?php
function start_script($url){
  
  $fp = @fopen($url, 'r');
 
  if (!$fp) {
      return false;
  } else { 
      fclose($fp);
      return true;
  }
}