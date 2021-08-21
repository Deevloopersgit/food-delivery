<?php
include "database/connect.php";

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $phone = $_POST['p_num'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $image = $_FILES['image']['name'];
    $password = $_POST['password'];
    if($name !="" && $name !=null || $phone !="" && $phone !=null || $email !="" && $email !=null || $address !="" && $address !=null || $image !="" && $image !=null || $password !="" && $password !=null ){
    $query = "INSERT INTO `tbl_agent`(`name`,`phone`,`email`,`address`,`image`,`password`,`status`) VALUES ('$name','$phone','$email','$address','$image','$password','Suspend')";
    move_uploaded_file($_FILES['image']['tmp_name'],"backassets/images/agents/".$_FILES['image']['name']);
    $insertquery = mysqli_query($con, $query);
    echo mysqli_error($con); 
    if($insertquery)
    {
        $_SESSION['uu'] = "sss";
        header("location: agent.php");
    }
    else{
      echo "<script>alert ('Sorry Something Went Wrong')</script>";
    }
}
header("Location: agent.php");
}

    if(isset($_GET['del_id'])){
        $id = $_GET['del_id'];
        $query2 = "DELETE FROM `tbl_agent` WHERE `id` = '$id'";
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

        header("Location: agent.php");
    }
    
   
    if(isset($_POST["update"])) 
    {
    $id = $_POST["id"];
    $name = $_POST["upd_name"];
    $phone = $_POST["upd_phone"];
    $email = $_POST["upd_email"];
    $address = $_POST["upd_address"];
    $password = $_POST["upd_password"];
    // $pimage = $_FILES["upd_pro_image"]['name'];
    
    $q1 = "SELECT * FROM `tbl_agent` WHERE `id`= '$id'";
    $res = mysqli_query($con, $q1);
    $row = mysqli_fetch_array($res);

    if($_FILES["upd_image"]["name"] !="" && $_FILES["upd_image"]["name"] !=null)
    {
       $image= $_FILES["upd_image"]['name'];
        move_uploaded_file($_FILES["upd_image"]['tmp_name'],"backassets/images/agents/".$_FILES["upd_image"]['name']);
    }
    else
    {
        $image = $row['image'];
    }

    $q = "UPDATE `tbl_agent` SET `name`= '$name' ,`phone`= '$phone',`email`='$email',`address`='$address', `image`='$image', `password`='$password' WHERE `id`= '$id'";
        $query = mysqli_query($con, $q);
     if($query)
     {
        $_SESSION['suc'] = "lll";
        header("Location: agent.php");
     }  
     else 
     {
      echo "<script>alert ('Sorry Something Went Wrong')</script>"; 
     }
    }

    if(isset($_GET["Suspend_id"])){
        $id=$_GET["Suspend_id"];
        $u = " UPDATE `tbl_agent` SET `status` ='Unsuspend' WHERE `id`='$id'";
        $up = mysqli_query($con,$u);
        echo mysqli_error($con);
        if($up)
        {
          $_SESSION['success'] = 'success';
        header("location:agent.php");
        }
        else
        {
          echo "<script>alert ('Sorry Something Went Wrong')</script>";
        }
      
      
      }
      if(isset($_GET["Unsuspend_id"])){
        $id=$_GET["Unsuspend_id"];
        $u = " UPDATE `tbl_agent` SET `status` ='Suspend' where `id` ='$id'";
        $up = mysqli_query($con,$u);
        echo mysqli_error($con);
        if($up)
        {
          $_SESSION['status'] = 'status';
      header("location:agent.php");
      
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
       $y = mysqli_query($con,"DELETE FROM tbl_agent WHERE id = " . $id);
    }
    if($y)
    {
      $_SESSION['d'] = "dddd";
      header("Location: agent.php");
    }
    else
    {
      echo "<script>alert ('Sorry Something Went Wrong')</script>";
    }
   header("Location: agent.php");
}
if(isset($_POST['pro'])){
  $promocode = $_POST['promocode'];
 
 $e="SELECT * FROM `tbl_order` where promo_code ='$promocode '" ;
 $r = mysqli_query($con,$e);
 $t=mysqli_num_rows($r);
 if($t>0){
   $_SESSION['pro'] = 'pro';
   header("location:agent.php");
 }else{
   $_SESSION['promo'] = 'promo';
   header("location:agent.php");
 }
}
?>