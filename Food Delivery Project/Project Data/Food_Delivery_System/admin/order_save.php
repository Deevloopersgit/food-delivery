<?php
include "database/connect.php";

if(isset($_POST['submit']))
{
    $offer = $_POST['name'];
    $discount = $_POST['p_num'];
    $promo = $_POST['address'];
    if($offer !="" && $offer !=null || $discount !="" && $discount !=null || $promo !="" && $promo !=null ){
    $query = "INSERT INTO `tbl_order`(`offer`,`discount`,`promo_code`,`status`,`user_id`) VALUES ('$offer','$discount%','$promo','Suspend','4')";
    $insertquery = mysqli_query($con, $query);
    echo mysqli_error($con); 
    if($insertquery)
    {
        $_SESSION['uu'] = "sss";
        header("location: order.php");
    }
    else{
      echo "<script>alert ('Sorry Something Went Wrong')</script>";
    }
}
header("Location: order.php");
}

    if(isset($_GET['del_id'])){
        $id = $_GET['del_id'];
        $query2 = "DELETE FROM `tbl_order` WHERE `id` = '$id'";
        $r = mysqli_query($con, $query2);
        if($r)
        {
          $_SESSION['m'] = "mmmm";
          header("Location: order.php");
        }
        else
        {
          echo "<script>alert ('Sorry Something Went Wrong')</script>";
        }

        header("Location: order.php");
    }
   
   
    if(isset($_POST["update"])) 
    {
    $id = $_POST["id"];
    $offer = $_POST["upd_name"];
    $discount = $_POST["upd_phone"];
    $promo = $_POST["upd_address"];
    $q = "UPDATE `tbl_order` SET `offer`= '$offer' ,`discount`= '$discount',`promo_code`='$promo' WHERE `id`= '$id'";
        $query = mysqli_query($con, $q);
     if($query)
     {
        $_SESSION['suc'] = "lll";
        header("Location: order.php");
     }  
     else 
     {
      echo "<script>alert ('Sorry Something Went Wrong')</script>";   
     }
    }

    if(isset($_GET["Suspend_id"])){
        $id=$_GET["Suspend_id"];
        $u = " UPDATE `tbl_order` SET `status` ='Unsuspend' WHERE `id`='$id'";
        $up = mysqli_query($con,$u);
        echo mysqli_error($con);
        if($up)
        {
          $_SESSION['success'] = 'success';
        header("location: order.php");
        }
        else
        {
          echo "<script>alert ('Sorry Something Went Wrong')</script>";
        }
      
      
      }
      if(isset($_GET["Unsuspend_id"])){
        $id=$_GET["Unsuspend_id"];
        $u = " UPDATE `tbl_order` SET `status` ='Suspend' WHERE `id` ='$id'";
        $up = mysqli_query($con,$u);
        echo mysqli_error($con);
        if($up)
        {
          $_SESSION['status'] = 'status';
      header("location: order.php");
      
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
          $y = mysqli_query($con,"DELETE FROM tbl_order WHERE id = " . $id);
        }

        if($y)
        {
          $_SESSION['d'] = "dddd";
          header("Location: subscription.php");
        }
        else
        {
          echo "<script>alert ('Sorry Something Went Wrong')</script>";
        }
           
       
       header("Location: order.php");
    }
?>