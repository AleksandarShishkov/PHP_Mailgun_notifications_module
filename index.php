<?php

    require_once __DIR__ . '/src/router/Router.php';
    require_once __DIR__ . '/src/Controllers/Worker/CheckOnWorkerController.php';
    
    CheckOnWorkerController::check();
    $router = new Router();

    $route = isset($_GET['controller']) ? $_GET : ['method' => 'index'];
    
    $router->route($route);