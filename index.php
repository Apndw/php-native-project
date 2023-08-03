<?php
  session_start();

  $system_path = __DIR__;
  define('BASEPATH', $system_path);

  include BASEPATH . '/helper/app.php';
  include_once BASEPATH . '/route/api.php';
  include_once BASEPATH . '/route/web.php';
?>