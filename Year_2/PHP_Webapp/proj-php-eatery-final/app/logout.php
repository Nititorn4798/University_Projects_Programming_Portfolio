<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ออกจากระบบ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <style>
        p {
            display: block;
            text-align: center;
        }
    </style>
</head>

<?php
    include "../authentication.php";
    session_destroy();
    $reload_home = '<meta http-equiv="refresh" content="1;url=login.php">';
    echo $reload_home;
    echo '
    <div class="alert alert-warning d-flex align-items-center" role="alert">
        <div>
        ออกจากระบบสำเร็จ!
        </div>
    </div>';
    exit;