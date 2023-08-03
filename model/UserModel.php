<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once BASEPATH . './model/Model.php';

class UserModel extends Model {
  /*
  * Constructor
  */
  public function __construct() {
    parent::__construct();
  }

  /*
  * Destructor
  */
  public function __destruct() {
    parent::__destruct();
  }

  /*
  * Get all users
  *
  * @return array|bool
  */
  public function get() {
    $sql = "SELECT * FROM users";
    $result = $this->query($sql);
    
    if ($result->num_rows > 0) {
      return $result;
    } else {
      return false;
    }
  }

  /*
  * Create a new user
  *
  * @param string $username
  * @param string $password
  * @param string $role
  *
  * @return bool
  */
  public function create(string $username, string $password, string $role) {
    $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
    $result = $this->query($sql);

    if ($result) {
      return true;
    } else {
      return false;
    }
  }

  /*
  * Find a user
  *
  * @param string $id
  * @param string $username
  *
  * @return array|bool
  */
  public function find(string $id, string $username) {
    $sql = "SELECT * FROM users WHERE id = '$id' OR username = '$username' LIMIT 1";
    $result = $this->query($sql);

    if ($result->num_rows > 0) {
      return $result->fetch_assoc();
    } else {
      return false;
    }
  }
}