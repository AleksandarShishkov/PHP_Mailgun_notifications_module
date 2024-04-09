<?php

    require_once __DIR__ . '/../config.php';

    try {
        $conn = new mysqli(HOST, USERNAME, PASSWORD);
    
        if($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }
    
        $db_name = DBNAME;
    
        $sql = "CREATE DATABASE IF NOT EXISTS $db_name";
    
        if(!$conn->query($sql)) {
            die('Unable to create database ' . $db_name );
        }
    
    
        $conn = new mysqli(HOST, USERNAME, PASSWORD, DBNAME);
    
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