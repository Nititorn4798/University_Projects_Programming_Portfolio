<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <title>PHP</title>
</head>
<body>
    <div class=box>
        <form method="post">
            Select Day : <select name="day" value=<?php echo $lastday; ?> >
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>
            <input type="submit" name="Enter">
            <input type="reset" name="Reset">
        </form>
        <?php
            if (isset($_POST['Enter'])) {
                $day = $_POST['day'];
                $lastday = $day;
                $color = "";
                switch ($day) {
                    case 'Monday':
                        echo '<div class="daybox"><font color=yellow>วันจันทร์สีเหลือง</font></div>';
                        break;
                    case 'Tuesday':
                        echo '<div class="daybox"><font color=pink>วันอังคารสีชมพู</font></div>';
                        break;
                    case 'Wednesday':
                        echo '<div class="daybox"><font color=green>วันพุธสีเขียว</font></div>';
                        break;
                    case 'Thursday':
                        echo '<div class="daybox"><font color=orange>วันพฤหัสบดีสีส้ม</font></div>';
                        break;
                    case 'Friday':
                        echo '<div class="daybox"><font color=skyblue>วันศุกร์สีฟ้า</font></div>';
                        break;
                    case 'Saturday':
                        echo '<div class="daybox"><font color=violet>วันเสาร์สีม่วง</font></div>';
                        break;
                    case 'Sunday':
                        echo '<div class="daybox"><font color=red>วันอาทิตย์สีแดง</font></div>';
                        break;
                    default:
                        echo "กรอกข้อมูลไม่สมบูรณ์ กรุณากรอกใหม่";
                }
            }
        ?>
    </div>
</body>
</html>

