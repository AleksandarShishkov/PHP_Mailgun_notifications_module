<?php

    declare(strict_types=1);

    require_once __DIR__ . '/../db/Database.php';
    require_once __DIR__ . '/../../vendor/autoload.php';
    require_once __DIR__ . '/../Mailer/Mailer.php';


    class SendNotification extends Database{
    
        private $pending_notifications;
        private $mailer;
        private $sql;


        public function send_notifications() {

            $this->sql = "SELECT id, recipient, subject, body
                          FROM notifications
                          WHERE status='pending'";

            $this->pending_notifications = $this->query($this->sql);
            foreach($this->pending_notifications as $notification) {
                $this->mailer = new Mailer($notification);
                
                $this->mailer->send();
                
                $this->update_notification_status($notification['id']);
                
            }
        }


        public function update_notification_status($id) {
            
            $this->sql = "UPDATE notifications
                          SET status='sent'
                          WHERE id=$id";

            $this->query($this->sql);
        }

    }