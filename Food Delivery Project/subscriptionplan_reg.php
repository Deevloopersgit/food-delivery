<?php
include_once "database/connect.php";

if(isset($_GET["insertbtn"])){
if(isset($_SESSION["user_email"])){
    $emai=$_SESSION["user_email"];
    $q=mysqli_query($con,"SELECT * FROM `tbl_user` WHERE  `email` = '$emai'");
    $login_row = mysqli_fetch_assoc($q);
   $uid=$login_row['id'];
    $pid=$_GET["pid"];
    $query = mysqli_query($con, "SELECT * FROM `tbl_subscriptionplan` WHERE `username` =  '$uid'");
    if(mysqli_num_rows($query) > 0)
    {
        $_SESSION['ddd'] = "jjjj";
        header("Location: index.php");
    }else{
$q = mysqli_query($con, "INSERT INTO `tbl_subscriptionplan` (`username`,`pack_name`,`pack_status`) VALUES ('$uid','$pid','Suspend')");
echo mysqli_error($con);
    $_SESSION['sub'] ="sub";

header("location:index.php");
}
 }else{
    $_SESSION['sube'] ="sube";
    header("location:index.php"); 
 

} 

}
?>