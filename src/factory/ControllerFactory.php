<?php

    require_once __DIR__ . '/../includes/includes.php';

    class ControllerFactory {

        public static function createObject($controller) {

            switch($controller) {

                case 'push_notification':
                    return new PushNotificationController();
                    break;

                default:
                    return new HomeController();
                    break;
            }

        } 
    }