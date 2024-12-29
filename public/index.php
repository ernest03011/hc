<?php 

declare(strict_types=1);

use App\Core\App;
use App\Core\Env;
use Dotenv\Dotenv;
use App\Core\Router;
use App\Core\Request;
use App\Core\Container;
use App\Core\Controllers\HomeController;
use App\Core\Controllers\TestController;
use App\Core\Controllers\AboutController;
use App\Core\Controllers\ActivityController;
use App\Core\Controllers\ContactController;
use App\Core\Controllers\GalleryController;

require_once __DIR__ . "/../vendor/autoload.php";

$dotEnv = Dotenv::createImmutable(dirname(__DIR__));
$dotEnv->load();

$container = new Container();
$router = new Router($container);

$router
    ->get('/', [HomeController::class, 'index']);

$router
    ->get('/about', [AboutController::class, 'index']);

$router
    ->get('/gallery', [GalleryController::class, 'index']);

$router
    ->get('/activities', [ActivityController::class, 'index']);

$router
    ->get('/contact', [ContactController::class, 'index']);

$router
    ->post('/contact', [ContactController::class, 'sendEmail']);

// $router
//     ->get('/test', [TestController::class, 'index']);

$container->set(Env::class, function () {
    return new Env($_ENV);
});

$request = new Request($_GET, $_POST, $_SERVER);

(new App(

    $container,
    $router,
    $request,
    new Env($_ENV)

))->run();