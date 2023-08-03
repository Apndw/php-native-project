<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$dotenv = include_once BASEPATH . './core/DotEnv.php';
$env = new DotEnv(BASEPATH);

$GLOBALS["APP_CONFIG"] = [
  "app" => [
    "name" => $env->get("APP_NAME", "Native PHP"),
    "version" => $env->get("APP_VERSION", "1.0.0"),
  ],
  "database" => [
    "hostname" => $env->get("DB_HOST", "localhost"),
    "port" => $env->get("DB_PORT", 3306),
    "username" => $env->get("DB_USERNAME", "root"),
    "password" => $env->get("DB_PASSWORD", ""),
    "name" => $env->get("DB_NAME", "db_native"),
  ],
  "password" => [
    "algo" => PASSWORD_BCRYPT,
    "cost" => 10,
    "salt" => 50
  ]
];