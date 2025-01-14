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

<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">&nbsp&nbsp&nbsp&nbspยินดีต้อนรับคุณ <?php include "authentication.php"; echo $_SESSION['sess_user'];?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="shopping.php">เลือกดูสินค้า</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link disabled" href="#">ดูตระกร้า <span class="sr-only">(หน้าปัจจุบัน)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout_l.php">ออกจากระบบ</a>
            </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <br><br><br><h1>รายการสั่งซื้อสินค้า</h1><br>
    </div>
    <div class="container">
        <form action="order_validate.php" method="post">
            <div class="row">
                <div class="col-md-10">

                    <?php
                        include "../db_connect.php";
                        if (isset($_SESSION["sess_id"]) && isset($_SESSION["inCart"])) {
                            echo '
                            <table class="table table-hover">
                            <tr>
                                <th width=10%>ลำดับที่</th>
                                <th width=35%>ชื่อสินค้า</th>
                                <th width=15%>ราคา</th>
                                <th width=10%>จำนวน</th>
                                <th width=15%>ปรับจำนวน</th>
                                <th width=15%>เป็นเงิน</th>
                                <th width=10%>ลบ</th>
                            </tr>
                            ';
                            $total = 0;
                            $sum_price = 0;
                            $numbers = 1;
                            for ($i = 0;$i <= (int)$_SESSION['inCart'];$i++) {
                                if ($_SESSION["product_id"][$i] <> '') {
                                    $cmd_ = "SELECT * from products WHERE product_id = " . $_SESSION["product_id"][$i];
                                    $cmd_result = mysqli_query($db_connect, $cmd_);
                                    $record = mysqli_fetch_array($cmd_result);
                                    if (($_SESSION['product_quantity'][$i] > 1) ) {
                                        $dis = " <a href='cart_reduce.php?product_id=".$record['product_id']."'><button type=button class='btn btn-outline-danger mt-3'>-</button></a> ";
                                    } else {
                                        $dis = "";
                                    }
                                    if ($_SESSION['product_quantity'][$i] < $record['product_quantity']) {
                                        $add = "<a href='cart.php?product_id=".$record['product_id']."'><button type=button class='btn btn-outline-success mt-3'>+</button></a>";
                                    } else {
                                        $add = "";
                                    }
                                    echo "<tr>
                                        <td class='align-middle' width=10%>$numbers</td>
                                        <td class='align-middle' width=35%>" . "<img style='object-fit: cover;' src=../images_db/$record[product_image_path] width='30%' height='30%'>  " . $record['product_name'] . "</td>
                                        <td class='align-middle' width=15%>" . number_format($record['product_price'],2) . " บาท</td>
                                        <td class='align-middle' width=10%>" . $_SESSION['product_quantity'][$i] . "</td>
                                        <td class='align-middle' width=15%>
                                            $add
                                            $dis
                                        </td>
                                        <td class='align-middle' width=15%>" . number_format($record['product_price'] * $_SESSION['product_quantity'][$i],2) ." บาท</td>
                                        <td class='align-middle' width=10%><a class='btn btn-outline-danger mt-3' href='item_delete.php?product_id=$i' onclick=\"return confirm('คุณต้องการลบข้อมูลสินค้า $record[product_name] หรือไม่?')\">ลบ</a></td>
                                    </tr>
                                    ";
                                    $total += $record['product_price'] * $_SESSION['product_quantity'][$i];
                                    $numbers++;
                                }
                            }
                            echo "
                                <td colspan=5><p align=right><b>รวมเงินเงิน</b></p></td>
                                <td colspan=1><p align=right><b>". number_format($total,2) ."</b></p></td>
                                <td colspan=1><p align=left><b> บาท </b></p></td>
                            </table>
                            ";
                            $_SESSION['sess_total'] = $total;
                            echo "<a href='shopping.php'><p align=right><button type=button class='btn btn-outline-success mt-3'>เลือกซื้อสินค้าต่อ</button></p></a>";
                            if ($total > 0) {
                                echo "<a href='order_confirm.php'><p align=right><button type=button class='btn btn-outline-primary mt-3'>ยืนยันการสั่งซื้อ</button></p></a>";
                            } else {
                                echo '<h1 class="display-1 text-center">ไม่พบสินค้าในตระกร้า</h1>';
                            }
                            mysqli_close($db_connect);
                        } else {
                            echo '<p><i>ต้องมีอะไรผิดพลาดตรงไหน
                                ไม่เข้าใจเลยสักครั้ง
                                ไอ้ที่เขาทำฉันนั้นก็ทำ
                                แต่ทำและไม่เคยสมหวัง
                                หรืออาจเป็นเพราะพื้นดวงหรือเปล่า
                                หรือเป็นที่ราศีของดวงดาว
                                เลยทำให้ฉันต้องเหงาอย่างงี้อยู่ใช่ไหม</i></p>';
                            echo '
                                <h1 class="display-1 text-center">ไม่พบสินค้าในตระกร้า</h1>
                            ';
                        }
                    ?>

                </div>
            </div>
        </form>
    </div>
</body>