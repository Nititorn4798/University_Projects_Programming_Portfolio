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
    <title>สมัครสมาชิก</title>
</head>

<?php
    if (isset($_GET["submitted"])) {
        if (!empty($_POST["username"]) and (!empty($_POST["password"])) and (!empty($_POST["name"]))) {
            require_once "../db_connect.php";
            $username = $_POST['username'];
            $password = $_POST['password'];
            $name = $_POST['name'];
            $member_for = $_POST['member_for'];
            $hashpwd =  hash('sha256', $password);
            $member_image = $_FILES['member_image']['tmp_name'];
            $e_menu_image_path  = $_FILES['member_image']['name'];
            if ($e_menu_image_path == null) {
                $e_menu_image_path = 'No-Image-Placeholder.svg';
            } else {
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                $file_type = $finfo->file($member_image);
                $allowed_image_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
                if(!in_array($file_type, $allowed_image_types) ){
                    echo '
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <div>
                            ประเภทไฟล์ไม่ถูกต้อง!
                        </div>
                    </div>';
                    echo '<meta http-equiv="refresh" content="1;url=register.php">';
                    exit;
                }
            }

            $sql = "SELECT * FROM e_eatery_member WHERE e_eatery_member_username = :username";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username',$username);
            $stmt->execute();
            $res = $stmt->fetch();
            if (!$res) {
                try {
                    $sql = "INSERT INTO e_eatery_member VALUES (NULL,:username,:hashpwd,:name,'ลูกค้าปกติ','ปกติ',:member_image_path,NULL,:member_for)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':name',$name);
                    $stmt->bindParam(':username',$username);
                    $stmt->bindParam(':hashpwd',$hashpwd);
                    $stmt->bindParam(':member_image_path',$e_menu_image_path);
                    $stmt->bindParam(':member_for',$member_for,PDO::PARAM_INT);
                    $stmt->execute();

                    if ($e_menu_image_path != 'No-Image-Placeholder.svg') {
                        copy($member_image,"../images/".$e_menu_image_path);
                    }
                    echo '
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <div>
                                สมัครสมาชิกสำเร็จ!
                            </div>
                        </div>';
                    echo '<script language="javascript">alert("สมัครสมาชิกสำเร็จ!")</script>';
                    echo '<meta http-equiv="refresh" content="1;url=login.php">';
                    clearstatcache();
                } catch(PDOException $e) {
                    echo "พบข้อผิดพลาด: " . $e->getMessage();
                }
            } else {
                echo '
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <div>
                        Username มีผู้ใช้แล้ว กรุณาใช้ชื่ออื่น!
                    </div>
                </div>';
                echo '<script language="javascript">alert("Username มีผู้ใช้แล้ว กรุณาใช้ชื่ออื่น!")</script>';
                }
        } else {
            echo '
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <div>
                        โปรดกรอกชื่อผู้ใช้ ชื่อ-นามสกุล และรหัสผ่าน!
                    </div>
                </div>';
        }
    }
?>
<?php
    require_once "../db_connect.php";
    $sql = "SELECT * FROM e_eatery";
    $stmt = $pdo->query($sql);
    $e_data = $stmt->fetchAll();
?>

<body>
    <div class="container">
        <h1 class="pt-5 display-5 text-center">สมัครสมาชิก</h1>
        <br>
        <div class="p-5 m-5 bg-primary bg-gradient bg-opacity-10 border border-primary rounded-3">
            <form action="register.php?submitted=1" method="post" enctype="multipart/form-data">
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
                <br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="name">ชื่อ-นามสกุล</label>
                    <div class="col-sm-10">
                        <input id="name" class="form-control" type="text" name="name" placeholder="Name" required/>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="member_image">รูปภาพ</label>
                    <div class="col-sm-10">
                    <input id="member_image" class="form-control" type="file" name="member_image" placeholder="Picture">
                    </div>
                </div>
                <br>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">สมัครสมาชิกร้าน</legend>
                        <div class="col-sm-10">
                            <?php
                                foreach($e_data as $e) {
                                    echo '
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="member_for" id="'.$e["e_eatery_name"].'" value="'.$e["e_eatery_id"].'" required>
                                        <label class="form-check-label" for="'.$e["e_eatery_name"].'">
                                            '.$e["e_eatery_name"].'
                                        </label>
                                    </div>
                                    ';
                                }
                            ?>
                        </div>
                    </div>
                </fieldset>
                <br><br>
                <button type="submit" class="col-sm-2 btn btn-primary" onclick="confirm('ท่านยืนยันการสมัครสมาชิกหรือไม่ ?')">สมัครสมาชิก</button>
            </form>
        </div>
    </div>
    <div class="text-center">
        <p>ต้องการเข้าสู่ระบบ? <a href="login.php">เข้าสู่ระบบ</a></p>
    </div>
    <footer class="fixed-bottom bg-body-tertiary text-center text-lg-start rounded-top">
        <div class="text-center p-3" style="background-color: rgba(97, 218, 255, 0.05)">
            <a class="text-body" href="#">จัดทำโดย นายนิติธร นันทสินธ์ 65003263019</a>
        </div>
    </footer>
</body>