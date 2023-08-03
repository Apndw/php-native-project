<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once BASEPATH . './core/Password.php';
include_once BASEPATH . './model/UserModel.php';
include_once BASEPATH . './controller/Controller.php';

class AuthController extends Controller {
  /**
   * Show the login page.
   */
  public function login() {
    $view = new View("layout/auth");
    $view->render([
      'title' => AppName() . ' | Login',
      'content' => $view->render_partial('page/login')
    ]);
  }

  /**
   * Handle the login process.
   */
  public function handle_login() {
    $user	= $_POST['username'];
    $pass	= $_POST['password'];
    
    $model = new UserModel();
    $query_login = $model->find('', $user);

    if (!$query_login) {
      $_SESSION['msg'] = 1;
      Route::redirect('login');
    } else {
      $hash = new Password();

      if (!$hash->verify($pass, $query_login['password'])) {
        $_SESSION['msg'] = 1;
        Route::redirect('login');
        exit;
      }

      $_SESSION['username'] = $query_login['username']; 
      $_SESSION['password'] = $query_login['password'];
      $_SESSION['role'] = $query_login['role'];
      $_SESSION['auth'] = true;
      
      Route::redirect('dashboard');
    }
  }

  /**
   * Show the register page.
   */
  public function register() {
    $view = new View("layout/auth");
    $view->render([
      'title' => AppName() . ' | Register',
      'content' => $view->render_partial('page/register')
    ]);
  }

  /**
   * Handle the register process.
   */
  public function handle_register() {
    $user	= $_POST['username'];
    $pass	= $_POST['password'];
    $pass_confirm	= $_POST['password_confirmation'];
    
    if ($pass != $pass_confirm) {
      $_SESSION['msg'] = 2;
      Route::redirect('register');
      exit;
    }

    $model = new UserModel();
    $check_if_exist = $model->find('', $user);

    if (!$check_if_exist) {
      $_SESSION['msg'] = 3;
      Route::redirect('register');
    } else {
      $hash = new Password();
      $hashed_pass = $hash->make($pass);
      $model->create($user, $hashed_pass, 'user');

      Route::redirect('login');
    }
  }

  /**
   * Handle the logout process.
   */
  public function logout() {
    session_destroy();
    session_start();
    Route::redirect('login');
  }
}