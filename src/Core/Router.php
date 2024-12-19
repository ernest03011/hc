<?php

declare(strict_types = 1);

namespace App\Core;

use App\Exceptions\RouteNotFoundException;

class Router
{

  private array $routes = [];

  public function __construct(private Container $container)
  {
  }

  public function register(string $requestMethod, string $route, callable|array $action) : self
  {
    $this->routes[$requestMethod][$route] = $action;

    return $this;
  }

  public function get(string $route, callable|array $action) : self
  {
    return $this->register('get', $route, $action);
  }

  public function post(string $route, callable|array $action)
  {
    return $this->register('post', $route, $action);
  }

  public function routes() : array
  {
    return $this->routes;
  }

  public function resolve(string $requestUri, string $requestMethod)
  {

    $route = explode('?', $requestUri)[0];
    $action = $this->routes[$requestMethod][$route] ?? null;

    if(! $action)
    {
      throw new RouteNotFoundException();
    }

    [$class, $method] = $action;

    if(class_exists($class))
    {

      $class = $this->container->get($class);
      if(method_exists($class, $method))
      {
        return call_user_func_array([$class, $method], []);
      }
    }

    throw new RouteNotFoundException();
  }

}