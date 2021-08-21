<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
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
    $query = "INSERT INTO `tbl_user`(`name`,`phone`,`email`,`address`,`image`,`role`,`password`,`status`) VALUES ('$name','$phone','$email','$address','$image','1','$password','Suspend')";
    move_uploaded_file($_FILES['image']['tmp_name'],"backassets/images/users/".$_FILES['image']['name']);
    $insertquery = mysqli_query($con, $query);
    echo mysqli_error($con); 
    if($insertquery)
    {
    // Include PHPMailer library files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



$mail = new PHPMailer;

  $mail->isSMTP();
  $mail->Host     = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'stevejason360@gmail.com';
  $mail->Password = 'honeysteve123';
  $mail->SMTPSecure = 'tls';
  $mail->Port     = 587;

$mail->setFrom('stevejason360@gmail.com', 'Steve');
$mail->addReplyTo('stevejason360@gmail.com', 'Steve');

// Add a recipient
$mail->addAddress("stevejason360@gmail.com");


// Email subject
$mail->Subject = $subject;

// Set email format to HTML
$mail->isHTML(true);

// Email body content
$query = mysqli_query($con,"SELECT * FROM  `roles` where roles.id='$role'");

$fetch = mysqli_fetch_array($query);
$mailContent = "Congratulations you have been registered as ".$fetch["role"]." Now you can login";
$mail->Body = $mailContent;

// Send email
if(!$mail->send()){
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{
	$_SESSION['status']="send contact";
header("location:users.php");
	
}
$_SESSION['s'] = "addd";
header("location:users.php");
}else
{
  echo "<script>alert ('Sorry Something Went Wrong')</script>";   
}
    }
    else{
        $_SESSION['ss'] = "kkk";
        header("location: users.php");
    }
}
header("Location: users.php");


    if(isset($_GET['del_id'])){
        $id = $_GET['del_id'];
        $query2 = "DELETE FROM `tbl_user` WHERE `id` = '$id'";
        $r = mysqli_query($con, $query2);

        if($r)
        {
          $_SESSION['m'] = "mmm";
          header("Location: users.php");
        }
        else
        {
          echo "<script>alert ('Sorry Something Went Wrong')</script>"; 
        }

        header("Location: users.php");
      }
    
   
    if(isset($_POST["update"])) 
    {
    $id = $_POST["id"];
    $name = $_POST["upd_name"];
    $phone = $_POST["upd_phone"];
    $email = $_POST["upd_email"];
    $address = $_POST["upd_address"];
    $role = $_POST["upd_role"];
    $password = $_POST["upd_password"];
    // $pimage = $_FILES["upd_pro_image"]['name'];
    
    $q1 = "SELECT * FROM `tbl_user` WHERE `id`= '$id'";
    $res = mysqli_query($con, $q1);
    $row = mysqli_fetch_array($res);

    if($_FILES["upd_image"]["name"] !="" && $_FILES["upd_image"]["name"] !=null)
    {
       $image= $_FILES["upd_image"]['name'];
        move_uploaded_file($_FILES["upd_image"]['tmp_name'],"backassets/images/users/".$_FILES["upd_image"]['name']);
    }
    else
    {
        $image = $row['image'];
    }

    $q = "UPDATE `tbl_user` SET `name`= '$name' ,`phone`= '$phone',`email`='$email',`address`='$address', `image`='$image', `role`='$role', `password`='$password' WHERE `id`= '$id'";
        $query = mysqli_query($con, $q);
     if($query)
     {
        $_SESSION['suc'] = "lll";
        header("Location: users.php");
     }  
     else 
     {
      echo "<script>alert ('Sorry Something Went Wrong')</script>"; 
     }
    }

    if(isset($_GET["Suspend_id"])){
        $id=$_GET["Suspend_id"];
        $u = " UPDATE `tbl_user` SET `status` ='Unsuspend' WHERE `id`='$id'";
        $up = mysqli_query($con,$u);
        echo mysqli_error($con);
        if($up)
        {
          $_SESSION['success'] = 'success';
        header("location:users.php");
        }
        else
        {
          echo "<script>alert ('Sorry Something Went Wrong')</script>";
        }
      
      
      }
      if(isset($_GET["Unsuspend_id"])){
        $id=$_GET["Unsuspend_id"];
        $u = " UPDATE `tbl_user` SET `status` ='Suspend' where `id` ='$id'";
        $up = mysqli_query($con,$u);
        echo mysqli_error($con);
        if($up)
        {
          $_SESSION['status'] = 'status';
      header("location:users.php");
      
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
           $y = mysqli_query($con,"DELETE FROM tbl_user WHERE id = " . $id);
        }
        if($y)
        {
          $_SESSION['d'] = "dddd";
          header("Location: users.php");
        }
        else
        {
          echo "<script>alert ('Sorry Something Went Wrong')</script>";
        }
       header("Location: users.php");
    }
   
?>