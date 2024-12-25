<?php 

declare(strict_types=1);

namespace App\Core;

use App\Core\ContactForm;
use App\Interfaces\EmailInterface;
use App\Exceptions\RouteNotFoundException;

class App{


  public function __construct(

    protected Container $container,
    protected Router $router,
    protected Request $request,
    protected Env $config
  
  ) {

    $this->container->set(EmailInterface::class, ContactForm::class);

    View::setViewPath(
      $config->view['path'] ?? __DIR__ . '/../views'
    );

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