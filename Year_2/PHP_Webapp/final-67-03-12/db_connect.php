<?php
    $db_host = "localhost";
    $db_username = "cs019";
    $db_password = "@dm1nI234";
    $db_name = "cs65003263019_insurance";
    $db_connect = mysqli_connect($db_host,$db_username,$db_password,$db_name);
    if(!$db_connect){
        die("ไม่สามารถเชื่อมต่อฐานข้อมูลได้". mysqli_connect_error());
    }
    mysqli_query($db_connect,"SET NAMES 'utf8'");