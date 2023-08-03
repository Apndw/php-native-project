<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once BASEPATH . './core/Routes.php';
include_once BASEPATH . './model/UserModel.php';

$route = new Route("api");

$route->get('/users', function() {
  if (!isset($_SESSION['user_api'])) {
    echo json_encode([
      'status' => false,
      'message' => 'Unauthorized'
    ]);
    exit;
  }

  $model = new UserModel();
  $query_user = $model->get();

  echo json_encode([
    'status' => true,
    'message' => 'Success',
    'data' => $query_user
  ]);
});