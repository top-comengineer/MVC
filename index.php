<?php
require_once './vendor/autoload.php';

use app\config\Application;
use app\config\HomeController;

echo "index.php";

$app = new Application(dirname(__DIR__));

$app->router->get('/', [HomeController::class, 'index']);

$app->run();
?>