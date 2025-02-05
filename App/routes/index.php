<?php
use App\core\Router;
use App\controllers\articleController;


$router = new Router();

$router->get('/', UserController::class, 'showAll');

// $router->get('/article', articleController::class, 'article');

$router->dispatch();