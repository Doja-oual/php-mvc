<?php
use App\core\Router;
use App\Controller\UserController;


$router = new Router();

$router->get('/', UserController::class, 'showAll');

// $router->get('/article', articleController::class, 'article');

$router->dispatch();