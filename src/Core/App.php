<?php 

declare(strict_types=1);

namespace App\Core;

use App\Exceptions\RouteNotFoundException;

class App{


  public function __construct(

    protected Container $container,
    protected Router $router,
    protected array $request,
    protected Env $config
  
  ) {

    View::setViewPath(
      $config->view['path'] ?? __DIR__ . '/../views'
    );

  }

  public function run()
  {

    try {

      echo $this->router->resolve($this->request['uri'], strtolower($this->request['method']));

    } catch (RouteNotFoundException) {

      http_response_code(404);

      echo View::make('error/404');
    }

  }


}