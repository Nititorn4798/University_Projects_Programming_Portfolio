<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <title>สมัครบัญชีผู้ใช้งานระบบ</title>
</head>

<body>
    <div class="box">
        <h1 class="h3x">สมัครสมาชิก</h1>
        <form action="register_be.php" method="post">
            <div class="l">
                <p class="inline">Username : </p>
            </div>
            <div class="f"><input type="text" maxlength="20" name="username"></div>
            <div class="l">
                <p class="inline">Password : </p>
            </div>
            <div class="f"><input type="password" maxlength="50" name="password"></div>
            <div class="l">
                <p class="inline">ชื่อ นามสกุล : </p>
            </div>
            <div class="f"><input type="text" maxlength="100" name="fname"></div>
            <br>
            <input type="submit" name="submit">
            <input type="reset">
        </form>
    </div>

</body>

</html>