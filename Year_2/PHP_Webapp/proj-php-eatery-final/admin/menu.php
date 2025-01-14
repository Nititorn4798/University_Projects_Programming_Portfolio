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
    <title>ระบบจัดการ</title>
</head>
<?php
    require_once "../authentication.php";
    if ($user_data["e_eatery_member_type"] != 'ADMIN') {
        echo '<script language="javascript">alert("คุณไม่มีสิทธิใช้งานหน้านี้กรุณา ล็อคอินใหม่อีกครั้ง!")</script>';
        $reload = '<meta http-equiv="refresh" content="2;url=../app/login.php">';
        echo $reload;
        echo '
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <div>
                    คุณไม่มีสิทธิใช้งานหน้านี้กรุณาล็อคอินใหม่อีกครั้ง! (ต้องการสิทธิขั้นสูง)
                </div>
            </div>';
        exit;
    }
?>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark rounded-bottom fixed-top">
        <span>&nbsp&nbsp&nbsp&nbsp</span>
        <a class="navbar-brand" href="#">&nbsp&nbspระบบจัดการร้าน </a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbars04" aria-controls="navbars04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbars04">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">ยินดีต้อนรับคุณ <?php echo $user_data["e_eatery_member_fullname"]; ?> <span class="sr-only"> (ผู้ดูแลระบบ) </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu.php">ตรวจสอบเมนู</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu_add.php?add=menu">เพิ่มเมนู</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu_add.php?add=category">เพิ่มหมวดหมู่</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="table_add.php">เพิ่มโต๊ะ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="table_clear.php">ล้างการจองโต๊ะ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="table_order_clear.php">ล้างคำสั่งซื้อ</a>
                </li>
            </ul>
        </div>
</nav>
<div class="container-sm">
    <?php
    $sql = "SELECT * FROM e_eatery";
    $stmt = $pdo->query($sql);
    $e_eatery = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($e_eatery as $ee) {
        if (true) {
            $sql = "SELECT * FROM e_menu INNER JOIN e_menu_category ON e_menu.fk_menu_category_id = e_menu_category.e_menu_category_id WHERE fk_eatery_id = " . $ee["e_eatery_id"]. " ORDER BY e_menu_status,e_menu_id";
            $stmt = $pdo->query($sql);
            $e_menu = $stmt->fetchAll();
            echo '<br><br><br>';
            if ($e_menu) {
                echo '
                    <br><br><br>
                    <h1 class="pt-5 display-5 text-center">'. 'เมนูร้าน ' . $ee["e_eatery_name"] .'</h1>
                    <br>
                    <div class="table-responsive-sm col order-last p-5 m-5 bg-warning bg-gradient bg-opacity-10 border border-warning rounded-3">
                        <table class="table table-hover table-bordered text-light rounded-3">
                        <caption>'. 'เมนูจากร้าน ' . $ee["e_eatery_name"] .'</caption>
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th width=5%>ID</th>
                                <th width=25%>ชื่อเมนู</th>
                                <th width=15%>ราคา</th>
                                <th width=10%>คงเหลือ</th>
                                <th width=25%>วัตถุดิบ</th>
                                <th width=10%>สถานะ</th>
                                <th width=10%>แก้ไข</th>
                            </tr>
                        </thead><tbody>';
                foreach($e_menu as $em) {
                    echo '
                        <tr>
                            <td class="align-middle text-center">' . $em["e_menu_id"] . '</td>
                            <td class="align-middle">
                                <div class="d-flex align-items-center">
                                    <img style="object-fit: cover;" src="../images/'. $em["e_menu_image_path"] .'" width="15%" height="15%" class="me-2">
                                    '. $em["e_menu_name"] .'
                                </div>
                            </td>
                            <td class="align-middle text-center">' . $em["e_menu_price"] . ' บาท</td>
                            <td class="align-middle text-center">' . $em["e_menu_remain_amount"] . ' จาน</td>
                            <td class="align-middle" style="max-height: 50px; overflow: auto;">'. $em["e_menu_ingredient"] .'</td>
                            <td class="align-middle text-center">'. $em["e_menu_status"] .'</td>
                            <td class="align-middle text-center"><a href="menu_edit.php?menu_id=' . $em["e_menu_id"] . '" class="btn btn-outline-primary mt-auto">แก้ไข</a></td>
                        </tr>';
                }
            }
            echo '
                    </tbody></table>
                    <a class="btn btn-outline-primary mt-3" onclick="return confirm(\'ท่านต้องการเพิ่มเมนูหรือไม่ ?\')" href="menu_add.php?add=menu">เพิ่มเมนู</a>
                    <a class="btn btn-outline-primary mt-3" onclick="return confirm(\'ท่านต้องการเพิ่มหมวดหมู่หรือไม่ ?\')" href="menu_add.php?add=category">เพิ่มหมวดหมู่</a>
                </div>
                ';
        }
    }


    ?>
</div>

    <div class="container mb-5">
        <div class="text-center">
            <p>ต้องการออกจากระบบ? <a href="../app/logout.php">ออกจากระบบ</a></p>
            <br><br><br>
        </div>
    </div>
    <footer class="fixed-bottom bg-body-tertiary text-center text-lg-start rounded-top">
        <div class="text-center p-3" style="background-color: rgba(97, 218, 255, 0.05)">
            <a class="text-body" href="#">จัดทำโดย นายนิติธร นันทสินธ์ 65003263019</a>
        </div>
    </footer>
    </body>
</html>