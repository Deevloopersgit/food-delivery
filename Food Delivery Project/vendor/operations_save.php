<?php
include "database/connect.php";

$Vendor_ID = $_SESSION["vendor_id"];

if (isset($_POST['subcat'])) {

  $subcat = $_POST['subcat'];
  echo "$subcat";

  $query = "SELECT * from `tbl_categories` JOIN tbl_sub_category ON tbl_sub_category.cat_id=tbl_categories.cat_id WHERE tbl_categories.cat_id = '$subcat'";

  $result = $con->query($query);
  // echo "alert($result)";
  if ($result->num_rows > 0) {
    echo '<option>select</option>';
    while ($row = $result->fetch_assoc()) {
      echo '       

        <option value="' . $row['sub_cat_id'] . '">' . $row['sub_cat_name'] . '</option>';
    }
  } else {
    echo '<option value="">No Record </option>';
  }
}

if (isset($_POST['subcategory'])) {

  $subcate = $_POST['subcategory'];
  echo "$subcate";

  $query = "SELECT * from `tbl_categories` JOIN tbl_sub_category ON tbl_sub_category.cat_id=tbl_categories.cat_id WHERE tbl_categories.cat_id = '$subcate'";

  $result = $con->query($query);
  // echo "alert($result)";
  if ($result->num_rows > 0) {
    echo '<option>select</option>';
    while ($row = $result->fetch_assoc()) {
      echo '       

        <option value="' . $row['sub_cat_id'] . '">' . $row['sub_cat_name'] . '</option>';
    }
  } else {
    echo '<option value="">No Record </option>';
  }
}

if (isset($_POST["opti"])) {
  $pro = $_POST['opti'];
  $query = "SELECT * FROM tbl_sub_category WHERE cat_id = '$pro'";
  $q = mysqli_query($con, $query);
  $row = mysqli_fetch_array($q);

  echo $row['sub_cat_name'];
}

if (isset($_POST['submit_multiple_records'])) {
  $alldays = $_POST['days'];
  $time = $_POST['time'];

  foreach ($alldays as $daysname) {
    $query = "INSERT INTO `tbl_opreations` (`vendor_id`, `day`, `time`) VALUES ('$Vendor_ID', '$daysname','$time')" or die(mysqli_error($con));
    $insertquery = mysqli_query($con, $query);
  }

  if ($insertquery > 0) {
    $_SESSION["multiple-data"] = "multiple-data-insert";
    header("location: operations.php");
  } else {
    echo "<script>alert ('Sorry Something Went Wrong')</script>";
    header("Location: operations.php");
  }
}

if (isset($_GET['del_id'])) {
  $id = $_GET['del_id'];
  $query2 = "DELETE FROM `tbl_opreations` WHERE `id` = '$id'";
  $r = mysqli_query($con, $query2);
  if ($r) {
    $_SESSION["m"] = "Record Deleted Succcessfully";
    header("Location: operations.php");
  } else {
    echo "<script>alert ('Sorry Something Went Wrong')</script>";
  }

  header("Location: operations.php");
}
// else {
//   echo '<script>alert("Please Select Product You Want To Delete");
//    location.replace("product.php");</script>';
// }
// header("Location: product.php");


// This is for vendor operations update
if (isset($_POST["updateoperations"])) {
  $id = $_POST["id"];
  $Update_Day = $_POST["up_day"];
  $Update_Time = $_POST["up_time"];

  foreach ($Update_Day as $up_days) {
    $q = "UPDATE `tbl_opreations` SET `day`= '$up_days' ,`time`= '$Update_Time' WHERE `id`= '$id'";
    $query = mysqli_query($con, $q);
  }

  if ($query) {
    $_SESSION['Updated_Operations'] = "Operations Has Updated Successfully";
    header("Location: operations.php");
  } else {
    echo "<script>alert ('Sorry Something Went Wrong')</script>";
  }
  header("Location: operations.php");
}



//this is for the update record
if (isset($_POST["update"])) {
  $id = $_POST["id"];
  $Cat = $_POST["name"];
  $sub = $_POST["upd_sub_cat_name"];
  $pname = $_POST["upd_pro_name"];
  $pprice = $_POST["upd_pro_price"];
  $quan = $_POST["upd_quantity"];
  $des = $_POST["upd_desc"];
  $pimage = $_FILES["upd_pro_image"]['name'];

  $q1 = "SELECT * FROM `tbl_products` WHERE `id`= '$id'";
  $res = mysqli_query($con, $q1);
  $row = mysqli_fetch_array($res);

  if ($_FILES["upd_pro_image"]["name"]  != "" && $_FILES["upd_pro_image"]["name"] != null) {
    $pimage = $_FILES["upd_pro_image"]['name'];
    move_uploaded_file($_FILES["upd_pro_image"]['tmp_name'], "backassets/images/product/" . $_FILES["upd_pro_image"]['name']);
  } else {
    $pimage = $row['product_image'];
  }

  $q = "UPDATE `tbl_products` SET `category`= '$Cat' ,`sub_category`= '$sub',`product_name`='$pname',`product_price`='$pprice', `product_image`='$pimage', `qauntity`='$quan', `descp`='$des' WHERE `id`= '$id'";
  $query = mysqli_query($con, $q);
  if ($query) {
    $_SESSION['suc'] = "lll";
    header("Location: product.php");
  } else {
    echo "<script>alert ('Sorry Something Went Wrong')</script>";
  }
  header("Location: product.php");
}


if (isset($_GET["Suspend_id"])) {
  $id = $_GET["Suspend_id"];
  $u = " UPDATE `tbl_products` SET `status` ='Unsuspend' WHERE `id`='$id'";
  $up = mysqli_query($con, $u);
  echo mysqli_error($con);
  if ($up) {
    $_SESSION['success'] = 'success';
    header("location:product.php");
  } else {
    echo "<script>alert ('Sorry Something Went Wrong')</script>";
  }

  header("location:product.php");
}
if (isset($_GET["Unsuspend_id"])) {
  $id = $_GET["Unsuspend_id"];
  $u = " UPDATE `tbl_products` SET `status` ='Suspend' where `id` ='$id'";
  $up = mysqli_query($con, $u);
  echo mysqli_error($con);
  if ($up) {
    $_SESSION['status'] = 'status';
    header("location:product.php");
  } else {
    echo "<script>alert ('Sorry Something Went Wrong')</script>";
  }
  header("location:product.php");
}


if (isset($_POST['chk_id'])) {
  $arr = $_POST['chk_id'];
  foreach ($arr as $id) {
    $y =  mysqli_query($con, "DELETE FROM tbl_products WHERE id = " . $id);
  }

  if ($y) {
    $_SESSION['d'] = "ddd";
    header("Location: vendor.php");
  } else {
    echo "<script>alert ('Sorry Something Went Wrong')</script>";
  }
  //    header("Location: product.php");
  header("Location: product.php");
}
