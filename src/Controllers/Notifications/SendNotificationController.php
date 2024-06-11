<?php

    require_once __DIR__ . '/../../Models/SendNotification.php';

    class SendNotificationController {

        private $notification;

        public function __construct() {
            $this->notification = new SendNotification();
        }

        public function send() {
            $this->notification->send_notifications();
        }
    }