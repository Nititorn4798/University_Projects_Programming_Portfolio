<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <style>
        p {
            display: block;
            text-align: center;
        }
    </style>
</head>
</html>
<?php
    include "db_connect.php";
    $cmd_query = "SELECT * from products";
    $cmd_result = mysqli_query($db_connect,$cmd_query);
    echo "
        <table border=1 cellspacing=0>
            <tr>
                <th>รหัสสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>ราคาสินค้า</th>
                <th>จำนวนสินค้า</th>
                <th>ประเภทสินค้า</th>
                <th>รายละเอียดสินค้า</th>
                <th>สถานะสินค้า</th>
                <th>รูปสินค้า</th>
                <th >หมายเหตุ</th>
            </tr>
    ";
    while ($record = mysqli_fetch_array($cmd_result)) {
        echo "
            <tr>
                <td><p>$record[product_id]</p></td>
                <td><p>$record[product_name]</p></td>
                <td><p>$record[product_price]</p></td>
                <td><p>$record[product_quantity]</p></td>
                <td><p>$record[product_type]</p></td>
                <td><p>$record[product_description]</p></td>
                <td><p>$record[product_status]</p></td>
                <td><img src=images_db/$record[product_image_path] width=30%></td>
                <td><p>
                <a href='product_delete.php?product_id=$record[product_id]' onclick=\"return confirm('คุณต้องการลบข้อมูลสินค้า $record[product_name] หรือไม่?')\">ลบ</a> | 
                <a href='product_edit.php?product_id=$record[product_id]' onclick=\"return confirm('คุณต้องการแก้ไขข้อมูลสินค้า $record[product_name] หรือไม่?')\">แก้ไข</a></p></td>
            </tr>";
    }