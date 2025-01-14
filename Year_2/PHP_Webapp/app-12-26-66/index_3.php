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
            Input Number Range : <input type="text" name="start_num">
            to <input type="text" name="end_num">
            <input type="submit" name="Enter">
            <input type="reset" name="Reset">
        </form>
        <?php
            if (isset($_POST['Enter'])) {
                $start_i = $_POST['start_num'];
                $end_i = $_POST['end_num'];
                if (($start_i < $end_i) && ($start_i != '') && ($end_i != '')) {
                    for ($i = $start_i; $i <= $end_i; $i++) {
                        echo "$i <br>";
                    }
                }
            }
        ?>
    </div>
</body>
</html>

