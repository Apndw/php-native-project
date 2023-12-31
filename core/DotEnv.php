<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DotEnv {
  // Path to .env file
  protected $path;

  /*
  * Create a new dotenv instance.
  * 
  * @param string $path
  *
  * @return void
  */
  public function __construct(string $path = '') {
    if ($path === null) {
      $path = getcwd();
    }

    $this->path = rtrim($path, '/');

    if (!is_readable($this->path . '/.env')) {
      throw new \InvalidArgumentException(
        sprintf('%s does not exist', $this->path . '/.env')
      );
    }

    $this->load();
  }

  /*
  * Load environment file and set values to $_ENV and $_SERVER superglobals
  *
  * @return void
  */
  protected function load() {
    $lines = file($this->path . '/.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
      if (strpos(trim($line), '#') === 0) {
        continue;
      }

      list($name, $value) = explode('=', $line, 2);

      $name = trim($name);
      $value = trim($value);

      if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
        putenv(sprintf('%s=%s', $name, $value));
        $_ENV[$name] = $value;
        $_SERVER[$name] = $value;
      }
    }
  }

  /*
  * Get an environment variable
  *
  * @param string $key
  * @param mixed $default
  *
  * @return mixed
  */
  public static function get(string $key, $default = null) {
    $value = getenv($key);

    if ($value === false) {
      return $default;
    }

    return $value;
  }
}