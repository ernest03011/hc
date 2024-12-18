<?php

declare(strict_types=1);

namespace App\Core;

use App\Exceptions\ViewNotFoundException;
use App\Exceptions\ViewPathNotFoundException;

class View{

  private static string $viewPath = '';

  public function __construct(

    protected string $view,
    protected array $params = []

  ) 
  {
  }

  public static function setViewPath(string $viewPath) : void
  {
    self::$viewPath = $viewPath;
  }

  public static function make(string $view, array $params = []) : static
  {

    if(self::$viewPath === ''){
      throw new ViewPathNotFoundException();
    }

    return new Static($view, $params);
  }

  public function render() : string
  {
    $viewPath = self::$viewPath . '/' . $this->view . '.php';

    if(! file_exists($viewPath)){
      throw new ViewNotFoundException();
    }

    foreach ($this->params as $key => $value) {
      $$key = $value;
    }

    ob_start();

    include $viewPath;
    
    return (string) ob_get_clean();

  }

  public function __toString() : string
  {
    return $this->render();
  }

  public function __get(string $name)
  {
    return $this->params[$name] ?? null; 
  }

}