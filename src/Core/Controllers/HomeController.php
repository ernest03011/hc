<?php 

declare(strict_types=1);

namespace App\Core\Controllers;

use App\Core\Env;
use App\Core\View;
use App\Core\Attributes\Get;
use App\Core\Attributes\Route;
use App\Core\Enums\HttpMethod;

class HomeController
{

    public function __construct(
        private Env $config
    ) {
    }

    #[Get('/')]
    #[Route('/home', HttpMethod::Head)]
    public function index() : View
    {
        return View::make(
            'index.view',
            [
                'storagePath' => $this->config->storage['path'],
                'ig' => $this->config->social['ig'] ?? "#",
                'airbnb' => $this->config->social['airbnb'] ?? "#",
                'whatsapp' => $this->config->social['whatsapp'] ?? "#"
            ]
        );
    }

}
