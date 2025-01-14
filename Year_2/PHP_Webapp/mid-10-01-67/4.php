<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <title>MID 4</title>
</head>
<body>
    <div class=cc>
        <form method="post">
        ส่วนสูง : <input type="text" name="input_1" size="20" placeholder="กรอกส่วนสูง" <br>
        น้ำหนัก : <input type="text" name="input_2" size="20" placeholder="กรอกน้ำหนัก" <br>
        <br> <br>
        <input type="submit" name="submit" value="Send">
        <input type="reset" name="reset_name" value="Cancel">
    </form>
        <?php
        clearstatcache();
            if (isset($_POST["submit"])) {
                $var1 = $_POST['input_1'];
                $var2 = $_POST['input_2'];
                if ($var1 != "" && $var2 != "") {
                    $cal = $var1 - $var2;
                    if ($cal == 110) {
                        echo "<p> คุณรูปร่างสมส่วน </p>";
                    }
                    elseif ($cal > 110) {
                        echo "<p> คุณรูปร่างผอมไปนิด </p>";
                    }
                    elseif ($cal < 110) {
                        echo "<p> คุณรูปร่างท้วมไปนิด </p>";
                    }
                }
            }
        ?>
    </div>

</body>
</html>