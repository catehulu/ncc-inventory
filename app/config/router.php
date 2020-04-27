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
    '/logout',
    [
        'controller' => 'index',
        'action' => 'logout'
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

$router->addGet(
    '/logout',
    [
        'controller' => 'users',
        'action' => 'logout'
    ]
);

$router->addGet(
    '/404',
    [
        'controller' => 'error',
        'action' => 'notfound'
    ]
);

// Define your routes here

$router->handle($_SERVER['REQUEST_URI']);
