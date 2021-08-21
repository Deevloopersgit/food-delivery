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
    $query = "INSERT INTO `tbl_user`(`name`,`phone`,`email`,`address`,`image`,`role`,`password`,`status`) VALUES ('$name','$phone','$email','$address','$image','2','$password','Suspend')";
    move_uploaded_file($_FILES['image']['tmp_name'],"../vendor/backassets/images/vendors/".$_FILES['image']['name']);
    $insertquery = mysqli_query($con, $query);
    echo mysqli_error($con); 
    if($insertquery) 
    {
        $_SESSION['uu'] = "sss";
        header("location: vendor.php");
    }
    else{
      echo "<script>alert ('Sorry Something Went Wrong')</script>"; 
    }
}
header("Location: vendor.php");
}

    if(isset($_GET['del_id'])){
        $id = $_GET['del_id'];
        $query2 = "DELETE FROM `tbl_user` WHERE `id` = '$id'";
        $r = mysqli_query($con, $query2);

        if($r)
        {
          $_SESSION['m'] = "mmmm"; 
          header("Location: vendor.php");
        }
        else
        {
          echo "<script>alert ('Sorry Something Went Wrong')</script>";
        }
        header("Location: vendor.php");
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
        move_uploaded_file($_FILES["upd_image"]['tmp_name'],"../vendor/backassets/images/vendors/".$_FILES["upd_image"]['name']);
    }
    else
    {
        $image = $row['image'];
    }

    $q = "UPDATE `tbl_user` SET `name`= '$name' ,`phone`= '$phone',`email`='$email',`address`='$address', `image`='$image',`role`='$role', `password`='$password' WHERE `id`= '$id'";
        $query = mysqli_query($con, $q);
     if($query)
     {
        $_SESSION['suc'] = "lll";
        header("Location: vendor.php");
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
          require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
   $mail->isSMTP();                                            // Send using SMTP
   $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
   $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
   $mail->Username   = 'stevejason360@gmail.com';                     // SMTP username
   $mail->Password   = 'honeysteve123';                               // SMTP password
   $mail->SMTPSecure ='tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
   $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

   //Recipients
   $mail->setFrom('stevejason360@gmail.com', 'Steve');
   $mail->addAddress('stevejason360@gmail.com');               // Name is optional
   $mail->addReplyTo('stevejason360@gmail.com', 'Information');


    
    
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'Congratulations you have been approved by admin now you can login!!';
 
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    
  $_SESSION['success'] = 'success';
  header("location:vendor.php");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}

else{
    echo "<script>alert ('please insert correct information')</script>";
}
header("location:vendor.php");
    }
    if(isset($_GET["Unsuspend_id"])){
        $id=$_GET["Unsuspend_id"];
        $u = " UPDATE `tbl_user` SET `status` ='Suspend' where `id` ='$id'";
        $up = mysqli_query($con,$u);
        echo mysqli_error($con);
        if($up)
        {
          $_SESSION['status'] = 'status';
      header("location:vendor.php");
      
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
          $_SESSION['d'] = "ddd";
          header("Location: vendor.php");
        }
        else
        {
          echo "<script>alert ('Sorry Something Went Wrong')</script>";
        }
       header("Location: vendor.php");
    }
   
?>