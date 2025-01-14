<?php
include "db_connect.php";
if (isset($_GET["product_id"])) {
    $get_product_id = $_GET["product_id"];
    $cmd_ = "SELECT * from products WHERE product_id = $get_product_id";
    $cmd_result = mysqli_query($db_connect, $cmd_);
    mysqli_close($db_connect);
    $record = mysqli_fetch_array($cmd_result);
} else {
    echo '<p>ต้องมีอะไรผิดพลาดตรงไหน
        ไม่เข้าใจเลยสักครั้ง
        ไอ้ที่เขาทำฉันนั้นก็ทำ
        แต่ทำและไม่เคยสมหวัง
        หรืออาจเป็นเพราะพื้นดวงหรือเปล่า
        หรือเป็นที่ราศีของดวงดาว
        เลยทำให้ฉันต้องเหงาอย่างงี้อยู่ใช่ไหม</p>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <title>Product Edit - Connect PHP To MySQL</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data" action="product_update.php">
        <div class="box gridcon">
            <div class="b">
                <h1>แก้ไขข้อมูลสินค้า</h1>
                <h1></h1>
            </div>
            <p>รหัสสินค้า :</p>
            <input type="text" name="product_id" value="<?php echo $record['product_id'] ?? ''; ?>">
            <p>ชื่อสินค้า :</p>
            <input type="text" name="product_name" value="<?php echo $record['product_name'] ?? ''; ?>">
            <p>ราคา :</p>
            <input type="text" name="product_price" value="<?php echo $record['product_price'] ?? ''; ?>">
            <p>จำนวน :</p>
            <input type="text" name="product_quantity" value="<?php echo $record['product_quantity'] ?? ''; ?>">
            <p>ประเภท :</p>
            <select name="product_type">
                <option hidden value="<?php echo $record['product_type'] ?? ''; ?>"><?php echo $record['product_type'] ?? ''; ?></option>
                <option value="เครื่องใช้ไฟฟ้า">เครื่องใช้ไฟฟ้า</option>
                <option value="อุปกรณ์สื่อสาร">อุปกรณ์สื่อสาร</option>
                <option value="อื่นๆ">อื่นๆ</option>
            </select>
            <p>สถานะ :</p>
            <select name="product_status">
                <option hidden value="<?php echo $record['product_status'] ?? ''; ?>"><?php echo $record['product_status'] ?? ''; ?></option>
                <option value="ปกติ">ปกติ</option>
                <option value="หมด">หมด</option>
                <option value="มีส่วนลด">มีส่วนลด</option>
            </select>
            <p>รายละเอียด :</p>
            <textarea rows=5 name="product_detail"><?php echo $record['product_detail'] ?? ''; ?></textarea>
            <p>รูปภาพ :</p>
            <input type="file" name="product_image"></input><br>
            <img src="images_db/<?php echo $record['product_image_path'] ?? ''; ?>" width="200vw" alt="">
            <div class="bottom" style="width:100%; display: flex; justify-content: space-around; margin : 10px 0">
                <input type="submit" name="submit" value="ส่ง">
                <input type="reset" name="reset" value="ยกเลิก">
            </div>
        </div>
        <br>
        </div>
    </form>
</body>

</html>