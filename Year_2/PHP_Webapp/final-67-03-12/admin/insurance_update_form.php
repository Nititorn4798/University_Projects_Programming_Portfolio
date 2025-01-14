<?php
include "../db_connect.php";
if (isset($_GET["insurance_id"])) {
    $get_insurance_id = $_GET["insurance_id"];
    $cmd_ = "SELECT * from insurance_data WHERE insurance_id = $get_insurance_id";
    $cmd_result = mysqli_query($db_connect, $cmd_);
    mysqli_close($db_connect);
    $record = mysqli_fetch_array($cmd_result);
} else {
    echo '<p>ต้องมีอะไรผิดพลาดตรงไหน
        ไม่เข้าใจเลยสักครั้ง
        ไอ้ที่เขาทำฉันนั้นก็ทำ
        แต่ทำและไม่เคยสมหวัง
        หรืออาจเป็นเพราะพื้นดวงหรือเปล่า
        หรือเป็นที่ราศีของดวงดาว
        เลยทำให้ฉันต้องเหงาอย่างงี้อยู่ใช่ไหม</p>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <title>แก้ไขข้อมูลประกัน</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>

<?php
include "../db_connect.php";
include "../user/authentication.php";
?>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">&nbsp&nbsp&nbsp&nbspยินดีต้อนรับคุณ <?php echo $user_data["user_fullname"] . " ในฐานะ " . $user_data["user_level"];?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../user/main.php">หน้าหลัก</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../admin/insurance_read.php">ดูข้อมูลประกันภัย</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../admin/insurance_create_form.php">เพิ่มข้อมูลประกันภัย</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">ออกจากระบบ</a>
            </li>
            </ul>
        </div>
    </nav>
    <br><br><br>
<div class="box">
        <form method="post" enctype="multipart/form-data" action="insurance_update.php">
            <table>
                <th colspan=2>กำลังแก้ไขข้อมูลประกัน ของ <?php echo $record['insurance_owner_name'] ?? ''; ?></th>
                <tr>
                    <td>เลขที่ประกันภัย : </td>
                    <td><input type="text" maxlength="11" name="insurance_id" value="<?php echo $record['insurance_id'] ?? ''; ?>" readonly></td>
                </tr>
                <tr>
                    <td>เลขที่กรมธรรม์ : </td>
                    <td><input type="text" maxlength="11" name="insurance_number" value="<?php echo $record['insurance_number'] ?? ''; ?>"></td>
                </tr>
                <tr>
                    <td>ชื่อผู้ประกัน : </td>
                    <td><input type="text" maxlength="100" name="insurance_owner_name" value="<?php echo $record['insurance_owner_name'] ?? ''; ?>"></td>
                </tr>
                <tr>
                    <td>เลขที่บัตรประจำตัวประชาชน : </td>
                    <td><input type="text" maxlength="13" name="insurance_id_card" value="<?php echo $record['insurance_id_card'] ?? ''; ?>"></td>
                </tr>
                <tr>
                    <td>วันเกิด : </td>
                    <td><input type="date" name="insurance_birthday" value="<?php echo $record['insurance_birthday'] ?? ''; ?>"></td>
                </tr>
                <tr>
                    <td>ที่อยู่ : </td>
                    <td><textarea rows=5 name="insurance_address"><?php echo $record['insurance_address'] ?? ''; ?></textarea></td>
                </tr>
                <tr>
                    <td>เบอร์โทร : </td>
                    <td><input type="number" name="insurance_phone" value="<?php echo $record['insurance_phone'] ?? ''; ?>"></td>
                </tr>
                <tr>
                    <td>ประเภทการประกันภัย : </td>
                    <td><select name="insurance_type">
                        <option hidden selected value="<?php echo $record['insurance_type'] ?? ''; ?>"><?php echo $record['insurance_type'] ?? ''; ?></option>
                            <option value="ประกันชีวิต">ประกันชีวิต</option>
                            <option value="ประกันรถยนต์">ประกันรถยนต์</option>
                            <option value="ประกันมือถือ">ประกันมือถือ</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>วงเงินประกันภัย : </td>
                    <td><input type="number" name="insurance_limit_am" value="<?php echo $record['insurance_limit_am'] ?? ''; ?>"></td>
                </tr>
                <tr>
                    <td>ค่าเบี้ยประกันต่อปี : </td>
                    <td><input type="number" name="insurance_annual" value="<?php echo $record['insurance_annual'] ?? ''; ?>"></td>
                </tr>
                <tr>
                    <td>ระยะเวลาการประกันภัย : </td>
                    <td><input type="number" name="insurance_year" value="<?php echo $record['insurance_year'] ?? ''; ?>"></td>
                </tr>
                <tr>
                    <td>ชื่อผู้รับเงินประกัน : </td>
                    <td><input type="text" maxlength="50" name="insurance_payee_name" value="<?php echo $record['insurance_payee_name'] ?? ''; ?>"></td>
                </tr>
                <tr>
                    <td>รูปภาพ : </td>
                    <td><input type="file" name="insurance_image"></input></td>
                    <div class="bottom" style="width:100%; display: flex; justify-content: space-around; margin : 10px 0">
                </tr>
                <tr>
                    <td><img src="../images/<?php echo $record['insurance_image_path'] ?? ''; ?>" width="200vw" alt=""></td>
                </tr>
            </table>
            <br>
            <input type="submit" name="submit" value="ส่ง">
            <input type="reset" name="reset" value="ยกเลิก" onclick="window.location.href = 'insurance_read.php';">
        </form>
        <br><a class='a_bf' href='insurance_read.php' onclick="return confirm('คุณต้องการไปหน้าดูข้อมูลหรือไม่?')">ดูข้อมูล</a>
    </div>
</body>

</html>