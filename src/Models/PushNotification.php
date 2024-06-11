<?php

    require_once __DIR__ . '/../db/Database.php';

    class PushNotification extends Database{

        public function push() {

            isset($_POST['recipient']) ? $recipient = $_POST['recipient'] : $recipient = '';
            isset($_POST['subject']) ? $subject = $_POST['subject'] : $subject = '';
            isset($_POST['body']) ? $body = $_POST['body'] : $body = '';
            $table = 'notifications';

            if(!$this->insert_record($table, $recipient, $subject, $body)) {                
                                
                header('Location:src/Views/notifications/push_notification.php?error=Something went wrong. Try again!');
                die();
            
            }

            header('Location:src/Views/notifications/push_notification.php?success=Notification pushed!');
            die();

        }
    }