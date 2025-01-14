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
    <title>เพิ่มโต๊ะ</title>
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
    if (isset($_GET["submitted"]) and isset($_GET["table"])) {
        if ((!empty($_POST["e_table_address"])) and (!empty($_POST["e_table_description"])) and (!empty($_POST["e_table_type"])) and (!empty($_POST["table_for"]))) {
            require_once "../db_connect.php";
            $e_table_address = $_POST['e_table_address'];
            $e_table_description = $_POST['e_table_description'];
            $e_table_type = $_POST['e_table_type'];
            $fk_eatery_id = $_POST['table_for'];
            $e_table_image = $_FILES['e_table_image']['tmp_name'];
            $e_table_image_path  = $_FILES['e_table_image']['name'];
            if ($e_table_image_path == null) {
                $e_table_image_path = 'No-Image-Placeholder.svg';
            } else {
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                $file_type = $finfo->file($e_table_image);
                $allowed_image_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
                if(!in_array($file_type, $allowed_image_types) ){
                    echo "<br><br><br>";
                    echo '
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <div>
                            ประเภทไฟล์ไม่ถูกต้อง!
                        </div>
                    </div>';
                    echo '<meta http-equiv="refresh" content="1;url=table_add.php">';
                    exit;
                }
            }
            try {
                $sql = "INSERT INTO e_table VALUES (NULL,:e_table_address,:e_table_description,:e_table_type,'ปกติ',:e_table_image_path,:fk_eatery_id,3)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':e_table_address',$e_table_address);
                $stmt->bindParam(':e_table_description',$e_table_description);
                $stmt->bindParam(':e_table_type',$e_table_type);
                $stmt->bindParam(':e_table_image_path',$e_table_image_path);
                $stmt->bindParam(':fk_eatery_id',$fk_eatery_id,PDO::PARAM_INT);
                $stmt->execute();
                if ($e_table_image_path != 'No-Image-Placeholder.svg') {
                    copy($e_table_image,"../images/".$e_table_image_path);
                }
                echo "<br><br><br>";
                echo '
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <div>
                            เพิ่มโต๊ะสำเร็จ!
                        </div>
                    </div>';
                echo '<script language="javascript">alert("เพิ่มโต๊ะสำเร็จ!")</script>';
                clearstatcache();
            } catch(PDOException $e) {
                echo "<br><br><br>";
                echo "พบข้อผิดพลาด: " . $e->getMessage();
            }
        } else {
            echo "<br><br><br>";
            echo '
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <div>
                        โปรดกรอกข้อมูลโต๊ะให้ครบ!
                    </div>
                </div>';
        }
    }
    if (isset($_GET["submitted"]) and isset($_GET["eatery"])) {
        if (!empty($_POST["e_eatery_name"]) and (!empty($_POST["e_eatery_address"])) and (!empty($_POST["e_eatery_phone"]))) {
            require_once "../db_connect.php";
            $e_eatery_name = $_POST['e_eatery_name'];
            $e_eatery_address = $_POST['e_eatery_address'];
            $e_eatery_phone = $_POST['e_eatery_phone'];
            try {
                $sql = "INSERT INTO e_eatery VALUES (NULL,:e_eatery_name,:e_eatery_address,:e_eatery_phone,'เปิดให้บริการ')";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':e_eatery_name',$e_eatery_name);
                $stmt->bindParam(':e_eatery_address',$e_eatery_address);
                $stmt->bindParam(':e_eatery_phone',$e_eatery_phone);
                $stmt->execute();
                echo "<br><br><br>";
                echo '
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <div>
                            เพิ่มร้านสำเร็จ!
                        </div>
                    </div>';
                echo '<script language="javascript">alert("เพิ่มร้านสำเร็จ!")</script>';
                clearstatcache();
            } catch(PDOException $e) {
                echo "พบข้อผิดพลาด: " . $e->getMessage();
            }
        } else {
            echo "<br><br><br>";
            echo '
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <div>
                        โปรดกรอกข้อมูลร้านให้ครบ!
                    </div>
                </div>';
        }
    }
?>
<?php
    require_once "../db_connect.php";
    $sql = "SELECT * FROM e_menu_category";
    $stmt = $pdo->query($sql);
    $emc_data = $stmt->fetchAll();
    $sql = "SELECT * FROM e_eatery";
    $stmt = $pdo->query($sql);
    $e_data = $stmt->fetchAll();
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
    <div class="container">
        <br><br><br>
        <h1 class="pt-5 display-5 text-center">เพิ่มโต๊ะ</h1>
        <br>
        <div class="p-5 m-5 bg-warning bg-gradient bg-opacity-10 border border-warning rounded-3">
            <form action="table_add.php?submitted&table" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="e_table_address">ชื่อโต๊ะ</label>
                    <div class="col-sm-10">
                        <input id="e_table_address" class="form-control" type="text" name="e_table_address" placeholder="ชื่อโต๊ะ" required/>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="e_table_description">คำบรรยายโต๊ะ</label>
                    <div class="col-sm-10">
                        <input id="e_table_description" class="form-control" type="text" name="e_table_description" placeholder="คำบรรยายโต๊ะ" required/>
                    </div>
                </div>
                <br>
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">ประเภทโต๊ะ</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="e_table_type" id="1table" value="1 ที่นั่ง" required>
                            <label class="form-check-label" for="1table">
                                1 ที่นั่ง
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="e_table_type" id="2table" value="2 ที่นั่ง" required>
                            <label class="form-check-label" for="2table">
                                2 ที่นั่ง
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="e_table_type" id="4table" value="4 ที่นั่ง" required>
                            <label class="form-check-label" for="4table">
                                4 ที่นั่ง
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="e_table_type" id="8table" value="8 ที่นั่ง" required>
                            <label class="form-check-label" for="8table">
                                8 ที่นั่ง
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">เพิ่มโต๊ะของร้าน</legend>
                        <div class="col-sm-10">
                            <?php
                                foreach($e_data as $e) {
                                    echo '
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="table_for" id="'.$e["e_eatery_name"].'" value="'.$e["e_eatery_id"].'" required>
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
                <br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="e_table_image">รูปภาพ</label>
                    <div class="col-sm-10">
                        <input id="e_table_image" class="form-control" type="file" name="e_table_image" placeholder="รูปภาพ">
                    </div>
                </div>
                <br>
                <br><br>
                <button type="submit" class="col-sm-2 btn btn-primary" onclick="confirm('ท่านยืนยันการเพิ่มโต๊ะหรือไม่ ?')">เพิ่มโต๊ะ</button>
                <a href="menu.php" class="col-sm-2 btn btn-outline-primary">กลับ</a>
            </form>
        </div>
    </div>
    <div class="container">
        <br><br><br>
        <h1 class="pt-5 display-5 text-center">เพิ่มร้าน</h1>
        <br>
        <div class="p-5 m-5 bg-warning bg-gradient bg-opacity-10 border border-warning rounded-3">
            <form action="table_add.php?submitted&eatery" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="e_eatery_name">ชื่อร้าน</label>
                    <div class="col-sm-10">
                        <input id="e_eatery_name" class="form-control" type="text" name="e_eatery_name" placeholder="ชื่อร้าน" required/>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="e_eatery_address">ที่อยู่ร้าน</label>
                    <div class="col-sm-10">
                        <input id="e_eatery_address" class="form-control" type="text" name="e_eatery_address" placeholder="ที่อยู่ร้าน" required/>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="e_eatery_phone">เบอร์ติดต่อ</label>
                    <div class="col-sm-10">
                        <input id="e_eatery_phone" class="form-control" type="text" name="e_eatery_phone" placeholder="เบอร์ติดต่อ" required/>
                    </div>
                </div>
                <br><br>
                <button type="submit" class="col-sm-2 btn btn-primary" onclick="confirm('ท่านยืนยันการเพิ่มร้านหรือไม่ ?')">เพิ่มร้าน</button>
                <a href="menu.php" class="col-sm-2 btn btn-outline-primary">กลับ</a>
            </form>
        </div>
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