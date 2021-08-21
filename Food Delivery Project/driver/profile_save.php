<?php
include "database/connect.php";

//this is for the create record
if (isset($_POST['submit'])) {

  $Driver_id = $_POST['driver_id'];
  $Driver_name = $_POST['driver_name'];
  $filename = $_FILES['driver_image']['name'];
  $Vehicle_num = $_POST['vehicle_number'];
  $Vehicle_model = $_POST['vehicle_model'];
  $Booking_time = $_POST['booking_time'];
  $Driver_num = $_POST['driver_number'];

  $imageExtension = pathinfo($filename, PATHINFO_EXTENSION);  // Get Image Extension

  $NewImage = time() . "." . $imageExtension; // Generate New File Name.
  $NewImagePath = "backassets/images/profile/" . $NewImage; // Image Saving Path
  move_uploaded_file($_FILES['driver_image']['tmp_name'], "$NewImagePath");

  $InsertQuery = "INSERT INTO `driver_profile`(`driver_id`, `driver_name`, `driver_image`, `vehicle_no`, `vehicle_model`, `booking_time`, `driver_number`) VALUES ('$Driver_id','$Driver_name','$NewImage','$Vehicle_num','$Vehicle_model','$Booking_time','$Driver_num')";
  $RunQuery = mysqli_query($con, $InsertQuery);
  if ($RunQuery) {
    $_SESSION["uu"] = "Data Successfully Inserted";
    header("location:profile.php");
  } else {
    echo 'mysqli_error("Error")';
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
  $filename = $_FILES["driver_image"]["name"]; // Uploading File Name.
  $temp_img = $_FILES["driver_image"]['tmp_name']; // Temporary Image Name
  $NewImgPath = "backassets/images/profile/" . $filename; // Image Saving Path
  $Up_vehicle_number = $_POST["vehicle_number"];
  $Up_vehicle_model = $_POST["vehicle_model"];
  $Up_booking_time = $_POST["booking_time"];
  $Up_driver_number = $_POST["driver_number"];

  $q1 = "SELECT * FROM `driver_profile` WHERE `id`= '$id'"; // For showing old image
  $res = mysqli_query($con, $q1);
  $row = mysqli_fetch_array($res);

  if ($filename  != "") {
    move_uploaded_file($temp_img, $NewImgPath);
  } else {
    $filename = $row['driver_image'];
  }

  $q = "UPDATE `driver_profile` SET `driver_id`= '$Up_driver_id',`driver_name`='$Up_driver_name',`driver_image`='$filename', `vehicle_no`='$Up_vehicle_number', `vehicle_model`='$Up_vehicle_model', `booking_time`='$Up_booking_time', `driver_number`='$Up_driver_number' WHERE `id`= '$id'";
  $query = mysqli_query($con, $q);
  if ($query) {
    $_SESSION["suc"] = "Data Successfully Updated";
    header("Location: profile.php");
  } else {
    echo "<script>alert ('Sorry Something Went Wrong')</script>";
  }
  header("Location: profile.php");
}

if (isset($_POST['chk_id'])) {
  $arr = $_POST['chk_id'];
  foreach ($arr as $id) {
    $y =  mysqli_query($con, "DELETE FROM driver_profile WHERE id = '$id'");
  }

  if ($y) {
    $_SESSION["d"] = "All Record Deleted";
    header("Location: profile.php");
  } else {
    echo "<script>alert ('Sorry Something Went Wrong')</script>";
  }
  header("Location: profile.php");
}
