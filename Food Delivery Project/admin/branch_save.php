<?php
include "database/connect.php";

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $phone = $_POST['p_num'];
    $address = $_POST['address'];
    if($name !="" && $name !=null || $phone !="" && $phone !=null || $address !="" && $address !=null ){
    $query = "INSERT INTO `tbl_branch`(`name`,`phone`,`address`,`status`,`user_id`) VALUES ('$name','$phone','$address','Suspend','4')";
    $insertquery = mysqli_query($con, $query);
    echo mysqli_error($con); 
    if($insertquery)
    {
        $_SESSION['uu'] = "sss";
        header("location: branch.php");
    }
    else{
      echo "<script>alert ('Sorry Something Went Wrong')</script>";
    }
}
header("Location: branch.php");
}

    if(isset($_GET['del_id'])){
        $id = $_GET['del_id'];
        $query2 = "DELETE FROM `tbl_branch` WHERE `id` = '$id'";
        $r = mysqli_query($con, $query2);
        if($r)
        {
          $_SESSION['m'] = "mmmm";
          header("Location: agent.php");
        }
        else
        {
          echo "<script>alert ('Sorry Something Went Wrong')</script>";
        }

        header("Location: branch.php");

    }
 
   
    if(isset($_POST["update"])) 
    {
    $id = $_POST["id"];
    $name = $_POST["upd_name"];
    $phone = $_POST["upd_phone"];
    $address = $_POST["upd_address"];
    $q = "UPDATE `tbl_branch` SET `name`= '$name' ,`phone`= '$phone',`address`='$address' WHERE `id`= '$id'";
        $query = mysqli_query($con, $q);
     if($query)
     {
        $_SESSION['suc'] = "lll";
        header("Location: branch.php");
     }  
     else 
     {
      echo "<script>alert ('Sorry Something Went Wrong')</script>"; 
     }
    }

    if(isset($_GET["Suspend_id"])){
        $id=$_GET["Suspend_id"];
        $u = " UPDATE `tbl_branch` SET `status` ='Unsuspend' WHERE `id`='$id'";
        $up = mysqli_query($con,$u);
        echo mysqli_error($con);
        if($up)
        {
          $_SESSION['success'] = 'success';
        header("location:branch.php");
        }
        else
        {
          echo "<script>alert ('Sorry Something Went Wrong')</script>";
        }
      
      
      }
      if(isset($_GET["Unsuspend_id"])){
        $id=$_GET["Unsuspend_id"];
        $u = " UPDATE `tbl_branch` SET `status` ='Suspend' where `id` ='$id'";
        $up = mysqli_query($con,$u);
        echo mysqli_error($con);
        if($up)
        {
          $_SESSION['status'] = 'status';
      header("location:branch.php");
      
        }
        else
        {
          echo "<script>alert ('Sorry Something Went Wrong')</script>";
        }
      
    }
   
    if(isset($_POST['chk_id']))
    {
        $arr = $_POST['chk_id'];
        foreach ($arr as $id) {
           $y = mysqli_query($con,"DELETE FROM tbl_branch WHERE id = " . $id);
        }
        if($y)
    {
      $_SESSION['d'] = "dddd";
      header("Location: branch.php");
    }
    else
    {
      echo "<script>alert ('Sorry Something Went Wrong')</script>";
    }
       header("Location: branch.php");
    }
?>