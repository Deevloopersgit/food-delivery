<?php
include "database/connect.php";

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $duration = $_POST['duration'];
    $desc = $_POST['desc'];

    if($name !="" && $name !=null || $price !="" && $price !=null || $duration !="" && $duration !=null || $desc !="" && $desc !=null ){
    $query = "INSERT INTO `package`(`name`, `price`,`description`, `duration`, `status`) VALUES ('$name','$price','$desc','$duration','0')";
    $insertquery = mysqli_query($con, $query);
    echo mysqli_error($con); 
    if($insertquery)
    {
        $_SESSION['uu'] = "sss";
        header("location: packages.php");
    }
    else{
      echo "<script>alert ('Sorry Something Went Wrong')</script>";
    }
}
header("Location: packages.php");
}

    if(isset($_GET['del_id'])){
        $id = $_GET['del_id'];
        $query2 = "DELETE FROM `package` WHERE `pid` = '$id'";
        $r = mysqli_query($con, $query2);
        if($r) 
        {
          $_SESSION['m'] = "mmmm";
          header("Location: packages.php");
        }
        else
        {
          echo "<script>alert ('Sorry Something Went Wrong')</script>";
        }

        header("Location: packages.php");
    }
   
   
    if(isset($_POST["update"])) 
    {
    $id = $_POST["id"];
    $name = $_POST["upd_name"];
    $price = $_POST["upd_price"];
    $duration = $_POST["upd_duration"];
    $desc = $_POST["upd_desc"];

    $q = "UPDATE `package` SET `name`= '$name' ,`price`= '$price',`description`='$desc',`duration`='$duration' WHERE `pid`= '$id'";
        $query = mysqli_query($con, $q);
     if($query)
     {
        $_SESSION['suc'] = "lll";
        header("Location: packages.php");
     }  
     else 
     {
      echo "<script>alert ('Sorry Something Went Wrong')</script>";   
     }
    }

    if(isset($_GET["Suspend_id"])){
        $id=$_GET["Suspend_id"];
        $u = " UPDATE `package` SET `status` ='0' WHERE `pid`='$id'";
        $up = mysqli_query($con,$u);
        echo mysqli_error($con);
        if($up)
        {
          $_SESSION['success'] = 'success';
        header("location: packages.php");
        }
        else
        {
          echo "<script>alert ('Sorry Something Went Wrong')</script>";
        }
      
      
      }
      if(isset($_GET["Unsuspend_id"])){
        $id=$_GET["Unsuspend_id"];
        $u = " UPDATE `package` SET `status` ='1' WHERE `pid` ='$id'";
        $up = mysqli_query($con,$u);
        echo mysqli_error($con);
        if($up)
        {
          $_SESSION['status'] = 'status';
      header("location:packages.php");
      
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
          $y = mysqli_query($con,"DELETE FROM package WHERE pid = " . $id);
        }

        if($y)
        {
          $_SESSION['d'] = "dddd";
          header("Location: packages.php");
        }
        else
        {
          echo "<script>alert ('Sorry Something Went Wrong')</script>";
        }
           
       
       header("Location: packages.php");
    }
?>