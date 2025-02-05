<?php

return [
    'GET' => [
        '/' => ['FrontController', 'index'],
        '/dashboard' => ['BackController', 'dashboard'],
        '/login' => ['AuthController', 'login'],
        '/logout' => ['AuthController', 'logout'],
        '/user/{id}' => ['UserController', 'show'],
    ],
    'POST' => [
        'login' => ['AuthController', 'authenticate'],
        '/user/create' => ['UserController', 'create'],
        '/user/update/{id}' => ['UserController', 'update']
    ]
];
