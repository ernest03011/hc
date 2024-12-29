<?php 

declare(strict_types=1);

namespace App\Core\Controllers;

use App\Core\Env;
use App\Core\View;

class GalleryController{

  public function __construct(
    private Env $config
  ) {
  }

  public function index() : View
  {
    return View::make(
      'gallery.view', 
      [
        'storagePath' => $this->config->storage['path']
      ]
    );
  }

}