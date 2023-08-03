<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once BASEPATH . '../controller/Controller.php';

class FallbackController extends Controller {
  /**
   * Show the error page.
   */
  public function index() {
    $view = new View("layout/error");
    $view->render([
      'title' => AppName() . ' | Error',
      'content' => $view->render_partial('error/404')
    ]);
  }
}