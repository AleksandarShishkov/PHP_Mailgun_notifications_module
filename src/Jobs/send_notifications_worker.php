<?php

    require_once __DIR__ . '/../Controllers/Notifications/SendNotificationController.php';
    
    $send_notifications = new SendNotificationController();

    while(true) {
        
        $send_notifications->send();
        sleep(10);
    }