<?php 

declare(strict_types=1);

namespace App\Core\Controllers;

use App\Core\View;

class TestController{

  public function index() : View
  {
    return View::make('testing');
  }

}