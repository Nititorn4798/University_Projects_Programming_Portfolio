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
    $cmd_query = "SELECT * from products ORDER BY product_quantity DESC";
    $cmd_result = mysqli_query($db_connect,$cmd_query);
    mysqli_close($db_connect)
?>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">&nbsp&nbsp&nbsp&nbspยินดีต้อนรับคุณ <?php echo $user;?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link disabled" href="#">เลือกดูสินค้า <span class="sr-only">(หน้าปัจจุบัน)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="order.php">ดูตระกร้า</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout_l.php">ออกจากระบบ</a>
            </li>
            </ul>
        </div>
    </nav>
    <?php
    echo '
    <br><br>
    <div class="container text-center">
        <div class="row align-items-start">
    ';
        while($record = mysqli_fetch_array($cmd_result)) {
            if ($record['product_quantity'] > 0)  {
                echo "<div class='col-sm-3'>";
                echo "<div style='width:200px; height:200px; margin : 0 auto;'><img style='object-fit: cover;' src=../images_db/$record[product_image_path] class='mt-4 p-2 my-2 border' width='100%' height='100%'></div> <br><br>";
                echo "ชื่อสินค้า : $record[product_name] <br>";
                echo "รายละเอียด : $record[product_description] <br>";
                echo "ราคา : $record[product_price] <br>";
                echo "จำนวนคงเหลือ : $record[product_quantity] <br>";
                echo "<a class='btn btn-outline-success mt-3' href='detail.php?product_id=$record[product_id]'>รายละเอียด</a>   ";
                echo "<a class='btn btn-outline-info mt-3' href='cart.php?product_id=$record[product_id]'>เพิ่มลงในตระกร้า</a>";
                echo "</div>";
            } else {
                echo "<div class='col-sm-3'>";
                echo "<div style='width:200px; height:200px; margin : 0 auto;'><img style='object-fit: cover;' src=../images_db/$record[product_image_path] class='mt-4 p-2 my-2 border' width='100%' height='100%'></div> <br><br>";
                echo "ชื่อสินค้า : $record[product_name] <br>";
                echo "รายละเอียด : $record[product_description] <br>";
                echo "ราคา : $record[product_price] <br>";
                echo "จำนวนคงเหลือ : $record[product_quantity] <br>";
                echo "<a class='btn btn-outline-success mt-3' href='detail.php?product_id=$record[product_id]'>รายละเอียด</a>   ";
                echo "<a class='btn btn-danger mt-3' href='#'>สินค้าหมด</a>";
                echo "</div>";
            }

        }
    echo '  </div>
        </div>';
    ?>
</body>

</html>
