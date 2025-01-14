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
    <title>เข้าสู่ระบบ</title>
</head>

<?php
    if (isset($_GET["submitted"])) {
        if (!empty($_POST["username"]) and (!empty($_POST["password"]))) {
            require_once "../db_connect.php";
            $username = $_POST['username'];
            $password = $_POST['password'];
            $hashpwd =  hash('sha256', $password);
            $sql = "SELECT * FROM e_eatery_member WHERE e_eatery_member_username = :username and e_eatery_member_password = :hashpwd";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username',$username);
            $stmt->bindParam(':hashpwd',$hashpwd);
            $stmt->execute();
            $res = $stmt->fetch();
            if ($res) {
                session_start();
                $_SESSION['sess_user'] = $username;
                $_SESSION['sess_id'] = session_id();
                clearstatcache();
                require_once "../authentication.php";
                if ($user_data["e_eatery_member_type"] == 'ADMIN') {
                    echo '
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <div>
                            เข้าสู่ระบบสำเร็จด้วยสิทธิขั้นสูง!
                        </div>
                    </div>';
                    echo '<script language="javascript">alert("เข้าสู่ระบบสำเร็จด้วยสิทธิขั้นสูง!")</script>';
                    echo '<meta http-equiv="refresh" content="1;url=../admin/menu.php">';
                } else {
                    echo '
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <div>
                            เข้าสู่ระบบสำเร็จ!
                        </div>
                    </div>';
                    echo '<script language="javascript">alert("เข้าสู่ระบบสำเร็จ!")</script>';
                    echo '<meta http-equiv="refresh" content="1;url=order.php">';
                }
            } else {
                echo '
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <div>
                        ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!
                    </div>
                </div>';
                echo '<script language="javascript">alert("ชื่อผู้ใช้หรือรหัสผ่าน ไม่ถูกต้อง!")</script>';
                }
        } else {
            echo '
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <div>
                        โปรดกรอกชื่อผู้ใช้และรหัสผ่าน!
                    </div>
                </div>';
        }
    }
?>

<body>
    <div class="container">
        <h1 class="pt-5 display-5 text-center">เข้าสู่ระบบ</h1>
        <br>
        <div class="p-5 m-5 bg-primary bg-gradient bg-opacity-10 border border-primary rounded-3">
            <form action="login.php?submitted=1" method="post">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="username">ชื่อผู้ใช้</label>
                    <div class="col-sm-10">
                        <input id="username" class="form-control" type="text" name="username" placeholder="Username" required/>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="password">รหัสผ่าน</label>
                    <div class="col-sm-10">
                        <input id="password" class="form-control" type="password" name="password" placeholder="Password" required/>
                    </div>
                </div>
                <br><br>
                <button type="submit" class="col-sm-2 btn btn-primary">เข้าสู่ระบบ</button>
            </form>
    </div>
    <div class="text-center">
        <p>ต้องการสมัครสมาชิก? <a href="register.php">สมัครสมาชิก</a></p>
    </div>
    <footer class="fixed-bottom bg-body-tertiary text-center text-lg-start rounded-top">
        <div class="text-center p-3" style="background-color: rgba(97, 218, 255, 0.05)">
            <a class="text-body" href="#">จัดทำโดย นายนิติธร นันทสินธ์ 65003263019</a>
        </div>
    </footer>
</body>