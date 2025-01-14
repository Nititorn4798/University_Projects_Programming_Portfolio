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
    <title>ระบบร้านอาหาร</title>
</head>

<?php
    require_once "../authentication.php";
    if (isset($_SESSION["sess_table"]) and (!isset($_GET["table"]))) {
        if (!isset($_GET["table_selected"]) and !isset($_GET["category"]) and !isset($_GET["menu"]) and !isset($_GET["order_confirm"]) and !isset($_GET["check_bill"])) {
            header( "location: order.php?table_selected" );
        }
        if (!isset($_GET["table_selected"]) and isset($_GET["category"]) and !isset($_GET["menu"]) and !isset($_GET["order_confirm"])) {
            if (isset($_GET["category"])) {
                echo "<br><br><br>";
                $e_menu_category_id = $_GET["category"];
                $sql = "SELECT * FROM e_menu_category WHERE e_menu_category_id = :e_menu_category_id and e_menu_category_status = 'ปกติ'";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':e_menu_category_id',$e_menu_category_id,PDO::PARAM_INT);
                $stmt->execute();
                $res = $stmt->fetch();
                if ($res) {
                    $_SESSION['sess_category'] = $e_menu_category_id;
                    echo '
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <div>
                            เลือกหมวดหมู่ '.$_SESSION['sess_category'].' สำเร็จ!
                            <meta http-equiv="refresh" content="1;url=order.php?table_selected&category_selected">
                        </div>
                    </div>';
                } else {
                    unset($_SESSION['sess_category']);
                    echo '
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <div>
                            เลือกหมวดหมู่ไม่สำเร็จ!
                        </div>
                        <meta http-equiv="refresh" content="1;url=order.php?table_selected">
                    </div>';
                    }
                }
            }
        if (isset($_SESSION['sess_category']) and isset($_GET["menu"]) and isset($_GET["amount"]) and !isset($_GET["order_confirm"])) {
            echo "<br><br><br>";
            if (is_numeric($_GET["menu"]) and is_numeric($_GET["amount"]) and $_GET["amount"] > 0) {
                try {
                    $e_menu_id = $_GET["menu"];
                    $menu_amount = $_GET["amount"];
                    $sql = "SELECT * FROM e_menu WHERE e_menu_id = :e_menu_id and e_menu_status = 'ปกติ' and e_menu_remain_amount - :menu_amount  >= 0";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':e_menu_id',$e_menu_id,PDO::PARAM_INT);
                    $stmt->bindParam(':menu_amount',$menu_amount,PDO::PARAM_INT);
                    $stmt->execute();
                    $res = $stmt->fetch();
                } catch(PDOException $e) {
                    echo '
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <div>
                            "พบข้อผิดพลาด SELECT: ' . $e->getMessage().' !
                            <meta http-equiv="refresh" content="1;url=order.php?table_selected&category_selected">
                        </div>
                    </div>';
                }
            }
                if ($res) {
                    $_SESSION['sess_menu_id'] = $e_menu_id;
                    echo '
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <div>
                            ค้นหาเมนู '.$_SESSION['sess_menu_id'].' สำเร็จ!
                            <meta http-equiv="refresh" content="1;url=order.php?table_selected&category_selected&menu_added">
                        </div>
                    </div>';
                    try {
                        $sql = "INSERT INTO e_table_order VALUES (NULL,:sess_table,:sess_menu_id,:tableorder_menu_amount,'กำลังปรุง','" . date("Y-m-d H:i:s", strtotime('+9 hours')) . "')";
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindParam(':sess_table',$_SESSION["sess_table"],PDO::PARAM_INT);
                        $stmt->bindParam(':sess_menu_id',$_SESSION['sess_menu_id'],PDO::PARAM_INT);
                        $stmt->bindParam(':tableorder_menu_amount',$menu_amount,PDO::PARAM_INT);
                        $stmt->execute();
                    } catch(PDOException $e) {
                        echo '
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <div>
                                "พบข้อผิดพลาด A: ' . $e->getMessage().' !
                                <meta http-equiv="refresh" content="1;url=order.php?table_selected">
                            </div>
                        </div>';
                    }
                    echo '
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <div>
                            เลือกเมนู '.$_SESSION['sess_menu_id'].' ลงฐานข้อมูลสำเร็จ!
                            <meta http-equiv="refresh" content="1;url=order.php?table_selected&category_selected&menu_added">
                        </div>
                    </div>';
                } else {
                    echo "<br><br><br>";
                    unset($_SESSION['sess_menu_id']);
                    echo '
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <div>
                            เลือกเมนูไม่สำเร็จ!
                        </div>
                        <meta http-equiv="refresh" content="1;url=order.php?table_selected&category_selected">
                    </div>';
                }
        }
        if (isset($_SESSION['sess_category']) and isset($_SESSION['sess_table']) and isset($_GET["order_confirm"]) and !isset($_GET["check_bill"])) {
            echo "<br><br><br>";
            if (is_numeric($_GET["order_confirm"]) AND $_GET["order_confirm"] > 0) {
                try {
                    $order_confirm = $_GET["order_confirm"];
                    $sql = "UPDATE e_table_order SET tableorder_orderstatus = 'เสิร์ฟสำเร็จ' WHERE tableorder_id = :tableorder_id and tableorder_table_id = :sess_table";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':tableorder_id',$order_confirm,PDO::PARAM_INT);
                    $stmt->bindParam(':sess_table',$_SESSION['sess_table'],PDO::PARAM_INT);
                    $stmt->execute();
                    $res = $stmt->fetch();
                } catch(PDOException $e) {
                    echo '
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <div>
                            "พบข้อผิดพลาด UPDATE: ' . $e->getMessage().' !
                            <meta http-equiv="refresh" content="1;url=order.php?table_selected&category_selected">
                        </div>
                    </div>';
                }
                echo '
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <div>
                        ยืนยันการรับออเดอร์หมายเลข '.$order_confirm.' สำเร็จ!
                        <meta http-equiv="refresh" content="1;url=order.php?table_selected&category_selected&menu_added">
                    </div>
                </div>';
            }
        }
        if (isset($_SESSION['sess_category']) and isset($_SESSION['sess_table']) and !isset($_GET["order_confirm"]) and isset($_GET["check_bill"])) {
            echo "<br><br><br>";
            if (is_numeric($_GET["check_bill"]) AND $_GET["check_bill"] > 0) {
                try {
                    $sql = "SELECT SUM(e_table_order.tableorder_menu_amount * e_menu.e_menu_price) as total FROM e_table_order INNER JOIN e_menu ON e_table_order.tableorder_menu_id = e_menu.e_menu_id WHERE e_table_order.tableorder_table_id = " . $_SESSION["sess_table"] . " and e_table_order.tableorder_orderstatus IN ('กำลังปรุง','เสิร์ฟสำเร็จ') and e_table_order.tableorder_expire > now()";
                    $stmt = $pdo->query($sql);
                    $total = $stmt->fetchAll();
                    $sql = "INSERT INTO e_receipt VALUES (NULL,:paid,:user_data,NULL,'จ่ายเงินเสร็จสิ้น')";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':paid',$total[0]["total"]);
                    $stmt->bindParam(':user_data',$user_data["e_eatery_member_id"]);
                    $stmt->execute();

                    $sql = "UPDATE e_table_order SET tableorder_orderstatus = 'คิดเงินสำเร็จ' WHERE e_table_order.tableorder_table_id = " . $_SESSION["sess_table"] . " and e_table_order.tableorder_orderstatus IN ('กำลังปรุง','เสิร์ฟสำเร็จ') and e_table_order.tableorder_expire > now()";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $res = $stmt->fetch();
                } catch(PDOException $e) {
                    echo '
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <div>
                            "พบข้อผิดพลาด INSERT: ' . $e->getMessage().' !
                            <meta http-equiv="refresh" content="1;url=order.php?table_selected">
                        </div>
                    </div>';
                }
                echo '
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <div>
                        ชำระเงินโต๊ะหมายเลข '.$_SESSION["sess_table"].' สำเร็จ!
                        <meta http-equiv="refresh" content="1;url=order.php?table_selected&category_selected&menu_added">
                    </div>
                </div>';
                try {
                    $sql = "UPDATE e_table SET fk_eatery_member_id = 3 " . " WHERE e_table_id = " . $_SESSION["sess_table"];
                    $stmt->bindParam(':user_data',$user_data["e_eatery_member_id"]);
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $res = $stmt->fetch();
                } catch(PDOException $e) {
                    echo '
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <div>
                            "พบข้อผิดพลาด UPDATE: ' . $e->getMessage().' !
                            <meta http-equiv="refresh" content="1;url=order.php?table_selected">
                        </div>
                    </div>';
                }
                unset($_SESSION['sess_table']);
                echo '<meta http-equiv="refresh" content="1;url=order.php?">';
            }
        }
    } else if (isset($_GET["table"])) {
        echo "<br><br><br>";
        $table_id = $_GET["table"];
        $sql = "SELECT * FROM e_table WHERE fk_eatery_member_id = 3 and e_table_id = :table_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':table_id',$table_id);
        $stmt->execute();
        $res = $stmt->fetch();
        if ($res) {
            $_SESSION['sess_table'] = $table_id;
            echo '
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <div>
                    เลือกโต๊ะ '.$_SESSION['sess_table'].' สำเร็จ!
                    <meta http-equiv="refresh" content="1;url=order.php?table_selected">
                </div>
            </div>';
            try {
                $sql = "UPDATE e_table SET fk_eatery_member_id = :user_data WHERE e_table_id = " . $_SESSION["sess_table"];
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':user_data',$user_data["e_eatery_member_id"]);
                $stmt->execute();
                $res = $stmt->fetch();
            } catch(PDOException $e) {
                echo '
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <div>
                        "พบข้อผิดพลาด UPDATE: ' . $e->getMessage().' !
                        <meta http-equiv="refresh" content="1;url=order.php?table_selected">
                    </div>
                </div>';
            }
        } else {
            unset($_SESSION['sess_table']);
            echo '
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <div>
                    เลือกโต๊ะไม่สำเร็จ โต๊ะไม่ว่าง!
                </div>
            </div>';
            echo '<meta http-equiv="refresh" content="1;url=order.php?">';
        }
    } else {
        $sql = "SELECT e_table_id FROM e_table WHERE fk_eatery_member_id = :user_data";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user_data',$user_data["e_eatery_member_id"]);
        $stmt->execute();
        $table_data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($table_data) {
            echo "<br><br><br>";
            $_SESSION['sess_table'] = $table_data["e_table_id"];
            echo '
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <div>
                    พบบัญชีเดิม เลือกโต๊ะ '.$table_data["e_table_id"].' สำเร็จ!
                    <meta http-equiv="refresh" content="1;url=order.php?table_selected">
                </div>
            </div>';
        }
}
?>

<?php
    require_once "../db_connect.php";
    $sql = "SELECT * FROM e_table WHERE fk_eatery_id = ". $user_data["fk_eatery_id"] ." AND e_table_status = 'ปกติ'";
    $stmt = $pdo->query($sql);
    $e_table = $stmt->fetchAll();
?>

<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark rounded-bottom fixed-top">
    <span>&nbsp&nbsp&nbsp&nbsp</span>
    <a class="navbar-brand" href="#">&nbsp&nbspร้าน <?php echo $eatery_data["e_eatery_name"]; ?> </a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbars04" aria-controls="navbars04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbars04">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">ยินดีต้อนรับคุณ <?php echo $user_data["e_eatery_member_fullname"]; ?> <span class="sr-only"> <?php echo (isset($_SESSION["sess_table"]) ? "โต๊ะหมายเลข ". $_SESSION["sess_table"] : "(ยังไม่ได้เลือกโต๊ะ)"); ?> </span></a>
            </li>
        </ul>
        <a class="navbar-brand" href="../images/<?php echo $user_data["e_eatery_member_image_path"]; ?>" target="_blank">
            <img src="../images/<?php echo $user_data["e_eatery_member_image_path"]; ?>" alt="" width="60" height="48">
        </a>
        </div>
        </nav>
    <div class="container-sm">
    <?php
        if (isset($_SESSION["sess_table"]) and isset($_SESSION["sess_menu_id"])) {
            $sql = "SELECT * FROM e_table_order WHERE (tableorder_orderstatus = 'กำลังปรุง' OR tableorder_orderstatus = 'กำลังจอง' OR tableorder_orderstatus = 'เสิร์ฟสำเร็จ') AND tableorder_expire > NOW() AND tableorder_table_id = " . $_SESSION["sess_table"];
            $stmt = $pdo->query($sql);
            $eto_order = $stmt->fetchAll();
            $sql = "SELECT SUM(e_table_order.tableorder_menu_amount * e_menu.e_menu_price) as total FROM e_table_order INNER JOIN e_menu ON e_table_order.tableorder_menu_id = e_menu.e_menu_id WHERE e_table_order.tableorder_table_id = " . $_SESSION["sess_table"] . " and e_table_order.tableorder_orderstatus IN ('กำลังปรุง','เสิร์ฟสำเร็จ') and e_table_order.tableorder_expire > now()";
            $stmt = $pdo->query($sql);
            $total = $stmt->fetchAll();
            echo '<br><br><br>';
            if ($total[0]["total"] > 0) {
                echo '
                    <br><br><br>
                    <br>
                    <div class="table-responsive-sm col order-last p-5 m-5 bg-primary bg-gradient bg-opacity-10 border border-primary rounded-3">
                        <table class="table table-hover">
                        <tr>
                            <th width=10%>ลำดับที่</th>
                            <th width=25%>ชื่อเมนู</th>
                            <th width=15%>ราคา</th>
                            <th width=10%>จำนวน</th>
                            <th width=15%>สถานะ</th>
                            <th width=15%>เป็นเงิน</th>
                            <th width=25%>ปรับ</th>
                        </tr>';
                $i = 1;
                foreach($eto_order as $eto) {
                    $sql = "SELECT * FROM e_menu WHERE e_menu_id = ". $eto["tableorder_menu_id"];
                    $stmt = $pdo->query($sql);
                    $e_menu = $stmt->fetchAll();
                    foreach($e_menu as $em) {
                        echo '
                            <tr>
                                <td class="align-middle text-center" width=10%>'. $i .'</td>
                                <td class="align-middle" width=25%> <img style="object-fit: cover;" src="../images/'. $em["e_menu_image_path"] .'" width="15%" height="15%"> '. $eto["tableorder_menu_id"] . " " . $em["e_menu_name"] .'</td>
                                <td class="align-middle" width=15%>' . $em["e_menu_price"] . ' บาท</td>
                                <td class="align-middle" width=10%>' . $eto["tableorder_menu_amount"] . ' จาน</td>
                                <td class="align-middle" width=15%>'. $eto["tableorder_orderstatus"] .'</td>
                                <td class="align-middle" width=15%>' . $eto["tableorder_menu_amount"] * $em["e_menu_price"] .' บาท</td>
                                <td class="align-middle" width=25%><a href="order.php?order_confirm='. $eto["tableorder_id"] . '" class="btn btn-outline-primary mt-auto ', $eto['tableorder_orderstatus'] <> "กำลังปรุง" ? "disabled" : "" ,'">', $eto['tableorder_orderstatus'] <> "กำลังปรุง" ? "รับแล้ว" : "ยืนยัน" ,'</a></td>
                            </tr>
                            ';
                        $i += 1;
                    }
                }
                echo '
                        <td colspan=4 class="align-middle"><p align=right><b>รวมเงินเงิน</b></p></td>
                        <td colspan=1 class="align-middle"><p align=right><b>'. $total[0]["total"] .'</b></p></td>
                        <td colspan=1 class="align-middle"><p align=left><b> บาท </b></p></td>
                        <td colspan=1 class="align-middle"><p align=left><a class="btn btn-outline-primary mt-3" onclick="return confirm(\'ท่านต้องการชำระเงินหรือไม่ ?\')" href="order.php?check_bill='. $_SESSION["sess_table"] . '">ชำระเงิน</a></p></td>
                        </table>
                    </div>
                    ';
            }

        }
    ?>
    <?php
            if (isset($_GET["table_selected"]) and isset($_SESSION["sess_table"]) and !isset($_GET["category_selected"])) {
                echo '
                    <br><br><br>
                    <h1 class="pt-5 display-5 text-center">เลือกประเภทเมนูที่ต้องการ</h1>
                    <br>
                    <div class="p-5 m-5 bg-primary bg-gradient bg-opacity-10 border border-primary rounded-3">
                        <form action="order.php" method="GET">
                            <div class="row h-100 justify-content-center">
                ';
                $sql = "SELECT * FROM e_menu_category WHERE fk_eatery_id = ". $user_data["fk_eatery_id"] ." AND e_menu_category_status = 'ปกติ'";
                $stmt = $pdo->query($sql);
                $e_menu_category = $stmt->fetchAll();
                if ($e_menu_category) {
                    foreach($e_menu_category as $emc) {
                        echo '
                        <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                            <div class="card">
                                <img src="../images/'. $emc["e_menu_category_image_path"] .'" class="card-img-top img-fluid" style="height: 250px; width: 500px; object-fit: cover;" alt="...">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">'. $emc["e_menu_category_name"] .'</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">'. $emc["e_menu_category_type"] .'</h6>
                                    <p class="card-text mb-4"></p>
                                    <button name="category" value="'. $emc["e_menu_category_id"] . '" type="submit" class="btn btn-primary mt-auto', $emc['e_menu_category_status'] <> "ปกติ" ? "disabled" : "" ,'">', $emc['e_menu_category_status'] <> "ปกติ" ? "หมด" : "เลือก" ,'</button>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                } else {
                    echo '<h1 class="pt-5 display-1 text-center">ไม่พบข้อมูลประเภทเมนู</h1>';
                }
                echo '
                            </div>
                            <br><br>
                        </form>
                    </div>
                    <div class="container mb-5">
                    <div class="text-center">
                        <p>ต้องการออกจากระบบ? <a href="logout.php">ออกจากระบบ</a></p>
                        <br><br><br>
                    </div>
                </div>
                <footer class="fixed-bottom bg-body-tertiary text-center text-lg-start rounded-top">
                    <div class="text-center p-3" style="background-color: rgba(97, 218, 255, 0.05)">
                        <a class="text-body" href="#">จัดทำโดย นายนิติธร นันทสินธ์ 65003263019</a>
                    </div>
                </footer>
            </body>';
                exit;
            }
        ?>
        <?php
            if (isset($_GET["table_selected"]) and isset($_SESSION["sess_table"]) and isset($_GET["category_selected"]) and !isset($_GET["menu_added"])) {
                echo '
                    <br><br><br>
                    <h1 class="pt-5 display-5 text-center">เลือกเมนูที่ต้องการ</h1>
                    <br>
                    <div class="p-5 m-5 bg-primary bg-gradient bg-opacity-10 border border-primary rounded-3">
                        <form action="order.php" method="GET">
                            <div class="row h-100 justify-content-center">
                ';
                $sql = "SELECT * FROM e_menu WHERE fk_menu_category_id = " . $_SESSION['sess_category'] ." AND e_menu_status = 'ปกติ'";
                $stmt = $pdo->query($sql);
                $e_menu = $stmt->fetchAll();
                if ($e_menu) {
                    foreach($e_menu as $em) {
                        echo '
                        <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                            <div class="card">
                                <img src="../images/'. $em["e_menu_image_path"] .'" class="card-img-top img-fluid" style="height: 250px; width: 500px; object-fit: cover;" alt="...">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">'. $em["e_menu_name"] .'</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">' . "ราคา " . $em["e_menu_price"] . " บาท". '</h6>
                                    <h6 class="card-subtitle mb-2 text-muted">' . "คงเหลือ " . $em["e_menu_remain_amount"] . " จาน". '</h6>
                                    <p class="card-text mb-4">'. $em["e_menu_ingredient"] . '</p>
                                    <form action="order.php" method="GET">
                                        <div class="row">
                                            <div class="col pr-1">
                                                <label for="amount">จำนวน</label>
                                                <input class="form-control" id="amount" value="1" min=1 max='. $em["e_menu_remain_amount"] .' type="number" name="amount">
                                            </div>
                                            <div class="col pl-1 mt-auto">
                                                <button name="menu" value="'. $em["e_menu_id"] . '" type="submit" class="btn btn-primary', $em['e_menu_remain_amount'] > 0 ? "" : "disabled" ,'">', $em['e_menu_remain_amount'] > 0 ? "เลือก" : "หมด" ,'</button>
                                            </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                } else {
                        echo '<h1 class="pt-5 display-1 text-center">ไม่พบข้อมูลเมนู</h1>';
                }
                echo '
                        </div>
                        <br>
                        <a class="btn btn-secondary btn-sm" href="order.php">เลือกเมนูอื่นๆ</a>
                        <br><br>
                    </div>
                    <div class="container mb-5">
                    <div class="text-center">
                        <p>ต้องการออกจากระบบ? <a href="logout.php">ออกจากระบบ</a></p>
                        <br><br><br>
                    </div>
                </div>
                <footer class="fixed-bottom bg-body-tertiary text-center text-lg-start rounded-top">
                    <div class="text-center p-3" style="background-color: rgba(97, 218, 255, 0.05)">
                        <a class="text-body" href="#">จัดทำโดย นายนิติธร นันทสินธ์ 65003263019</a>
                    </div>
                </footer>
            </body>';
                exit;
            }
        ?>
        <?php
            if (isset($_GET["table_selected"]) and isset($_SESSION["sess_table"]) and isset($_GET["category_selected"]) and isset($_GET["menu_added"]) and isset($_SESSION["sess_menu_id"])) {
                echo '
                    <h1 class="pt-5 display-5 text-center">เลือกเมนูที่ต้องการ</h1>';
                echo '
                    <div class="p-5 m-5 bg-primary bg-gradient bg-opacity-10 border border-primary rounded-3">
                            <div class="row h-100 justify-content-center">
                    ';
                $sql = "SELECT * FROM e_menu WHERE fk_menu_category_id = " . $_SESSION['sess_category'];
                $stmt = $pdo->query($sql);
                $e_menu = $stmt->fetchAll();
                if ($e_menu) {
                    foreach($e_menu as $em) {
                        echo '
                        <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                            <div class="card">
                                <img src="../images/'. $em["e_menu_image_path"] .'" class="card-img-top img-fluid" style="height: 250px; width: 500px; object-fit: cover;" alt="...">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">'. $em["e_menu_name"] .'</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">' . "ราคา " . $em["e_menu_price"] . " บาท". '</h6>
                                    <h6 class="card-subtitle mb-2 text-muted">' . "คงเหลือ " . $em["e_menu_remain_amount"] . " จาน". '</h6>
                                    <p class="card-text mb-4">'. $em["e_menu_ingredient"] . '</p>
                                    <form action="order.php" method="GET">
                                        <div class="row">
                                            <div class="col pr-1">
                                                <label for="amount">จำนวน</label>
                                                <input class="form-control" id="amount" value="1" min=1 max='. $em["e_menu_remain_amount"] .' type="number" name="amount">
                                            </div>
                                            <div class="col pl-1 mt-auto">
                                                <button name="menu" value="'. $em["e_menu_id"] . '" type="submit" class="btn btn-primary', $em['e_menu_remain_amount'] > 0 ? "" : "disabled" ,'">', $em['e_menu_remain_amount'] > 0 ? "เลือก" : "หมด" ,'</button>
                                            </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                } else {
                        echo '<h1 class="pt-5 display-1 text-center">ไม่พบข้อมูลเมนู</h1>';
                }
                echo '
                            </div>
                            <br>
                            <a class="btn btn-secondary btn-sm" href="order.php">เลือกเมนูอื่นๆ</a>
                            <br><br>
                    </div>
                    <div class="container mb-5">
                    <div class="text-center">
                        <p>ต้องการออกจากระบบ? <a href="logout.php">ออกจากระบบ</a></p>
                        <br><br><br>
                    </div>
                </div>
                <footer class="fixed-bottom bg-body-tertiary text-center text-lg-start rounded-top">
                    <div class="text-center p-3" style="background-color: rgba(97, 218, 255, 0.05)">
                        <a class="text-body" href="#">จัดทำโดย นายนิติธร นันทสินธ์ 65003263019</a>
                    </div>
                </footer>
            </body>';
                exit;
            }
        ?>
    <?php
    if (!isset($_SESSION['sess_table'])) {
        echo '
        <br><br><br>
        <h1 class="pt-5 display-5 text-center">เลือกโต๊ะที่ต้องการ</h1>
        <br>
        <div class="p-5 m-5 bg-primary bg-gradient bg-opacity-10 border border-primary rounded-3">
            <form action="order.php" method="GET">
                <div class="row h-100 justify-content-center align-items-center"> '?>
                    <?php
                        if ($e_table) {
                            foreach($e_table as $et) {
                                echo '
                                <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                                    <div class="card">
                                        <img src="../images/'. $et["e_table_image_path"] .'" class="card-img-top img-fluid" style="height: 250px; width: 500px; object-fit: cover;" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">'. $et["e_table_address"] .'</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">' . $et["e_table_type"] . '</h6>
                                            <h6 class="card-subtitle mb-2 text-muted">' . "หมายเลข (ID) โต๊ะ " . $et["e_table_id"] . "". '</h6>
                                            <p class="card-text">'. $et["e_table_description"] . '</p>
                                            <button name="table" value="'. $et["e_table_id"] . '" type="submit" class="btn btn-primary ', $et['fk_eatery_member_id'] <> 3 ? "disabled" : "" ,'">', $et['fk_eatery_member_id'] <> 3 ? "ไม่ว่าง" : "เลือก" ,'</button>
                                        </div>
                                    </div>
                                </div>
                                ';
                            }
                        } else {
                            echo '<h1 class="pt-5 display-1 text-center">ไม่พบข้อมูลโต๊ะ</h1>';
                        }

                    ?>
                <?php echo ' </div>
                <br><br>
            </form>
    </div>
    <div class="container mb-5">
        <div class="text-center">
            <p>ต้องการออกจากระบบ? <a href="logout.php">ออกจากระบบ</a></p>
            <br><br><br>
        </div>
    </div>
    <footer class="fixed-bottom bg-body-tertiary text-center text-lg-start rounded-top">
        <div class="text-center p-3" style="background-color: rgba(97, 218, 255, 0.05)">
            <a class="text-body" href="#">จัดทำโดย นายนิติธร นันทสินธ์ 65003263019</a>
        </div>
    </footer>
    </body>
    ';
    }
    ?>