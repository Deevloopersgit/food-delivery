<?php
include_once "database/connect.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php

    $id = $_GET['vkey'];
    $update = "UPDATE tbl_user SET verification = 1 where vkey='$id' limit 1";
    $up = mysqli_query($con, $update);
    if ($up) {
        $_SESSION['verif_completed'] = "Account Verification Successful";
        header("location:index.php");
    } else {
        echo $sqli_error;
    }


    ?>

</head>

<body>

</body>

</html>