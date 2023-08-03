<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Get the base url
*
* @return string
*/
function get_base_url(){
  if (isset($_SERVER['HTTPS'])) {
    $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
  } else {
    $protocol = 'http';
  }

  return $protocol . "://" . $_SERVER['HTTP_HOST'] . "/";
}
