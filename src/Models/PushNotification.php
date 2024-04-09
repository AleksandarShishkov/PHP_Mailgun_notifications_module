<?php

    require_once __DIR__ . '/../db/Database.php';

    class PushNotification extends Database{

        private $recipient;
        private $subject;
        private $body;
        private $sql;


        public function push() {

            isset($_POST['recipient']) ? $this->recipient = $_POST['recipient'] : $this->recipient = '';
            isset($_POST['subject']) ? $this->subject = $_POST['subject'] : $this->subject = '';
            isset($_POST['body']) ? $this->body = $_POST['body'] : $this->body = '';

            if($this->subject != ' ') {

                $this->sql = "INSERT INTO notifications(
                                           recipient,
                                           subject,
                                           body
                                         )VALUES(
                                           '$this->recipient',
                                           '$this->subject',
                                           '$this->body'
                                         )";
                                         
                
                
                
                if($this->query($this->sql)) {
                    header('Location:src/Views/notifications/push_notification.php?success=Notification pushed!');
                    die();
                }
            }

            header('Location:src/Views/notifications/push_notification.php?error=All fields should contain a value!');
            die();

        }
    }