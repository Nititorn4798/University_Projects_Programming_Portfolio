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
                <option value="web1">Google</option>
                <option value="web2">RRU</option>
                <option value="web3">Youtube</option>
                <option value="web4">Blognone</option>
            </select>
            <input type="submit" name="Enter">
            <input type="reset" name="Reset">
        </form>
        <?php
            if (isset($_POST['Enter'])) {
                $item = $_POST['item'];
                switch ($item) {
                    case 'web1':
                        echo '<meta http-equiv="refresh" content="0;url=https://www.google.co.th">';
                        break;
                    case 'web2':
                        echo '<meta http-equiv="refresh" content="0;url=http://reg.rru.ac.th">';
                        break;
                    case 'web3':
                        echo '<meta http-equiv="refresh" content="0;url=https://www.youtube.com">';
                        break;
                    case 'web4':
                        echo '<meta http-equiv="refresh" content="0;url=https://blognone.com">';
                        break;
                    default:
                        echo "กรอกข้อมูลไม่สมบูรณ์ กรุณากรอกใหม่";
                }
            }
        ?>
    </div>
</body>
</html>

