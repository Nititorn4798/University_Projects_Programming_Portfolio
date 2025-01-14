<?php
    $db_host = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "project_cs65003263019_eatery";

    try {
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_username, $db_password);
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้: " . $e->getMessage();
    }