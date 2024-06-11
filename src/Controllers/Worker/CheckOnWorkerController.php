<?php

    require_once __DIR__ . '/../../Jobs/exec_job.php';

    class CheckOnWorkerController {

        public function check() {

            $log_file_path = __DIR__ . '/../../Jobs/Log/error_log.log';
            $log_contents = file_get_contents($log_file_path);

            if (strpos($log_contents, 'error') !== false) {
                file_put_contents($log_file_path, '');
                header('Location:src/Views/notifications/try_again.php?error_mail=true');
                die();
            }
        }
    }