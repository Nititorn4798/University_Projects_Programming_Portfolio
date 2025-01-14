<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <title><?php if (isset($_POST["submit"])) {echo "กำลังเข้าสู่ระบบ";}
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
    $reload_home = '<meta http-equiv="refresh" content="1;url=user_login.php">';
    $reload_query = '<meta http-equiv="refresh" content="0;url=../product_query.php">';
    if (isset($_POST["submit"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {
        $user_username = $_POST['username'];
        $user_password = $_POST['password'];
        $hashpwd =  hash('sha256', $user_password);
        include "../db_connect.php";
        $cmd_query_chk = "SELECT * FROM users WHERE user_username = '$user_username' AND user_password = '$hashpwd'";
        $cmd_result_chk = mysqli_query($db_connect,$cmd_query_chk);
        mysqli_close($db_connect);
        $record_chk = mysqli_num_rows($cmd_result_chk);
        if ($record_chk == 1) {
            echo "<p>เข้าสู่ระบบสำเร็จ!</p>";
            echo '<script language="javascript">alert("เข้าสู่ระบบสำเร็จ!")</script>';
            echo $reload_query;
        } else {
            echo"<p>ชื่อผู้ใช้หรือรหัสผ่าน ไม่ถูกต้อง</p>";
            echo '<script language="javascript">alert("ชื่อผู้ใช้หรือรหัสผ่าน ไม่ถูกต้อง!")</script>';
            echo $reload_home;
        }
    }
    else {
        echo "<p>เกิดข้อผิดพลาด ข้อมูลผิดพลาด!!</p>";
        echo '<script language="javascript">alert("เกิดข้อผิดพลาด ข้อมูลผิดพลาด!!!")</script>';
        echo $reload_home;
    }
?>