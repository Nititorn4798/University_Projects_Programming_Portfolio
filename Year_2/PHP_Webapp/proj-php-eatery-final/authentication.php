<?php
    require_once "db_connect.php";
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION['sess_user']) && isset($_SESSION['sess_id'])) {
        $user = $_SESSION['sess_user'];
        $id = $_SESSION['sess_id'];

        $sql = "SELECT * from e_eatery_member WHERE e_eatery_member_username = :user";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user',$user);
        $stmt->execute();
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

        $sql = "SELECT * from e_eatery WHERE e_eatery_id = :fk_eatery_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':fk_eatery_id',$user_data["fk_eatery_id"]);
        $stmt->execute();
        $eatery_data = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['sess_user_type'] = $user_data["e_eatery_member_type"];

        if (empty($user) || $id <> session_id()) {
            echo '<script language="javascript">alert("คุณไม่มีสิทธิใช้งานหน้านี้กรุณา ล็อคอินใหม่อีกครั้ง!")</script>';
            $reload = '<meta http-equiv="refresh" content="2;url=../app/login.php">';
            echo $reload;
            echo '
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <div>
                        คุณไม่มีสิทธิใช้งานหน้านี้กรุณาล็อคอินใหม่อีกครั้ง!
                    </div>
                </div>';
            exit;
        }
    }
    else {
        echo '<script language="javascript">alert("เกิดผิดพลาดกรุณาล็อคอินใหม่อีกครั้ง!")</script>';
        $reload = '<meta http-equiv="refresh" content="2;url=../app/login.php">';
        echo $reload;
        echo '
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <div>
                    เกิดผิดพลาดกรุณาล็อคอินใหม่อีกครั้ง!
                </div>
            </div>';
        exit;
    }
