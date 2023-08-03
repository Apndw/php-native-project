<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once BASEPATH . './core/Config.php';

/*
* Get the app name
*
* @return string
*/
function AppName() {
  return Config::get('app/name');
}

/*
* Get the app version
*
* @return string
*/
function AppVersion() {
  return Config::get('app/version');
}