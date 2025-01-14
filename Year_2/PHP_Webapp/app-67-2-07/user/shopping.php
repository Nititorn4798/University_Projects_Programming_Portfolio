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
</head>

<?php
    include "authentication.php";
    include "../db_connect.php";
    $cmd_query = "SELECT * from products";
    $cmd_result = mysqli_query($db_connect,$cmd_query);
    mysqli_close($db_connect)
?>

<body>
    <?php
    echo '
    <div class="container text-center">
        <div class="row align-items-start">
    ';
        while($record = mysqli_fetch_array($cmd_result)) {
            echo "<div class='col-sm-4'>";
            echo "<img src=../images_db/$record[product_image_path] class='img-fluid' width=50%> <br><br>";
            echo "<h5>$record[product_name]</h5>";
            echo "<small class='text-body-secondary'>$record[product_description]</small>";
            echo "<p>$record[product_price]</p>";
            echo "<a class='btn btn-outline-success' href='detail.php' onclick=\"return confirm('')\">รายละเอียด</a></p></td>";
            echo "</div>";
        }
    echo '  </div>
        </div>';
    ?>
</body>

</html>
