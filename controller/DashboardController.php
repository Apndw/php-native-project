<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once BASEPATH . './model/UserModel.php';
include_once BASEPATH . './controller/Controller.php';

class DashboardController extends Controller {
  /**
   * Show the dashboard page.
   */
  public function index() {
    if (!isset($_SESSION['auth'])) {
      Route::redirect('login');
      exit;
    }

    $model = new UserModel();
    $query_user = $model->get();

    $view = new View("layout/app");
    $view->render([
      'title' => AppName() . ' | Dashboard',
      'navbar' => $view->render_partial('partial/navbar'),
      'content' => $view->render_partial('page/dashboard', [
        'users' => $query_user
      ])
    ]);
  }
}