<?php 

declare(strict_types=1);

namespace App\Core;

use App\Interfaces\DatabaseInterface;

class App{

  private static DatabaseInterface $db;

  public function __construct(

    protected Container $container,
    protected Router $router,
    protected array $request,
    protected Env $config
  
  ) {

  }

  public static function db() : DatabaseInterface
  {
    return static::$db;
  }

  public function run()
  {

  }


}