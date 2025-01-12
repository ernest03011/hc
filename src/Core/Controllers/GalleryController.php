<?php 

declare(strict_types=1);

namespace App\Core\Controllers;

use App\Core\Env;
use App\Core\View;
use App\Core\Attributes\Get;
use App\Core\Attributes\Route;
use App\Core\Enums\HttpMethod;

class GalleryController{

  public function __construct(
    private Env $config
  ) {
  }

  #[Get('/gallery')]
  #[Route('/gallery', HttpMethod::Head)]
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