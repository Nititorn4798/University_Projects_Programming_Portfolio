<?php
    session_start();
    if (isset($_SESSION['sess_user']) && isset($_SESSION['sess_id'])) {
        $user = $_SESSION['sess_user'];
        $id = $_SESSION['sess_id'];
        $cmd_ = "SELECT * from users_data WHERE user_username = $user";
        $cmd_result = mysqli_query($db_connect, $cmd_);
        $user_data = mysqli_fetch_array($cmd_result);
        if (empty($user) || $id <> session_id()) {
            echo '<script language="javascript">alert("คุณไม่มีสิทธิใช้งานหน้านี้กรุณา ล็อคอินใหม่อีกครั้ง!")</script>';
            $reload_home = '<meta http-equiv="refresh" content="2;url=user_login.php">';
            echo $reload_home;
            echo '<h1 class="display-1 text-center">คุณไม่มีสิทธิใช้งานหน้านี้กรุณา ล็อคอินใหม่อีกครั้ง!!</h1>';
            exit;
        }
    }
    else {
        echo '<script language="javascript">alert("เกิดผิดพลาดกรุณาล็อคอินใหม่อีกครั้ง!")</script>';
        $reload_home = '<meta http-equiv="refresh" content="2;url=../user/user_login.php">';
        echo $reload_home;
        echo '<h1 class="display-1 text-center">เกิดผิดพลาดกรุณาล็อคอินใหม่อีกครั้ง!!</h1>';
        exit;
    }
