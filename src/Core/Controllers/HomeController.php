<?php 

declare(strict_types=1);

namespace App\Core\Controllers;

use App\Core\Env;
use App\Core\View;

class HomeController{

  public function __construct(
    private Env $config
  ) {
  }

  public function index() : View
  {
    return View::make(
      'index.view',
      [
        'storagePath' => $this->config->storage['path'],
        'ig' => $this->config->social['ig'],
        'airbnb' => $this->config->social['airbnb']
      ]
    );
  }

}