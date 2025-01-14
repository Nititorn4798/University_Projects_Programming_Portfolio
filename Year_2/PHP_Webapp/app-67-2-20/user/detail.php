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
include "../db_connect.php";
include "authentication.php";
if (isset($_GET["product_id"])) {
    $get_product_id = $_GET["product_id"];
    $cmd_ = "SELECT * from products WHERE product_id = $get_product_id";
    $cmd_result = mysqli_query($db_connect, $cmd_);
    mysqli_close($db_connect);
    $record_chk = mysqli_num_rows($cmd_result);
    if ($record_chk == 0) {
        echo '<p>ไม่พบสินค้าดังกล่าว</p>';
        exit();
    }
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

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">&nbsp&nbsp&nbsp&nbspยินดีต้อนรับคุณ <?php echo $_SESSION['sess_user'];?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="shopping.php">เลือกดูสินค้า</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="order.php">ดูตระกร้า</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout_l.php">ออกจากระบบ</a>
            </li>
            </ul>
        </div>
    </nav>
    <?php
    echo '
        <br><br><br><br>
        <div class="container text-center">
            <div class="row">
        ';
    while ($record = mysqli_fetch_array($cmd_result)) {
        echo "<div class='col-md-4'>";
        echo "<div><img class='btn btn-outline-primary mt-3' src=../images_db/$record[product_image_path] width='100%' height='100%'></div> <br><br>";
        echo "</div>";
        echo "<div class='col-md-6'>";
        echo "<br><br>รหัสสินค้า : $record[product_name] <br>";
        echo "ชื่อสินค้า : $record[product_description] <br>";
        echo "ราคา : $record[product_price] <br>";
        echo "ประเภท : $record[product_type] <br>";
        echo "รายละเอียด : $record[product_description] <br>";
        if ($record['product_quantity'] > 0) {
            echo "<a class='btn btn-outline-info mt-3' href='cart.php?product_id=$record[product_id]'>เพิ่มลงในตระกร้า</a>";
        } else {
            echo "<a class='btn btn-danger mt-3' href='#'>สินค้าหมด</a>";
        }
        echo "</div>";
    }
    echo '  </div>
            </div>';
    ?>
</body>

</html>