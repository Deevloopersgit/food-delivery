<?php
include_once "database/connect.php";

//terms and condition
if(isset($_POST["update"])) 
{
$id = $_POST["id"];
$description = $_POST["description"];

$q = "UPDATE `terms` SET `description`= '$description'  WHERE `id`= '$id'";
    $query = mysqli_query($con, $q);
 if($query)
 {
    $_SESSION['suc'] = "lll";
    header("Location: terms&conditions.php");
 }  
 else 
 {
    echo "<script>alert ('Sorry Something Went Wrong')</script>";   
 }

 header("Location: terms&conditions.php");
}


?>