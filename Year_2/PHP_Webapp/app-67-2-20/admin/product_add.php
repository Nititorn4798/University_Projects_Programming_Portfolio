<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <title>Product Add</title>
</head>

<body>
    <div class="box">
        <form method="post" enctype="multipart/form-data" action="product_insert.php">
            <table>
                <tr>
                    <td>ชื่อสินค้า : </td>
                    <td><input type="text" name="product_name"></td>
                </tr>
                <tr>
                    <td>ราคา : </td>
                    <td><input type="text" name="product_price"></td>
                </tr>
                <tr>
                    <td>จำนวน : </td>
                    <td><input type="text" name="product_quantity"></td>
                </tr>
                <tr>
                    <td>ประเภท : </td>
                    <td><select name="product_type">
                            <option value="อาหาร">อาหาร</option>
                            <option value="อุปกรณ์">อุปกรณ์</option>
                            <option value="อื่นๆ">อื่นๆ</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>สถานะ : </td>
                    <td><select name="product_status">
                            <option value="ปกติ">ปกติ</option>
                            <option value="หมด">หมด</option>
                            <option value="มีส่วนลด">มีส่วนลด</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>รายละเอียด : </td>
                    <td><textarea rows=5 name="product_detail"></textarea></td>
                </tr>
                <tr>
                    <td>รูปภาพ : </td>
                    <td><input type="file" name="product_image"></input></td>
                </tr>
            </table>
            <br>
            <input type="submit" name="submit" value="ส่ง">
            <input type="reset" name="reset" value="ยกเลิก">
        </form>
        <br><a class='a_bf' href='product_query.php' onclick="return confirm('คุณต้องการไปหน้าดูข้อมูลสินค้าหรือไม่?')">ดูข้อมูลสินค้า</a>
    </div>
</body>

</html>