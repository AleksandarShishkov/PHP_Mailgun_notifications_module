<?php

    require_once __DIR__ . '/../config/DB/ConfigDb.php';

    try {

        $host = ConfigDb::get_db_val('host');
        $username = ConfigDb::get_db_val('username');
        $password = ConfigDb::get_db_val('password');
        $db_name = ConfigDb::get_db_val('db_name');

        $conn = new mysqli($host, $username, $password);
    
        if($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }
    
        $sql = "CREATE DATABASE IF NOT EXISTS $db_name";
    
        if(!$conn->query($sql)) {
            die('Unable to create database ' . $db_name );
        }
    
        $conn = new mysqli($host, $username, $password, $db_name);
    
        $sql = "CREATE TABLE IF NOT EXISTS notifications(
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            recipient VARCHAR(50) NOT NULL,
            subject VARCHAR(255) NOT NULL,
            body VARCHAR(255) NOT NULL,
            status VARCHAR(50) NOT NULL DEFAULT('pending')
        )";
    
        if(!$conn->query($sql)) {
            die('Unable to create table notifications!');
        }       
    
        $conn->close();
        
    } catch(mysqli_sql_exception $e) {
        header('Location:src/Views/notifications/try_again.php?error_conn=true');
        die();
    }