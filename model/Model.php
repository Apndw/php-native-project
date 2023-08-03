<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once BASEPATH . './core/Database.php';

class Model {
  // Database connection
  private $db;

  /*
  * Constructor
  */
  public function __construct() {
    $this->db = new Database();
    $this->db->connect();
  }

  /*
  * Destructor
  */
  public function __destruct() {
    $this->db->close();
  }

  /*
  * Handle database query
  *
  * @param string $sql
  */
  public function query(string $sql) {
    return $this->db->query($sql);
  }
}