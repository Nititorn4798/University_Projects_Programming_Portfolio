<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <title><?php if (isset($_POST["submit"])) {echo "เพิ่มข้อมูลสำเร็จ";}
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
    $reload_home = '<meta http-equiv="refresh" content="2;url=insurance_create_form.php">';
    if (isset($_POST["submit"]) && !empty($_POST["insurance_owner_name"]) && !empty($_POST["insurance_number"])) {
        $insurance_owner_name  = $_POST['insurance_owner_name'];
        $insurance_number = $_POST['insurance_number'];
        $insurance_id_card  = $_POST['insurance_id_card'];
        $insurance_birthday  = $_POST['insurance_birthday'];
        $insurance_address  = $_POST['insurance_address'];
        $insurance_phone  = $_POST['insurance_phone'];
        $insurance_type   = $_POST['insurance_type'];
        $insurance_limit_am   = $_POST['insurance_limit_am'];
        $insurance_annual   = $_POST['insurance_annual'];
        $insurance_year   = $_POST['insurance_year'];
        $insurance_payee_name   = $_POST['insurance_payee_name'];
        $insurance_image = $_FILES['insurance_image']['tmp_name'];
        $insurance_image_path  = $_FILES['insurance_image']['name'];
        if ($insurance_image_path == null) {
            $insurance_image_path = 'No-Image-Placeholder.svg';
        }

        include "../db_connect.php";
        $cmd = "INSERT INTO insurance_data VALUES
            (null,'$insurance_owner_name','$insurance_number','$insurance_id_card',
            '$insurance_birthday','$insurance_address','$insurance_phone','$insurance_type',
            '$insurance_limit_am','$insurance_annual','$insurance_year','$insurance_payee_name','$insurance_image_path','ปกติ')";
        if ($insurance_image_path != 'No-Image-Placeholder.svg') {
            copy($insurance_image,"../images/".$insurance_image_path);
        }
        $result = mysqli_query($db_connect,$cmd);
        mysqli_close($db_connect);
        if ($result) {
            echo "<p>เพิ่มข้อมูลสำเร็จ!</p>";
            echo '<script language="javascript">alert("เพิ่มข้อมูลสำเร็จ!")</script>';
            echo $reload_home;
        }
        else {
            echo "<p>เกิดข้อผิดพลาด</p>";
            echo '<script language="javascript">alert("เกิดข้อผิดพลาด!")</script>';
            echo $reload_home;
        }
    }
    else {
        echo "<p>เกิดข้อผิดพลาด ข้อมูลผิดพลาด!!</p>";
        echo '<script language="javascript">alert("เกิดข้อผิดพลาด ข้อมูลผิดพลาด!!!")</script>';
        echo $reload_home;
    }
?>