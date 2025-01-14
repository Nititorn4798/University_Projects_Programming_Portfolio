<!DOCTYPE html>
<html lang="en">
<head>
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
    include "authentication.php";
    include "../db_connect.php";
    $cmd_query = "SELECT * FROM users WHERE user_username = '$user'";
    $cmd_result = mysqli_query($db_connect,$cmd_query);
    $record = mysqli_fetch_array($cmd_result);
    $user_id = $record['user_id'];
    $total = $_SESSION['sess_total'];
    $cmd = "INSERT INTO orders VALUES
        (null,'$user_id',null,'ยืนยันการสั่งซื้อ','$total')";
    $result = mysqli_query($db_connect,$cmd);
    $order_id = mysqli_insert_id($db_connect);
    for ($i = 0;$i <= (int)$_SESSION['inCart'];$i++) {
        if ($_SESSION["product_id"][$i] <> '') {
            $cmd_ = "SELECT * from products WHERE product_id = " . $_SESSION['product_id'][$i];
            $cmd_result = mysqli_query($db_connect, $cmd_);
            $record = mysqli_fetch_array($cmd_result);
            $product_price = $record['product_price'];
            $total_price = $_SESSION['product_quantity'][$i] * $product_price;
            $cmd = "INSERT INTO orders_detail VALUES (null,'$order_id'," . $_SESSION['product_id'][$i] . "," . $_SESSION['product_quantity'][$i] .",'$total_price','$product_price')";
            if (mysqli_query($db_connect,$cmd)) {
                $update_product = "update products set product_quantity = product_quantity - '". $_SESSION['product_quantity'][$i] ."' where product_id ='" . $_SESSION['product_id'][$i] . "'";
                mysqli_query($db_connect,$update_product);
            }
        }
    }
    mysqli_close($db_connect);
    unset($_SESSION['inCart']);
    unset($_SESSION['product_id']);
    unset($_SESSION['product_quantity']);
    echo '<script language="javascript">alert("การสั่งซื้อสำเร็จ!")</script>';
    echo '<meta http-equiv="refresh" content="0;url=shopping.php">';

//crud login + search + login code เก่าได้ เปิดงานเก่า ได้