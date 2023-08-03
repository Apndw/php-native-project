<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database {
  // Database connection variables
  private $host;
  private $user;
  private $pass;
  private $name;
  private $conn;

  /*
  * Constructor
  */
  public function __construct() {
    $this->host = Config::get('database/hostname');
    $this->user = Config::get('database/username');
    $this->pass = Config::get('database/password');
    $this->name = Config::get('database/name');
  }

  /*
  * Connect to database server
  */
  public function connect() {
    $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->name);

    if ($this->conn->connect_error) {
      die('Connection failed: ' . $this->conn->connect_error);
    }
  }

  /*
  * Handle database query
  *
  * @param string $sql
  */
  public function query(string $sql = '') {
    $result = $this->conn->query($sql);
    if ($result) {
      return $result;
    } else {
      die('Query failed: ' . $this->conn->error);
    }
  }

  /*
  * Close database connection
  */
  public function close() {
    $this->conn->close();
  }
}