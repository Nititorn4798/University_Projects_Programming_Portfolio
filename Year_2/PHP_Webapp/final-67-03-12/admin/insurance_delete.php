<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <style>
        p {
            display: block;
            text-align: center;
        }
    </style>
</head>
</html>
<?php
    include "../db_connect.php";
    if (isset($_GET["insurance_id"])) {
        $get_insurance_id = $_GET["insurance_id"];
        $cmd_ = "DELETE from insurance_data WHERE insurance_id = $get_insurance_id";
        $cmd_result = mysqli_query($db_connect,$cmd_);
        echo '<script language="javascript">alert("ลบข้อมูลประกันภัยที่มีเลขที่ประกันภัย คือ '.$get_insurance_id.' สำเร็จ!")</script>';
        $reload_home = '<meta http-equiv="refresh" content="1;url=insurance_read.php">';
        echo $reload_home;
    } else {
        echo '<p>ต้องมีอะไรผิดพลาดตรงไหน</p>';
    }
