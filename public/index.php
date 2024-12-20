<?php 

declare(strict_types=1);

use App\Core\App;
use App\Core\Env;
use Dotenv\Dotenv;
use App\Core\Router;
use App\Core\Container;
use App\Core\Controllers\HomeController;
use App\Core\Controllers\TestController;

require_once __DIR__ . "/../vendor/autoload.php";

$dotEnv = Dotenv::createImmutable(dirname(__DIR__));
$dotEnv->load();

$container = new Container();
$router = new Router($container);

$router
    ->get('/', [HomeController::class, 'index']);

// $router
//     ->get('/test', [TestController::class, 'index']);

(new App(

    $container,
    $router,
    [
        'uri' => $_SERVER['REQUEST_URI'],
        'method' => $_SERVER['REQUEST_METHOD']
    ],
    new Env($_ENV)

))->run();