<?php
include_once "database/connect.php";
 if(isset($_POST['submit'])){
    $email = $_POST['email'];
     $password = $_POST['password'];
 
$q = "SELECT * FROM `tbl_user` WHERE  email = '$email' AND password = '$password' ";
$r = mysqli_query($con,$q);
$row = mysqli_num_rows($r);
$fet = mysqli_fetch_assoc($r);
if($row > 0){
    if($fet['role'] == 4){
    $_SESSION["admin_email"] = $fet['email'];
    $_SESSION["u"] = "aad";
    header('location:index.php');
}else{

    $_SESSION['ss'] = 'lll';
    header("Location: login.php");
}
}else{
    $_SESSION["error"] = "error";
    // echo"errro";
        header('location:login.php');  
    }

}



?>