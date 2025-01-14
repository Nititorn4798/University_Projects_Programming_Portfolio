<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <title><?php if (isset($_POST["submit"])) {echo "กำลังสมัครสมาชิก";}
    else {echo "เกิดข้อผิดพลาด ไม่พบข้อมูล!!";} ?></title>
    <style>
        p {
            display: block;
            text-align: center;
        }
    </style>
</head>
</html>
<?php
    clearstatcache();
    $reload_home = '<meta http-equiv="refresh" content="2;url=user_login.php">';
    // var_dump($_POST["username"],$_POST["password"],$_POST['fname']);
    if (isset($_POST["submit"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {
        $user_username = $_POST['username'];
        $user_password = $_POST['password'];
        $user_fname = $_POST['fname'];

        $hashpwd =  hash('sha256', $user_password);
        include "../db_connect.php";
        $cmd_query_chk = "SELECT * FROM users_data WHERE user_username = '$user_username'";
        $cmd_result_chk = mysqli_query($db_connect,$cmd_query_chk);
        $record_chk = mysqli_num_rows($cmd_result_chk);
        if ($record_chk == 0) {
            $cmd = "INSERT INTO users_data VALUES
            (NULL,'$user_username','$hashpwd','$user_fname',now(),'ผู้ใช้งาน')";
            $result = mysqli_query($db_connect,$cmd);
            mysqli_close($db_connect);
            if ($result) {
                echo "<p>สมัครสมาชิกสำเร็จ!</p>";
                echo '<script language="javascript">alert("เพิ่มข้อมูลสำเร็จ!")</script>';
                echo $reload_home;
            }
            else {
                echo "<p>เกิดข้อผิดพลาด</p>";
                echo '<script language="javascript">alert("เกิดข้อผิดพลาด!")</script>';
                echo $reload_home;
            }
        } else {
            echo"<p>Username มีผู้ใช้แล้ว กรุณาใช้ชื่ออื่น</p>";
            echo $reload_home;
        }
    }
    else {
        echo "<p>เกิดข้อผิดพลาด ข้อมูลผิดพลาด!!</p>";
        echo '<script language="javascript">alert("เกิดข้อผิดพลาด ข้อมูลผิดพลาด!!!")</script>';
        echo $reload_home;
    }
?>