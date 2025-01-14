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
    ob_start();
    session_start();
    include "../db_connect.php";
    include "authentication.php";

    if (isset($_GET["product_id"]) && (!isset($_SESSION['inCart']))) {
        $get_product_id = $_GET["product_id"];
        $_SESSION['inCart'] = 0;
        $_SESSION['product_id'][0] = $get_product_id;
        $_SESSION['product_quantity'][0] = 1;
        header("location:order.php");
    } elseif (isset($_GET["product_id"])) {
        $record = array_search($_GET["product_id"],$_SESSION['product_id']); //หา Array ตาม productid and session pid
        if ((string) $record != "") {
            $cmd_ = "SELECT * from products WHERE product_id = '" . $_GET["product_id"] . "'";
            $cmd_result = mysqli_query($db_connect, $cmd_);
            $recordx = mysqli_fetch_array($cmd_result);
            if ($recordx['product_quantity'] > $_SESSION['product_quantity'][$record]) {
                $_SESSION['product_quantity'][$record] = $_SESSION['product_quantity'][$record] + 1;
                header("location:order.php");
            } else {
                echo '<script language="javascript">alert("เพิ่มจำนวนสินค้าไม่สำเร็จ สินค้าไม่เพียงพอ!")</script>';
                echo '<meta http-equiv="refresh" content="0;url=order.php">';
            }
        } else {
            $_SESSION['inCart'] = $_SESSION['inCart'] + 1;
            $inCartNew = $_SESSION['inCart'];
            $_SESSION['product_id'][$inCartNew] = $_GET['product_id'];
            $_SESSION['product_quantity'][$inCartNew] = 1;
            header("location:order.php");
        }
    }
?>