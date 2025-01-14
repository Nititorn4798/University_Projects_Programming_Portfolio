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
    <title>ล้างคำสั่งซื้อ</title>
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
<?php
    require_once "../db_connect.php";
    try {
        $sql = "UPDATE e_table_order SET tableorder_orderstatus = 'ยกเลิกแล้ว' WHERE tableorder_orderstatus IN ('กำลังปรุง','เสิร์ฟสำเร็จ') AND tableorder_expire > now()";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetch();
        echo '
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <div>
                ล้างคำสั่งซื้อสำเร็จ!
                <meta http-equiv="refresh" content="1;url=menu.php">
            </div>
        </div>';
    } catch(PDOException $e) {
        echo '
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <div>
                "พบข้อผิดพลาด: ' . $e->getMessage().' !
                <meta http-equiv="refresh" content="1;url=order.php?table_selected">
            </div>
        </div>';
    }
?>