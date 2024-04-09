<?php

    require_once __DIR__ . '/src/db/database_ini.php';
    require_once __DIR__ . '/src/Controllers/HomeController.php';
    require_once __DIR__ . '/src/Controllers/CheckOnWorkerController.php';
    require_once __DIR__ . '/src/Controllers/PushNotificationController.php';

    $home = new HomeController();
    $check_worker = new CheckOnWorkerController();
    $notification = new PushNotificationController();

    $check_worker->check();

    isset($_POST['push_notification']) ? $action = 'push_notification' : $action = '';

    switch($action) {
        case 'push_notification':
            $notification->push_to_queue();
            break;

        default:
            $home->index();
            break;
    }