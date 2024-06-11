<?php

    require_once __DIR__ . '/src/includes/includes.php';
    require_once __DIR__ . '/src/router/Router.php';

    
    $router = new Router();

    $route = isset($_GET['controller']) ? $_GET : ['method' => 'index'];
    
    $router->route($route);



    // $check_worker->check();
