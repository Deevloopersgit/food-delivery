<?php
include "database/connect.php";

//this is for the create record
if (isset($_POST['submit'])) {

  $vkey = md5(time());   // verification key
  $full_name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $filename = $_FILES['image']['name'];
  $address = $_POST['address'];
  
  if ($email != "") {
    $qe = "SELECT * FROM `tbl_user` WHERE email = $email ";
    $res = mysqli_query($con, $qe);
    $num_rows = mysqli_num_rows($res);
    if ($num_rows >= 1) {
      $_SESSION['res'] = 'Email Already Exist';
      header("Location:driver.php");
    } else {

      $imageExtension = pathinfo($filename, PATHINFO_EXTENSION); // Get Image Extension

      $NewImage = time() . "." . $imageExtension; // Generate New File Name.
      $NewImagePath = "backassets/images/drivers/" . $NewImage; // Image Saving Path
      move_uploaded_file($_FILES['image']['tmp_name'], "$NewImagePath");

      $query = "INSERT INTO `tbl_user`( `name`, `phone`, `email`, `password`, `image`, `address`, `role`, `verification`, `vkey`, `upgrade`, `status`) VALUES ('$full_name','$phone','$email','$password','$NewImage','$address','1','1','$vkey','','Unsuspend')";
      $result1 = mysqli_query($con, $query);
      if ($result1) {
        $_SESSION["uu"] = "Data Successfully Inserted";
        header("location:driver.php");
      } else {
        echo 'mysqli_error("Error")';
        header("Location: driver.php");
      }
    }
  }
}

//this is for the delete record
if (isset($_GET['del_id'])) {
  $id = $_GET['del_id'];
  $query2 = "DELETE FROM `driver_profile` WHERE `id` = '$id'";
  $r = mysqli_query($con, $query2);
  if ($r) {
    $_SESSION['m'] = "Record Deleted";
    header("Location: profile.php");
  } else {
    echo "<script>alert ('Sorry Something Went Wrong')</script>";
    header("Location: profile.php");
  }
} else {
  echo '<script>alert("Please Select Product You Want To Delete");
   location.replace("profile.php");</script>';
}

//this is for the update record
if (isset($_POST["update"])) {

  $id = $_POST["id"];
  $Up_driver_id = $_POST["driver_id"];
  $Up_driver_name = $_POST["driver_name"];
  $Up_driver_image = $_FILES["driver_image"];
  $Up_vehicle_number = $_POST["vehicle_number"];
  $Up_vehicle_model = $_POST["vehicle_model"];
  $Up_booking_time = $_POST["booking_time"];
  $Up_driver_number = $_POST["driver_number"];

  if ($_FILES["driver_image"]["name"]  != "" && $_FILES["driver_image"]["name"] != null) {
    $filename = $_FILES["driver_image"]["name"]; // Uploading File Name.
    $NewImgPath = "backassets/images/drivers/" . $filename; // Image Saving Path
    move_uploaded_file($_FILES["driver_image"]['tmp_name'], "$NewImgPath");
  } else {
    $filename = $row['driver_image'];
  }

  $q = "UPDATE `driver_profile` SET `driver_id`= '$Up_driver_id',`driver_name`='$Up_driver_name',`driver_image`='$filename', `vehicle_no`='$Up_vehicle_number', `vehicle_model`='$Up_vehicle_model', `booking_time`='$Up_booking_time', `driver_number`='$Up_driver_number' WHERE `id`= '$id'";
  $query = mysqli_query($con, $q);
  if ($query) {
    $_SESSION["suc"] = "Data Successfully Updated";
    header("Location: driver.php");
  } else {
    echo "<script>alert ('Sorry Something Went Wrong')</script>";
    header("Location: driver.php");
  }
}

if (isset($_POST['chk_id'])) {
  $arr = $_POST['chk_id'];
  foreach ($arr as $id) {
    $y =  mysqli_query($con, "DELETE FROM driver_profile WHERE id = " . $id);
  }

  if ($y) {
    $_SESSION["d"] = "All Record Deleted";
    header("Location: profile.php");
  } else {
    echo "<script>alert ('Sorry Something Went Wrong')</script>";
  }
  header("Location: profile.php");
}
