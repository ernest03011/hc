<?php 

declare(strict_types=1);

namespace App\Core\Controllers;

use App\Core\View;
use App\Core\Attributes\Get;
use App\Core\Attributes\Route;
use App\Core\Enums\HttpMethod;

class AboutController
{

    #[Get('/about')]
    #[Route('/about', HttpMethod::Head)]
    public function index() : View
    {
        return View::make('about.view');
    }

}
