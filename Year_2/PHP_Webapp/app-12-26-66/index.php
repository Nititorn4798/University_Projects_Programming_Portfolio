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
            Name <input type="text" name="name"> <br>
            Score <input type="text" name="score"> <br> <br>
            <input type="submit" name="Enter">
            <input type="reset" name="Reset">
        </form>
    </div>
</body>
</html>
<?php
    if (isset($_POST["Enter"])) {
    $name = $_POST['name'];
    $score = $_POST['score'];
    $result = "";
    if ($name != "" && $score != "" && is_numeric($score)) {
        if ($score >= 80) {
            $result = "A";
        }
        elseif ($score >= 75) {
            $result = "B+";
        }
        elseif ($score >= 70) {
            $result = "B";
        }
        elseif ($score >= 65) {
            $result = "C+";
        }
        elseif ($score >= 60) {
            $result = "C";
        }
        elseif ($score >= 55) {
            $result = "D+";
        }
        elseif ($score >= 50) {
            $result = "D";
        }
        elseif ($score >= 0) {
            $result = "F";
        }
        else {
            $result = "";
        }
    }
    if ($result != "") {
        echo "สวัสดีคุณ $name คุณได้คะแนน $score และได้รับเกรด $result ";
    }
    else {
        echo "กรอกข้อมูลไม่สมบูรณ์ กรุณากรอกใหม่";
    }
}