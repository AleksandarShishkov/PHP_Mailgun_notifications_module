<?php

    require_once __DIR__ . '/../Controllers/SendNotificationController.php';
    
    $send_notifications = new SendNotificationController();

    while(true) {
        
        $send_notifications->send();
        sleep(10);
    }