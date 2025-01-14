<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <title>MID 2</title>
</head>
<body>
    <div class=cc>
        <form method="post">
            Select Picture : <select name="item" ?> >
                <option value="jfood1">อาหารญี่ปุ่น1</option>
                <option value="jfood2">อาหารญี่ปุ่น2</option>
                <option value="jfood3">อาหารญี่ปุ่น3</option>
                <option value="conan1">การ์ตูนญี่ปุ่น1</option>
            </select>
            <input type="submit" name="Enter">
            <input type="reset" name="Reset">
        </form>
        <?php
            if (isset($_POST['Enter'])) {
                $item = $_POST['item'];
                switch ($item) {
                    case 'jfood1':
                        echo '<div><img class="mg" src="./images/food1.jpg" width="500px"></div>';
                        break;
                    case 'jfood2':
                        echo '<div><img class="mg" src="./images/food2.jpg" width="500px"></div>';
                        break;
                    case 'jfood3':
                        echo '<div><img class="mg" src="./images/food3.webp" width="500px"></div>';
                        break;
                    case 'conan1':
                        echo '<div><img class="mg" src="./images/ct-conan.webp" width="500px"></div>';
                        break;
                    default:
                        echo "กรอกข้อมูลไม่สมบูรณ์ กรุณากรอกใหม่";
                }
            }
        ?>
    </div>
</body>
</html>

