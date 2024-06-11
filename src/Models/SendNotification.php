<?php

    declare(strict_types=1);

    require_once __DIR__ . '/../db/Database.php';
    require_once __DIR__ . '/../../vendor/autoload.php';
    require_once __DIR__ . '/../Mailer/Mailer.php';


    class SendNotification extends Database{
    
        private $table;

        public function __construct() {
            $this->table = 'notifications';
        }

        public function send_notifications() {

            $sql = "SELECT id, recipient, subject, body
                          FROM notifications
                          WHERE status='pending'";

            $pending_notifications = $this->query($sql);
            
            foreach($pending_notifications as $notification) {

                $mailer = new Mailer($notification);
                
                $mailer->send();

                $this->update_notification_status($notification['id']);
                
            }

        }

        public function update_notification_status($id) {
            
            if(!$this->update_db($this->table, $id)) {
                header('Location:src/Views/notifications/push_notification.php?error=Couldn`t update the record. Check the DB!');
                die();
            }

        }

    }