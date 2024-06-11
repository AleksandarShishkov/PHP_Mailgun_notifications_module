<?php

    require_once __DIR__ . '/../factory/ControllerFactory.php';

    class Router {

        public function route(array $route) {

            $object = ControllerFactory::createObject($route['controller'] ?? '');

            if(method_exists($object, $route['method'])) {
            
                $object->{$route['method']}();
            
            } else {
                
                header('Location:src/Views/404/404.php');
                die();

            }

        }
    }