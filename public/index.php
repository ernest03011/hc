<?php 

declare(strict_types=1);

use Dotenv\Dotenv;
use App\Core\App;
use App\Core\Env;
use App\Core\Router;
use App\Core\Container;

require_once __DIR__ . "/../vendor/autoload.php";

$dotEnv = Dotenv::createImmutable(dirname(__DIR__));
$dotEnv->load();

$container = new Container();
$router = new Router($container);

// $router
//     ->get('/', [HomeController::class, 'index']);

(new App(

    $container,
    $router,
    [
        'uri' => $_SERVER['REQUEST_URI'],
        'method' => $_SERVER['REQUEST_METHOD']
    ],
    new Env($_ENV)

))->run();