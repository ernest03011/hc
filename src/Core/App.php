<?php 

declare(strict_types=1);

namespace App\Core;

use Dotenv\Dotenv;
use App\Core\Mailer;
use App\Core\Validation\Validator;
use App\Interfaces\EmailInterface;
use App\Interfaces\ValidatorInterface;
use App\Exceptions\RouteNotFoundException;

class App{


  private Env $config;
  private Request $request;

  public function __construct(

    protected Container $container,
    protected Router $router
  
  ) {
  }

  public function boot(): static
  {

    $dotEnv = Dotenv::createImmutable(dirname(__DIR__, 2));
    $dotEnv->load();

    
    $this->container->set(EmailInterface::class, Mailer::class);
    $this->container->set(ValidatorInterface::class, Validator::class);
    $this->container->set(Env::class, function () {
      return new Env($_ENV);
    });
    
    $this->container->set(Request::class, function () {
      return new Request($_GET, $_POST, $_SERVER);
    });

    $this->config = new Env($_ENV);
    $this->request = new Request($_GET, $_POST, $_SERVER);

    View::setViewPath(
      $this->config->view['path'] ?? __DIR__ . '/../views'
    );

    return $this;

  }

  public function run()
  {

    try {

      echo $this->router->resolve(
        $this->request
      ); 

    } catch (RouteNotFoundException) {

      http_response_code(404);

      echo View::make('error/404');
    }

  }


}