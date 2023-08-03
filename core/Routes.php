<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once BASEPATH . './helper/Url.php';

class Route {
  // Define type of route
  public static $typeRoute;

  // Define valid routes
  public static $validRoutes = [];

  /*
  * Constructor
  *
  * @param string $type
  */
  public function __construct($type = "web") {
    self::$typeRoute = $type;
    self::$validRoutes = [
      "web" => [],
      "api" => []
    ];
  }

  /*
  * Handle function for route
  *
  * @param mixed $function
  *
  * @return void
  */
  private static function handle_func($function) {
    if (is_callable($function)) {
      call_user_func($function);
    } elseif (is_array($function) && count($function) == 2) {
      [$className, $methodName] = $function;
      $classInstance = new $className();

      if (method_exists($classInstance, $methodName)) {
        $classInstance->$methodName();
      } else {
        if (self::$typeRoute == "web") {
          self::redirect('fallback');
        } else {
          echo json_encode([
            "status" => 404,
            "message" => "Not Found"
          ]);
        }
      }
    } else {
      if (self::$typeRoute == "web") {
        self::redirect('fallback');
      } else {
        echo json_encode([
          "status" => 404,
          "message" => "Not Found"
        ]);
      }
    }
  }

  /*
  * Set route with any method
  *
  * @param string $route
  * @param mixed $params
  *
  * @return void
  */
  public static function any(string $route, $function) {
    if (self::$typeRoute == "web") {
      self::$validRoutes["web"][] = $route;
    } else {
      self::$validRoutes["api"][] = "/api" . $route;
    }

    if ($_SERVER['REQUEST_URI'] == $route) {
      self::handle_func($function);
    }
  }

  /*
  * Set route with GET method
  *
  * @param string $route
  * @param mixed $params
  *
  * @return void
  */
  public static function get(string $route, $function) {
    if (self::$typeRoute == "web") {
      self::$validRoutes["web"][] = $route;
    } else if (self::$typeRoute == "api") {
      $route = "/api" . $route;

      self::$validRoutes["api"][] = $route;
    }

    if ($_SERVER['REQUEST_URI'] == $route && $_SERVER['REQUEST_METHOD'] == 'GET') {
      self::handle_func($function);
      exit();
    }
  }

  /*
  * Set route with POST method
  *
  * @param string $route
  * @param mixed $params
  *
  * @return void
  */
  public static function post(string $route, $function) {
    if (self::$typeRoute == "web") {
      self::$validRoutes["web"][] = $route;
    } else {
      self::$validRoutes["api"][] = "/api" . $route;
    }

    if ($_SERVER['REQUEST_URI'] == $route && $_SERVER['REQUEST_METHOD'] == 'POST') {
      self::handle_func($function);
      exit();
    }
  }

  /*
  * Set route with PUT method
  *
  * @param string $route
  * @param mixed $params
  *
  * @return void
  */
  public static function put(string $route, $function) {
    if (self::$typeRoute == "web") {
      self::$validRoutes["web"][] = $route;
    } else {
      self::$validRoutes["api"][] = "/api" . $route;
    }

    if ($_SERVER['REQUEST_URI'] == $route && $_SERVER['REQUEST_METHOD'] == 'PUT') {
      self::handle_func($function);
      exit();
    }
  }

  /*
  * Set route with DELETE method
  *
  * @param string $route
  * @param mixed $params
  *
  * @return void
  */
  public static function delete(string $route, $function) {
    if (self::$typeRoute == "web") {
      self::$validRoutes["web"][] = $route;
    } else {
      self::$validRoutes["api"][] = "/api" . $route;
    }

    if ($_SERVER['REQUEST_URI'] == $route && $_SERVER['REQUEST_METHOD'] == 'DELETE') {
      self::handle_func($function);
      exit();
    }
  }

  /*
  * Redirect to specific location
  *
  * @param string $location
  *
  * @return void
  */
  public static function redirect(string $location) {
    header('Location: ' . get_base_url() . $location);
    exit();
  }
}