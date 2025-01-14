<!DOCTYPE html>
<html lang="en">

<head>
    <title>หน้าหลัก</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>

<?php
include "../db_connect.php";
include "authentication.php";
?>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">&nbsp&nbsp&nbsp&nbspยินดีต้อนรับคุณ <?php echo $user_data["user_fullname"] . " ในฐานะ " . $user_data["user_level"];?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link disabled" href="#">หน้าหลัก</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../admin/insurance_read.php">ดูข้อมูลประกันภัย</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../admin/insurance_create_form.php">เพิ่มข้อมูลประกันภัย</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">ออกจากระบบ</a>
            </li>
            </ul>
        </div>
    </nav>
    <br><br><br>
    <h3 class="text-center">เลือกการทำงานที่ท่านต้องการ</h3>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <br><br>
        <a href="../admin/insurance_read.php" type="button" class="btn btn-primary btn-lg btn-block">ดูข้อมูลประกันภัย</a>
        <a href="../admin/insurance_create_form.php" type="button" class="btn btn-secondary btn-lg btn-block">เพิ่มข้อมูลประกันภัย</a>
    </div>

</body>

</html>