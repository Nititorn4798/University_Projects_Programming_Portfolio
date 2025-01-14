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
    <div class=cc>
        <h1>My First PHP Website</h1>
        <form method="post">
        <p>ตัวเลขที่ 1 : </p> <input type="text" name="input_1" size="20" placeholder="กรอกเลข" value="<?php echo $_POST['input_1']??''; ?>"> <br>
        <p>ตัวเลขที่ 2 :</p> <input type="text" name="input_2" size="20" placeholder="กรอกเลข" value="<?php echo $_POST['input_2']??''; ?>"> <br> <br>
        <p>เครื่องหมาย :</p> <select name="input_choice" value="<?php echo $_POST['input_choice']??''; ?>">
            <option id="+" value="+"> + </option>
            <option id="-" value="-"> - </option>
            <option id="*" value="*"> * </option>
            <option id="/" value="/"> / </option>
        </select> <br> <br>
        <input type="submit" name="submit_name" value="Send">
        <input type="reset" name="reset_name" value="Cancel">
    </form>
        <?php
            if (isset($_POST["submit_name"])) {
                $get_choice = $_POST["input_choice"];
                $var1 = $_POST['input_1'];
                $var2 = $_POST['input_2'];
                if ($var1 != "" && $var2 != "" && $get_choice != "") {
                    if ($get_choice == "+") {
                        $var_sum = $var1 + $var2;
                    }
                    elseif ($get_choice == "-") {
                        $var_sum = $var1 - $var2;
                    }
                    elseif ($get_choice == "*") {
                        $var_sum = $var1 * $var2;
                    }
                    elseif ($get_choice == "/") {
                        $var_sum = $var1 / $var2;
                    }
                    echo "<p> $var1 $get_choice $var2 = $var_sum </p>";
                }
            }
        ?>
    </div>

</body>
</html>