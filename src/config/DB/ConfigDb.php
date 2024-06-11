<?php

    class ConfigDb {

        private static $instance = null;
        private static $db_vals = null;

        private function __construct() {

            self::$db_vals = [
                'host' => 'localhost',
                'username' => 'root',
                'password' => '',
                'db_name' => 'notifications_queue'
            ];

        }
        
        private static function init() {

            if(self::$instance == null) {
                self::$instance = new self();
            }

            return self::$instance;
        }

        public static function get_db_val($key) {

            self::init();
            return self::$db_vals[$key] ?? '';
     
        }

    }