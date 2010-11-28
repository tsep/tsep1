<?php
/**
* POST data to a URL
* 
* @author geoffreyfishing
*
* The following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: $
*  $LastChangedBy:  $
*  $LastChangedRevision: $
*
*/

function do_post_request($url, $data, $optional_headers = null)
{
  $params = array('http' => array(
              'method' => 'POST',
              'content' => $data
            ));
  if ($optional_headers !== null) {
    $params['http']['header'] = $optional_headers;
  }
  $ctx = stream_context_create($params);
  ob_start();
  	$fp = fopen($url, 'rb', false, $ctx);
  if (!$fp) {
    throw new Exception("Problem with $url; ".ob_get_clean());
  }
  $response = @stream_get_contents($fp);
  if ($response === false) {
    throw new Exception("Problem reading data from $url; ".ob_get_clean());
  }
  ob_end_clean();
  return $response;
}