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
    $reload_home = '<meta http-equiv="refresh" content="0;url=product_query.php">';
    if (isset($_POST["submit"]) && !empty($_POST["product_name"]) && !empty($_POST["product_price"])
            && !empty($_POST["product_quantity"])) {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_quantity = $_POST['product_quantity'];
        $product_type = $_POST['product_type'];
        $product_status = $_POST['product_status'];
        $product_detail = $_POST['product_detail'];
        $product_image = $_FILES['product_image']['tmp_name'];
        $product_image_path = $_FILES['product_image']['name'];

        if ($product_detail == '') {
            $pd_ = "product_description";
        } else {
            $pd_ = "'$product_detail'";
        }

        include "../db_connect.php";
        if ($product_image_path != "") {
            copy($product_image,"images_db/".$product_image_path);
            $cmd = "UPDATE products SET
            product_name = '$product_name',product_price = '$product_price',product_quantity = '$product_quantity',
            product_type = '$product_type',product_status = '$product_status',product_description = $pd_,product_image_path = '$product_image_path' WHERE product_id = $product_id";
        } else {
            $cmd = "UPDATE products SET
            product_name = '$product_name',product_price = '$product_price',product_quantity = '$product_quantity',
            product_type = '$product_type',product_status = '$product_status',product_description = $pd_ WHERE product_id = $product_id";
        }
        $result = mysqli_query($db_connect,$cmd);
        mysqli_close($db_connect);
        if ($result) {
            echo "<p>เพิ่มข้อมูลสำเร็จ!</p>";
            echo '<script language="javascript">alert("แก้ไขข้อมูล' . $product_name . 'สำเร็จ!")</script>';
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