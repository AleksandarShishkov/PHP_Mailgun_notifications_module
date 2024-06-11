<?php

    require_once __DIR__ . '/database_ini.php';

    
    class Database extends mysqli {

        public function __construct() {

            $host = ConfigDb::get_db_val('host');
            $username = ConfigDb::get_db_val('username');
            $password = ConfigDb::get_db_val('password');
            $db_name = ConfigDb::get_db_val('db_name');

            $conn = parent::__construct($host, $username, $password, $db_name);

            if(!$conn) {
                die('Unable to connect to the database!');
            }

        }

        public function query(string $sql, int $resultmode = MYSQLI_STORE_RESULT) {

            $result = parent::query($sql);
            return $result;

        }

        public function insert_record($table, $recipient, $subject, $body) {

            $sql = "INSERT INTO $table(
                                    recipient,
                                    subject,
                                    body
                                )VALUES(
                                    '$recipient',
                                    '$subject',
                                    '$body'
                                )";

            $result = $this->query($sql);

            return $result;
        
        }

        public function update_db($table, $id) {

            $sql = "UPDATE $table
                          SET status='sent'
                          WHERE id=$id";

            $result = $this->query($sql);

            return $result;

        }
        
    }
