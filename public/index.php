<?php 

declare(strict_types=1);

use App\Core\App;
use App\Core\Router;
use App\Core\Container;
use App\Core\Controllers\HomeController;
use App\Core\Controllers\TestController;
use App\Core\Controllers\AboutController;
use App\Core\Controllers\ActivityController;
use App\Core\Controllers\ContactController;
use App\Core\Controllers\GalleryController;

require_once __DIR__ . "/../vendor/autoload.php";


$container = new Container();
$router = new Router($container);

$router->registerRoutesFromControllerAttributes(
    [
        HomeController::class,
        AboutController::class,
        GalleryController::class,
        ActivityController::class,
        TestController::class,
        ContactController::class

    ]
);

(new App(
    $container,
    $router
))->boot()->run();
