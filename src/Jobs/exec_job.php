<?php
    
    $path_to_worker = __DIR__ . '/send_notifications_worker.php';
    $path_to_log = __DIR__ . '/Log/error_log.log';


    exec("ps -f", $output, $return_var);
    $process = false;

    foreach($output as $line) {
        if(strpos($line, '&') !== false) {
            $process = true;
            break;
        }
    }

    if(!$process) {
        exec("start /b php $path_to_worker > $path_to_log 2>&1");
    }
