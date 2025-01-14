<!DOCTYPE html>
<html lang="en">
<head>
    <title>ดูข้อมูลประกันภัย</title>
    <meta charset="UTF-8">
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
    include "../db_connect.php";
    include "../user/authentication.php";
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
                <a class="nav-link" href="../user/main.php">หน้าหลัก</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link disabled" href="#">ดูข้อมูลประกันภัย</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../admin/insurance_create_form.php">เพิ่มข้อมูลประกันภัย</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../user/logout.php">ออกจากระบบ</a>
            </li>
            </ul>
        </div>
    </nav>
    <br><br><br>
</body>
</html>
<?php
    include "../db_connect.php";
    $cmd_query = "SELECT * from insurance_data";
    $cmd_result = mysqli_query($db_connect,$cmd_query);
    echo "
        <h3 class='h3x'>รายการข้อมูลประกันภัย</h3>
        <table class='table table-bordered text-center table-hover table-sm table-light' border=1 cellspacing=0>
            <tr>
                <th>เลขที่กรมธรรม์</th>
                <th width=20%>ชื่อผู้ประกัน</th>
                <th width=15%>ประเภทการประกันภัย</th>
                <th width=15%>วงเงินประกันภัย</th>
                <th width=15%>ค่าเบี้ยประกันต่อปี</th>
                <th width=10%>ระยะเวลาการประกันภัย</th>
                <th width=15%>รูปภาพ</th>
                <th width=10%>แก้ไข</th>
            </tr>
    ";
    while ($record = mysqli_fetch_array($cmd_result)) {
        echo "
            <tr>
                <td><p>$record[insurance_number]</p></td>
                <td><p>$record[insurance_owner_name]</p></td>
                <td><p>$record[insurance_type]</p></td>
                <td><p>$record[insurance_limit_am] บาท</p></td>
                <td><p>$record[insurance_annual] บาท</p></td>
                <td><p>$record[insurance_year] ปี</p></td>
                <td><img src=../images/$record[insurance_image_path] width=50%></td>
                <td><p>
                <a href='insurance_update_form.php?insurance_id=$record[insurance_id]' onclick=\"return confirm('คุณต้องการแก้ไขข้อมูล $record[insurance_id] หรือไม่?')\"><img width=30px src='../icons/database-edit-icon.png'></a> | 
                <a href='insurance_delete.php?insurance_id=$record[insurance_id]' onclick=\"return confirm('คุณต้องการลบข้อมูล $record[insurance_id] หรือไม่?')\"><img width=30px src='../icons/delete-icon.png'></a></p></td>
            </tr>";
    }
    echo "</table>";
    echo "\n<br><a class='a_bf' href='insurance_create_form.php' onclick=\"return confirm('คุณต้องการไปหน้าเพิ่มข้อมูลประกันภัยหรือไม่?')\">เพิ่มข้อมูลประกันภัย</a>";