<?php

    require_once __DIR__ . '/../Models/PushNotification.php';

    
    class PushNotificationController {

        private $push_model;

        public function __construct() {
            $this->push_model = new PushNotification();
        }

        public function push_to_queue() {
            $this->push_model->push();
        }
    }