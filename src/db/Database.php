<?php

    require_once __DIR__ . '/../config.php';

    
    class Database extends mysqli {

        private $conn;

        public function __construct() {
            $this->conn = $this->connect(HOST, USERNAME, PASSWORD, DBNAME);
        }
    }