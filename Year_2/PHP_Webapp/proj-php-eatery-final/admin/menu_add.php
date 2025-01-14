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
    <title>เพิ่มเมนู</title>
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
    if (isset($_GET["submitted"]) and isset($_GET["menu"])) {
        if (!empty($_POST["e_menu_name"]) and (!empty($_POST["e_menu_price"])) and (!empty($_POST["e_menu_remain_amount"])) and (!empty($_POST["category_id"]))) {
            require_once "../db_connect.php";
            $e_menu_name = $_POST['e_menu_name'];
            $e_menu_price = $_POST['e_menu_price'];
            $e_menu_remain_amount = $_POST['e_menu_remain_amount'];
            $e_menu_ingredient = $_POST['e_menu_ingredient'];
            $category_id = $_POST['category_id'];
            $e_menu_image = $_FILES['e_menu_image']['tmp_name'];
            $e_menu_image_path  = $_FILES['e_menu_image']['name'];
            if ($e_menu_image_path == null) {
                $e_menu_image_path = 'No-Image-Placeholder.svg';
            } else {
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                $file_type = $finfo->file($e_menu_image);
                $allowed_image_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
                if(!in_array($file_type, $allowed_image_types) ){
                    echo "<br><br><br>";
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
            try {
                $sql = "INSERT INTO e_menu VALUES (NULL,:e_menu_name,:e_menu_price,:e_menu_remain_amount,:e_menu_ingredient,'ปกติ',:e_menu_image_path,:category_id)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':e_menu_name',$e_menu_name);
                $stmt->bindParam(':e_menu_price',$e_menu_price);
                $stmt->bindParam(':e_menu_remain_amount',$e_menu_remain_amount,PDO::PARAM_INT);
                $stmt->bindParam(':e_menu_ingredient',$e_menu_ingredient);
                $stmt->bindParam(':e_menu_image_path',$e_menu_image_path);
                $stmt->bindParam(':category_id',$category_id,PDO::PARAM_INT);
                $stmt->execute();
                if ($e_menu_image_path != 'No-Image-Placeholder.svg') {
                    copy($e_menu_image,"../images/".$e_menu_image_path);
                }
                echo "<br><br><br>";
                echo '
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <div>
                            เพิ่มเมนูสำเร็จ!
                        </div>
                    </div>';
                echo '<script language="javascript">alert("เพิ่มเมนูสำเร็จ!")</script>';
                clearstatcache();
            } catch(PDOException $e) {
                echo "พบข้อผิดพลาด: " . $e->getMessage();
            }

        } else {
            echo "<br><br><br>";
            echo '
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <div>
                        โปรดกรอกข้อมูลเมนูให้ครบ!
                    </div>
                </div>';
        }
    }
    if (isset($_GET["submitted"]) and isset($_GET["category"])) {
        if (!empty($_POST["e_menu_category_name"]) and (!empty($_POST["e_menu_category_type"])) and (!empty($_POST["category_for"]))) {
            require_once "../db_connect.php";
            $e_menu_category_name = $_POST['e_menu_category_name'];
            $e_menu_category_type = $_POST['e_menu_category_type'];
            $fk_eatery_id = $_POST['category_for'];
            $e_menu_category_image = $_FILES['e_menu_category_image']['tmp_name'];
            $e_menu_category_image_path  = $_FILES['e_menu_category_image']['name'];
            if ($e_menu_category_image_path == null) {
                $e_menu_category_image_path = 'No-Image-Placeholder.svg';
            } else {
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                $file_type = $finfo->file($e_menu_category_image);
                $allowed_image_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
                if(!in_array($file_type, $allowed_image_types) ){
                    echo "<br><br><br>";
                    echo '
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <div>
                            ประเภทไฟล์ไม่ถูกต้อง!
                        </div>
                    </div>';
                    echo '<meta http-equiv="refresh" content="1;url=menu_add.php">';
                    exit;
                }
            }
            try {
                $sql = "INSERT INTO e_menu_category VALUES (NULL,:e_menu_category_name,:e_menu_category_type,'ปกติ',:e_menu_category_image_path,:fk_eatery_id)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':e_menu_category_name',$e_menu_category_name);
                $stmt->bindParam(':e_menu_category_type',$e_menu_category_type);
                $stmt->bindParam(':e_menu_category_image_path',$e_menu_category_image_path);
                $stmt->bindParam(':fk_eatery_id',$fk_eatery_id);
                $stmt->execute();
                if ($e_menu_category_image_path != 'No-Image-Placeholder.svg') {
                    copy($e_menu_category_image,"../images/".$e_menu_category_image_path);
                }
                echo "<br><br><br>";
                echo '
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <div>
                            เพิ่มหมวดหมู่สำเร็จ!
                        </div>
                    </div>';
                echo '<script language="javascript">alert("เพิ่มหมวดหมู่สำเร็จ!")</script>';
                clearstatcache();
            } catch(PDOException $e) {
                echo "พบข้อผิดพลาด: " . $e->getMessage();
            }

        } else {
            echo "<br><br><br>";
            echo '
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <div>
                        โปรดกรอกข้อมูลหมวดหมู่ให้ครบ!
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
<?php
    if (isset($_GET["add"]) and $_GET["add"] == 'category' or (isset($_GET["submitted"]) AND isset($_GET["category"]))) {
    echo '
    <div class="container">
        <br><br><br>
        <h1 class="pt-5 display-5 text-center">เพิ่มหมวดหมู่ (ประเภทเมนู)</h1>
        <br>
        <div class="p-5 m-5 bg-warning bg-gradient bg-opacity-10 border border-warning rounded-3">
            <form action="menu_add.php?submitted&category" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="e_menu_category_name">ชื่อหมวดหมู่</label>
                    <div class="col-sm-10">
                        <input id="e_menu_category_name" class="form-control" type="text" name="e_menu_category_name" placeholder="ชื่อหมวดหมู่" required/>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="e_menu_category_type">ประเภท</label>
                    <div class="col-sm-10">
                        <input id="e_menu_category_type" class="form-control" type="text" name="e_menu_category_type" placeholder="อาหารคาว หรือ อาหารหวาน เป็นต้น" required/>
                    </div>
                </div>
                <br>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">เพิ่มหมวดหมู่ของร้าน</legend>
                        <div class="col-sm-10">';?>
                            <?php
                                foreach($e_data as $e) {
                                    echo '
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="category_for" id="'.$e["e_eatery_name"].'" value="'.$e["e_eatery_id"].'" required>
                                        <label class="form-check-label" for="'.$e["e_eatery_name"].'">
                                            '.$e["e_eatery_name"].'
                                        </label>
                                    </div>
                                    ';
                                }
                            ?><?php echo '
                        </div>
                    </div>
                </fieldset>
                <br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="e_menu_category_image">รูปภาพ</label>
                    <div class="col-sm-10">
                    <input id="e_menu_category_image" class="form-control" type="file" name="e_menu_category_image" placeholder="รูปภาพ">
                    </div>
                </div>
                <br>
                <br><br>
                <button type="submit" class="col-sm-2 btn btn-primary" onclick="return confirm(\'ท่านยืนยันการเพิ่มหมวดหมู่หรือไม่ ?\')">เพิ่มหมวดหมู่</button>
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
    ';
}
?>
<?php
    if (isset($_GET["add"]) and $_GET["add"] == 'menu' or (isset($_GET["submitted"]) AND isset($_GET["menu"]))) {
    echo '
    <div class="container">
        <br><br><br>
        <h1 class="pt-5 display-5 text-center">เพิ่มเมนู</h1>
        <br>
        <div class="p-5 m-5 bg-warning bg-gradient bg-opacity-10 border border-warning rounded-3">
            <form action="menu_add.php?submitted&menu" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="e_menu_name">ชื่อเมนู</label>
                    <div class="col-sm-10">
                        <input id="e_menu_name" class="form-control" type="text" name="e_menu_name" placeholder="ชื่อเมนู" required/>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="e_menu_price">ราคา</label>
                    <div class="col-sm-10">
                        <input id="e_menu_price" class="form-control" type="text" name="e_menu_price" placeholder="ราคา" required/>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="e_menu_remain_amount">จำนวนคงเหลือ</label>
                    <div class="col-sm-10">
                        <input id="e_menu_remain_amount" class="form-control" type="text" name="e_menu_remain_amount" placeholder="จำนวนคงเหลือ" required/>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="e_menu_ingredient">วัตถุดิบ</label>
                    <div class="col-sm-10">
                        <input id="e_menu_ingredient" class="form-control" type="text" name="e_menu_ingredient" placeholder="วัตถุดิบ" value="วัตถุดิบ"/>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="e_menu_image">รูปภาพ</label>
                    <div class="col-sm-10">
                    <input id="e_menu_image" class="form-control" type="file" name="e_menu_image" placeholder="รูปภาพ">
                    </div>
                </div>
                <br>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">ประเภทเมนู</legend>
                        <div class="col-sm-10">';?>
                            <?php
                                foreach($emc_data as $emc) {
                                    $sql = "SELECT * FROM e_eatery WHERE e_eatery_id = ". $emc["fk_eatery_id"];
                                    $stmt = $pdo->query($sql);
                                    $e_data = $stmt->fetch();
                                    echo '
                                    <div class="row">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="category_id" id="'.$emc["e_menu_category_name"].'" value="'.$emc["e_menu_category_id"].'" required>
                                        <label class="form-check-label" for="'.$emc["e_menu_category_name"].'">
                                        <div class="col">' .$emc["e_menu_category_name"] . '</div><div class="col"><span class="text-secondary"> ร้าน '. $e_data["e_eatery_name"] .'</div></span>
                                        </label>
                                    </div></div>
                                    ';
                                }
                            ?><?php echo '
                        </div>
                    </div>
                </fieldset>
                <br><br>
                <button type="submit" class="col-sm-2 btn btn-primary" onclick="confirm(\'ท่านยืนยันการเพิ่มเมนูหรือไม่ ?\')">เพิ่มเมนู</button>
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
';
}?>