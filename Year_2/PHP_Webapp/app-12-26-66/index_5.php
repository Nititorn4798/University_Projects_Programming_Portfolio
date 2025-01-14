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
        <?php
            for ($j=2; $j<=24; $j++) {
                for ($i=1; $i<=12; $i++) {
                    echo "<div class=twobox>$j x $i = ". $i*$j . "<br></div>";
                }
                echo "<div class=twobox>==========================================<br></div>";
            }
        ?>
    </div>
</body>
</html>

