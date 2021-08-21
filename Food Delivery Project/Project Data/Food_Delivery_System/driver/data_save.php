<?php
include "database/connect.php";

//this is for the create record
if (isset($_POST['submit'])) {

  $usrid = $_POST['usrid'];
  $vhtype = $_POST['vhtype'];
  $vhnum = $_POST['vhnum'];
  $vhlic = $_POST['vhlic'];
  $vhmod = $_POST['vhmod'];
  $vhimg = $_FILES['vhimg'];

  $filename = $_FILES["vhimg"]["name"]; // Get the Upload file Name.
  $imageExtension = pathinfo($filename, PATHINFO_EXTENSION);

  $NewImage = time() . "." . $imageExtension; // Generate New File Name.
  $NewImagePath = "backassets/images/vehicle/" . $NewImage;
  move_uploaded_file($_FILES['vhimg']['tmp_name'], "$NewImagePath");

  $InsertQuery = "INSERT INTO `tbl_vehicle`(`vehicle_no`, `license_no`, `vehicle_model`, `user_id`, `vehicle_image`,`vehicle_type`) VALUES ('$vhnum','$vhlic','$vhmod','$usrid','$NewImage','$vhtype')";
  $RunQuery = mysqli_query($con, $InsertQuery);
  if ($RunQuery) {
    $_SESSION["uu"] = "Data Successfully Inserted";
    header("location:vehicle.php");
  } else {
    echo 'mysqli_error("Error")';
  }
}

//this is for the delete record
if (isset($_GET['del_id'])) {
  $id = $_GET['del_id'];
  $query2 = "DELETE FROM `tbl_vehicle` WHERE `id` = '$id'";
  $r = mysqli_query($con, $query2);
  if ($r) {
    $_SESSION['m'] = "Record Deleted";
    header("Location: vehicle.php");
  } else {
    echo "<script>alert ('Sorry Something Went Wrong')</script>";
  }

  header("Location: vehicle.php");
} 
else {
  echo '<script>alert("Please Select Product You Want To Delete");
   location.replace("vehicle.php");</script>';
}

//this is for the update record
if (isset($_POST["update"])) {

  $id = $_POST["id"];
  $Vehicle_Type = $_POST["up_vhtype"];
  $Vehicle_Num = $_POST["up_vhnum"];
  $Vehicle_Licnc = $_POST["up_vhlic"];
  $Vehicle_Mdl = $_POST["up_vhmod"];
  $User_Id = $_POST["user_id"];
  $Vehicle_Img = $_POST["up_vhimg"];

  $q1 = "SELECT * FROM `tbl_vehicle` WHERE `Id`= '$id'"; // For showing old image
  $res = mysqli_query($con, $q1);
  $row = mysqli_fetch_array($res);

  if ($_FILES["up_vhimg"]["name"]  != "" && $_FILES["up_vhimg"]["name"] != null) {
    $pimage = $_FILES["up_vhimg"]['name'];
    move_uploaded_file($_FILES["up_vhimg"]['tmp_name'], "backassets/images/vehicle/" . $_FILES["up_vhimg"]['name']);
  } else {
    $pimage = $row['vehicle_image'];
  }

  $q = "UPDATE `tbl_vehicle` SET `Id`= '$id' ,`vehicle_no`= '$Vehicle_Num',`license_no`='$Vehicle_Licnc',`vehicle_model`='$Vehicle_Mdl', `user_id`='$User_Id', `vehicle_image`='$pimage', `vehicle_type`='$Vehicle_Type' WHERE `id`= '$id'";
  $query = mysqli_query($con, $q);
  if ($query) {
    $_SESSION["suc"] = "Data Successfully Updated";
    header("Location: vehicle.php");
  } else {
    echo "<script>alert ('Sorry Something Went Wrong')</script>";
  }
  header("Location: vehicle.php");
}

if (isset($_POST['chk_id'])) {
  $arr = $_POST['chk_id'];
  foreach ($arr as $id) {
    $y =  mysqli_query($con, "DELETE FROM tbl_vehicle WHERE id = '$id'");
  }

  if ($y) {
    $_SESSION["d"] = "All Record Deleted";
    header("Location: vehicle.php");
  } else {
    echo "<script>alert ('Sorry Something Went Wrong')</script>";
  }
  header("Location: vehicle.php");
}
