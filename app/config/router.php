<?php

$router = $di->getRouter();

$router->addGet(
    '/login',
    [
        'controller' => 'index',
        'action' => 'loginform'
    ]
);

$router->addPost(
    '/login',
    [
        'controller' => 'index',
        'action' => 'login'
    ]
);

$router->addGet(
    '/register',
    [
        'controller' => 'users',
        'action' => 'registerform'
    ]
);

$router->addPost(
    '/register',
    [
        'controller' => 'users',
        'action' => 'register'
    ]
);

// Define your routes here

$router->handle($_SERVER['REQUEST_URI']);
