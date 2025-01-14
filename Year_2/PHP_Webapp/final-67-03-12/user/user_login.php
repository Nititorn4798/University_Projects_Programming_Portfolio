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
    <title>Login</title>
</head>

<body>
    <br><br>
    <div class="box">
        <h1 class="h3x">เข้าสู่ระบบ</h1>
        <form action="login_be.php" method="post">
            <div class="l">
                <p class="inline">Username : </p>
            </div>
            <div class="f"><input type="text" maxlength="16" name="username"></div>
            <div class="l">
                <p class="inline">Password : </p>
            </div>
            <div class="f"><input type="password" maxlength="255" name="password"></div>
            <input type="submit" name="submit" value="Login">
            <input type="reset">
        </form>
        <div class="f"><a href='user_register.php'><p><button type=button class='btn btn-primary mt-3'>สมัครสมาชิก</button></p></a></div>
    </div>

</body>

</html>