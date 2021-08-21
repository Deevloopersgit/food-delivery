<?php
include "database/connect.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['p_num'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $image = $_FILES['image']['name'];
    $password = $_POST['password'];

    $query = "INSERT INTO `tbl_user`(`name`,`phone`,`email`,`address`,`image`,`role`,`password`,`status`) VALUES ('$name','$phone','$email','$address','$image','3','$password','Suspend')";
    move_uploaded_file($_FILES['image']['tmp_name'], "../driver/backassets/images/drivers/" . $_FILES['image']['name']);
    $insertquery = mysqli_query($con, $query);
    echo mysqli_error($con);
    if ($insertquery) {

        $_SESSION['s'] = "Data Inserted Successfully";
        header("location:driver.php");
    } else {
        echo "<script>alert ('Sorry Something Went Wrong')</script>";
        header("Location: driver.php");
    }
}


if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $query2 = "DELETE FROM `tbl_user` WHERE `id` = '$id'";
    $r = mysqli_query($con, $query2);

    if ($r) {
        $_SESSION['m'] = "Record Deleted";
        header("Location: driver.php");
    } else {
        echo "<script>alert ('Sorry Something Went Wrong')</script>";
    }

    header("Location: driver.php");
}


if (isset($_POST["update"])) {
    $id = $_POST["id"];
    $name = $_POST["upd_name"];
    $phone = $_POST["upd_phone"];
    $email = $_POST["upd_email"];
    $address = $_POST["upd_address"];
    $password = $_POST["upd_password"];

    $q1 = "SELECT * FROM `tbl_user` WHERE `id`= '$id'"; // For showing old image
    $res = mysqli_query($con, $q1);
    $row = mysqli_fetch_array($res);

    if ($_FILES["upd_image"]["name"] != "" && $_FILES["upd_image"]["name"] != null) {
        $image = $_FILES["upd_image"]['name'];
        move_uploaded_file($_FILES["upd_image"]['tmp_name'], "../driver/backassets/images/drivers/" . $image);
    } else {
        $image = $row['image'];
    }

    $q = "UPDATE `tbl_user` SET `name`= '$name' ,`phone`= '$phone',`email`='$email',`address`='$address', `image`='$image',  `password`='$password' WHERE `id`= '$id'";
    $query = mysqli_query($con, $q);
    if ($query) {
        $_SESSION['suc'] = "Data Updated Successfully";
        header("Location: driver.php");
    } else {
        echo "<script>alert ('Sorry Something Went Wrong')</script>";
    }

    header("Location:driver.php");
}

if (isset($_GET["Suspend_id"])) {
    $id = $_GET["Suspend_id"];
    $u = " UPDATE `tbl_user` SET `status` ='Unsuspend' WHERE `id`='$id'";
    $up = mysqli_query($con, $u);
    echo mysqli_error($con);
    if ($up) {
        $_SESSION['success'] = 'success';
        header("location:driver.php");
    } else {
        echo "<script>alert ('Sorry Something Went Wrong')</script>";
    }

    header("Location: driver.php");
}

if (isset($_GET["Unsuspend_id"])) {
    $id = $_GET["Unsuspend_id"];
    $u = " UPDATE `tbl_user` SET `status` ='Suspend' where `id` ='$id'";
    $up = mysqli_query($con, $u);
    echo mysqli_error($con);
    if ($up) {
        $_SESSION['status'] = 'status';
        header("location:driver.php");
    } else {
        echo "<script>alert ('Sorry Something Went Wrong')</script>";
    }

    header("Location: driver.php");
}


if (isset($_POST['chk_id'])) {
    $arr = $_POST['chk_id'];
    foreach ($arr as $id) {
        $y = mysqli_query($con, "DELETE FROM tbl_user WHERE id = " . $id);
    }
    if ($y) {
        $_SESSION['d'] = "dddd";
        header("Location: driver.php");
    } else {
        echo "<script>alert ('Sorry Something Went Wrong')</script>";
    }
    header("Location: driver.php");
}
