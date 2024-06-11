<?php

    require_once __DIR__ . '/../config/Mailgun/ConfigMailgun.php';
    require_once __DIR__ . '/../../vendor/autoload.php';

    use Mailgun\Mailgun;
    use Mailgun\HttpClient\HttpClientConfigurator;

    class Mailer extends Mailgun {

        private $domain;
        private $sender;
        private $notification;
        private $configurator;

        public function __construct($notification) {

            $api_key = ConfigMailgun::get_mailgun_val('mailgun_apy_key');
            $mailgun_domain = ConfigMailgun::get_mailgun_val('mailgun_domain');
            $sender = ConfigMailgun::get_mailgun_val('sender');

            $this->configurator = new HttpClientConfigurator();
            $this->configurator->setApiKey($api_key);
            parent::__construct($this->configurator);
            $this->domain = $mailgun_domain;
            $this->sender = $sender;
            $this->notification = $notification;
     
        }

        public function send() {                
            
            try {
                $this->messages()->send($this->domain, [
                    'from' => $this->sender,
                    'to' => $this->notification['recipient'],
                    'subject' => $this->notification['subject'],
                    'text' => $this->notification['body']
                ]);

            }catch(Exception $e) {
                echo 'error';
                exit();
            }
   
        }

    }