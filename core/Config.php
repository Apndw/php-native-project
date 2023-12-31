<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once BASEPATH . './config/main.php';

class Config {
  /*
  * Get a config value
  *
  * @param string $path
  *
  * @return mixed
  */
  public static function get(string $path = '') {
    if ($path) {
      $config = $GLOBALS['APP_CONFIG'];
      $path = explode('/', $path);

      foreach ($path as $bit) {
        if (isset($config[$bit])) {
          $config = $config[$bit];
        }
      }

      return $config;
    }

    return false;
  }
}