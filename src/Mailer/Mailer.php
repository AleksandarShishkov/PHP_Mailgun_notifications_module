<?php

    require_once __DIR__ . '/../config.php';
    require_once __DIR__ . '/../../vendor/autoload.php';

    use Mailgun\Mailgun;
    use Mailgun\HttpClient\HttpClientConfigurator;

    class Mailer extends Mailgun {

        private $domain;
        private $sender;
        private $notification;
        private $configurator;


        public function __construct($notification) {

            $this->configurator = new HttpClientConfigurator();
            $this->configurator->setApiKey(MAILGUN_API_KEY);
            parent::__construct($this->configurator);
            $this->domain = MAILGUN_DOMAIN;
            $this->sender = SENDER;
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