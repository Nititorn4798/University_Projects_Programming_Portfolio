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
        <h1 style="text-align: center; color: midnightblue">evergreen tree</h1>
        <?php
            for ($i = 1; $i < 30; $i++) {
                echo "<div class=cexter>";
                switch ($i%2) {
                    case 0:
                        for ($j = 1; $j <= $i; $j++) {
                            echo "🔶";
                        }
                        break;
                    case 1:
                        for ($j = 1; $j <= $i; $j++) {
                            echo "🔲";
                        }
                        break;
                    default:
                        echo "HNY2024 Happy New Year !!!";
                }
                echo "<br></div>";
            }
            for ($i = 1; $i <= 10; $i++) {
                echo "<div class=cexter>";
                for ($j = 1; $j <= 5; $j++) {
                    echo "🔲";
                }
                echo "<br></div>";
            }
        ?>
        <p style="text-align: center; color: midnightblue">จัดทำโดย นายนิติธร นันทสินธ์ 65003263019</p>
    </div>
</body>
</html>

