<?php
namespace Arch\Core\MVC\Router;
use Arch\Core\Config\Routes as Routes;
use Arch\Core\Helpers\Request\URI as URI;

class Router
{
  private $routes;
  public $uri;

  public function __construct()
  {
    if (!isset(Routes::$routes)) {
      // TODO: throw error and kill execution
    }

    $this->routes = Routes::$routes;

    if (!is_array($this->routes) || empty($this->routes)) {
      // TODO: throw error and kill execution
    }

    $this->url = URI::parser();
  }

  public function routeIt()
  {

  }
}