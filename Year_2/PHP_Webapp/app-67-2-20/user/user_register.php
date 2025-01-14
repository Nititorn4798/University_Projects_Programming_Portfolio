<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <title>User Register - Connect PHP To MySQL</title>
</head>

<body>
    <div class="box">
        <h1 class="h3x">สมัครสมาชิก</h1>
        <form action="register_r.php" method="post">
            <div class="l">
                <p class="inline">Username : </p>
            </div>
            <div class="f"><input type="text" maxlength="16" name="username"></div>
            <div class="l">
                <p class="inline">Password : </p>
            </div>
            <div class="f"><input type="password" maxlength="16" name="password"></div>
            <div class="l">
                <p class="inline">ชื่อ นามสกุล : </p>
            </div>
            <div class="f"><input type="text" maxlength="30" name="fname"></div>
            <div class="l">
                <p class="inline">ที่อยู่ : </p>
            </div>
            <div class="f"><textarea col="30" rows="5" name="address"></textarea></div>
            <div class="l">
                <p class="inline">เบอร์โทร : </p>
            </div>
            <div class="f"><input type="text" maxlength="12" name="telphone"></div>
            <div class="l">
                <p class="inline">สถานภาพ : </p>
            </div>
            <div class="f"><input type="radio" name="status" value="โสด" checked>โสด</div>
            <div class="f"><input type="radio" name="status" value="สมรส">สมรส</div>
            <div class="f"><input type="radio" name="status" value="หม้าย">หม้าย</div>
            <div class="l">
                <p class="inline">วันเกิด : </p>
            </div>
            <div class="f"><input type="date" name="birthday"></div><br>
            <input type="submit" name="submit">
            <input type="reset">
        </form>
    </div>

</body>

</html>