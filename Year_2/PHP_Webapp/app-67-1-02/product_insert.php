<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
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
    if (isset($_POST["submit"])) {
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_quantity = $_POST['product_quantity'];
        $product_type = $_POST['product_type'];
        $product_status = $_POST['product_status'];
        $product_detail = $_POST['product_detail'];
        $product_image = $_FILES['product_image']['tmp_name'];
        $product_image_path = $_FILES['product_image']['name'];
        
        include "db_connect.php";
        $cmd = "INSERT INTO products VALUES
            (null,'$product_name','$product_price','$product_quantity',
            '$product_type','$product_status','$product_detail','$product_image_path')";
        $result = mysqli_query($db_connect,$cmd);
        if ($result) {
            echo "<p>เพิ่มข้อมูลสำเร็จ!</p>";
        }
        else {
            echo "<p>เกิดข้อผิดพลาด</p>";
        }
    }
    else {
        echo "<p>เกิดข้อผิดพลาด ไม่พบข้อมูล!!</p>";
    }
?>