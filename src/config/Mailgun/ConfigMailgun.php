<?php

    class ConfigMailgun {

        private static $instance = null;
        private static $mailgun_vals = null;

        private function __construct() {

            self::$mailgun_vals = [
                'mailgun_api_key' => 'your_mailgun_api_key',
                'mailgun_domain' => 'your_mailgun_domain',
                'sender' => 'send_notification@test.com'
            ];

        }

        private static function init() {

            if(self::$instance == null) {
                self::$instance = new self();
            }

            return self::$instance;
        }

        public static function get_mailgun_val($key) {

            self::init();
            return self::$mailgun_vals[$key] ?? '';

        }
    }