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
    <title>แก้ไขข้อมูล</title>
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
    if (isset($_GET["submitted"]) and isset($_GET["menu"])) {
        if (!empty($_POST["e_menu_name"]) and (!empty($_POST["e_menu_price"])) and (!empty($_POST["e_menu_remain_amount"])) and (!empty($_POST["category_id"])) and (!empty($_POST["e_menu_status"]))) {
            require_once "../db_connect.php";
            $e_menu_id = $_POST['e_menu_id'];
            $e_menu_name = $_POST['e_menu_name'];
            $e_menu_price = $_POST['e_menu_price'];
            $e_menu_remain_amount = $_POST['e_menu_remain_amount'];
            $e_menu_ingredient = $_POST['e_menu_ingredient'];
            $e_menu_status = $_POST['e_menu_status'];
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
                $e_menu_image_pathx = "'".$e_menu_image_path."'";
                if ($e_menu_image_path == 'No-Image-Placeholder.svg') {
                    $e_menu_image_pathx = "e_menu_image_path";
                }
                $sql = "UPDATE e_menu SET e_menu_name = :e_menu_name,e_menu_price = :e_menu_price,e_menu_remain_amount = :e_menu_remain_amount,e_menu_ingredient = :e_menu_ingredient,e_menu_status = :e_menu_status,e_menu_image_path = " . $e_menu_image_pathx . ",fk_menu_category_id = :category_id WHERE e_menu_id = :e_menu_id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':e_menu_id',$e_menu_id,PDO::PARAM_INT);
                $stmt->bindParam(':e_menu_name',$e_menu_name);
                $stmt->bindParam(':e_menu_price',$e_menu_price);
                $stmt->bindParam(':e_menu_remain_amount',$e_menu_remain_amount,PDO::PARAM_INT);
                $stmt->bindParam(':e_menu_ingredient',$e_menu_ingredient);
                $stmt->bindParam(':e_menu_status',$e_menu_status);
                $stmt->bindParam(':category_id',$category_id,PDO::PARAM_INT);
                if ($e_menu_image_path != 'No-Image-Placeholder.svg') {
                    copy($e_menu_image,"../images/".$e_menu_image_path);
                }
                $stmt->execute();
                echo "<br><br><br>";
                echo '
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <div>
                            แก้ไขเมนูสำเร็จ!
                        </div>
                        <meta http-equiv="refresh" content="1;url=menu.php">
                    </div>';
                echo '<script language="javascript">alert("แก้ไขเมนูสำเร็จ!")</script>';
                clearstatcache();
                exit;
            } catch(PDOException $e) {
                echo "<br><br><br>";
                echo "พบข้อผิดพลาด: " . $e->getMessage();
                exit;
            }

        } else {
            echo "<br><br><br>";
            echo '
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <div>
                        โปรดกรอกข้อมูลเมนูให้ครบ!
                    </div>
                    <meta http-equiv="refresh" content="1;url=menu.php">
                </div>';
            exit;
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

    if (!empty($_GET["menu_id"]) AND !isset($_GET["submitted"]) AND !isset($_GET["menu"])) {
        try {
            $menu_id = $_GET["menu_id"];
            $sql = "SELECT * FROM e_menu WHERE e_menu_id = :e_menu_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':e_menu_id',$menu_id,PDO::PARAM_INT);
            $stmt->execute();
            $e_menu = $stmt->fetch();
            if (!$e_menu) {
                echo '
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <div>
                        ไม่พบเมนูที่ต้องการ!
                    </div>
                    <meta http-equiv="refresh" content="1;url=menu.php">
                </div>';
                exit;
            }
        } catch(PDOException $e) {
            echo '
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <div>
                    ไม่พบสิ่งที่คุณต้องการ!
                </div>
                <meta http-equiv="refresh" content="1;url=menu.php">
            </div>';
        }
    } else if (!isset($_GET["submitted"]) AND !isset($_GET["menu"])) {
        echo '
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <div>
                ไม่พบเมนูที่ต้องการ!
            </div>
            <meta http-equiv="refresh" content="1;url=menu.php">
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
<body>
    <div class="container">
        <br><br><br>
        <h1 class="pt-5 display-5 text-center">แก้ไขข้อมูลเมนู</h1>
        <br>
        <div class="p-5 m-5 bg-warning bg-gradient bg-opacity-10 border border-warning rounded-3">
            <form action="menu_edit.php?submitted&menu" method="post" enctype="multipart/form-data">
                <br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="e_menu_id">ID</label>
                    <div class="col-sm-10">
                        <input id="e_menu_id" class="form-control text-muted" type="text" name="e_menu_id" placeholder="menu id" value="<?php echo $e_menu["e_menu_id"] ?>" readonly/>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="e_menu_name">ชื่อเมนู</label>
                    <div class="col-sm-10">
                        <input id="e_menu_name" class="form-control" type="text" name="e_menu_name" placeholder="ชื่อเมนู" value="<?php echo $e_menu["e_menu_name"] ?>" required/>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="e_menu_price">ราคา</label>
                    <div class="col-sm-10">
                        <input id="e_menu_price" class="form-control" type="text" name="e_menu_price" placeholder="ราคา" value="<?php echo $e_menu["e_menu_price"] ?>" required/>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="e_menu_remain_amount">จำนวนคงเหลือ</label>
                    <div class="col-sm-10">
                        <input id="e_menu_remain_amount" class="form-control" type="text" name="e_menu_remain_amount" placeholder="จำนวนคงเหลือ" value="<?php echo $e_menu["e_menu_remain_amount"] ?>" required/>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="e_menu_ingredient">วัตถุดิบ</label>
                    <div class="col-sm-10">
                        <input id="e_menu_ingredient" class="form-control" type="text" name="e_menu_ingredient" placeholder="วัตถุดิบ" value="<?php echo $e_menu["e_menu_ingredient"] ?>"/>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="e_menu_image">สถานะ</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="e_menu_status">
                            <option selected hidden value="<?php echo $e_menu["e_menu_status"] ?>"><?php echo $e_menu["e_menu_status"] ?></option>
                            <option value="ปกติ">ปกติ</option>
                            <option value="งดใช้">งดใช้</option>
                        </select>
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
                <div>
                    <img class="img-thumbnail" width="200px" src="../images/<?php echo $e_menu["e_menu_image_path"] ?>">
                </div>
                <br>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">ประเภทเมนู</legend>
                        <div class="col-sm-10">
                            <?php
                                $sql = "SELECT * FROM e_menu_category INNER JOIN e_eatery ON e_eatery.e_eatery_id = e_menu_category.fk_eatery_id WHERE e_menu_category_id = " . $e_menu["fk_menu_category_id"];
                                $stmt = $pdo->query($sql);
                                $ec_ee_data = $stmt->fetch();
                                echo '
                                <div class="row">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="category_id" id="'.$ec_ee_data["e_menu_category_name"].'" value="'.$e_menu["fk_menu_category_id"].'" checked required>
                                    <label class="form-check-label" for="'.$ec_ee_data["e_menu_category_name"].'">
                                    <div class="col text-muted">'.$ec_ee_data["e_menu_category_name"].' (ประเภทเดิม)</div><div class="col"><span class="text-secondary"> ร้าน '. $ec_ee_data["e_eatery_name"] .' (ร้านเดิม)</div></span>
                                    </label>
                                </div></div>
                                ';
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
                            ?>
                        </div>
                    </div>
                </fieldset>
                <br><br>
                <button type="submit" class="col-sm-2 btn btn-primary" onclick="confirm('ท่านยืนยันการเพิ่มเมนูหรือไม่ ?')">แก้ไขเมนู</button>
                <a href="menu.php" class="col-sm-2 btn btn-outline-primary">กลับ</a>
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