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
    include "authentication.php";
    include "../db_connect.php";
    if (isset($_GET["product_id"])) {
            $_SESSION['product_id'][$_GET["product_id"]] = '';
            $_SESSION['product_quantity'][$_GET["product_id"]] = '';
            header("location:order.php");
    }