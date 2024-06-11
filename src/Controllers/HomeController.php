<?php

    class HomeController {

        public function index() {

            header('Location:src/Views/notifications/push_notification.php');
            die();
        
        }

    }