<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <title>MID 1</title>
</head>
<body>
    <div class=cc>
        <h1>การหาพื้นที่สี่เหลี่ยมคางหมู</h1>
        <form method="post">
        บน : <input type="text" name="input_1" size="20" placeholder="บน" <br>
        ล่าง : <input type="text" name="input_2" size="20" placeholder="ล่าง" <br>
        สูง : <input type="text" name="input_3" size="20" placeholder="สูง" <br>
        <br> <br>
        <input type="submit" name="submit" value="Send">
        <input type="reset" name="reset_name" value="Cancel">
    </form>
        <?php
        clearstatcache();
            if (isset($_POST["submit"])) {
                $var1 = $_POST['input_1'];
                $var2 = $_POST['input_2'];
                $var3 = $_POST['input_3'];
                if ($var1 != "" && $var2 != "" && $var3 != "") {
                    $cal = 0.5 * ($var1 + $var2) * $var3;
                    if ($cal >= 0) {
                        echo "<p> พื้นที่ของสี่หลี่ยมคางหมูที่มีความสูงเท่ากับ $var3 มีด้านเท่ากับ $var1 และ $var2 คือ $cal </p>";
                    }
                }
            }
        ?>
    </div>

</body>
</html>