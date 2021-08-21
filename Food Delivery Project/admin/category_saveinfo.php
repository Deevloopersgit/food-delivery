<?php
include_once "database/connect.php";
if(isset($_POST['insert']))
{
    $name = $_POST['name'];
    if($name !="" && $name!=null){
    $query = "INSERT INTO `tbl_categories`(`cat_name`) VALUES ('$name')";
    $insertquery = mysqli_query($con,$query);
    
    if($insertquery > 0)
    {
        echo "1";
    }
    else{
        echo "0";
    }
}
}
if(isset($_POST["load"])){

    $q = "SELECT * FROM `tbl_categories`";
       $query = mysqli_query($con,$q);
       $response=array();
     while($res =mysqli_fetch_array($query ))
     {
      array_push($response,array("id"=>$res["cat_id"],"categoryname"=>$res["cat_name"]));
     }
     echo json_encode($response);
}
if(isset($_POST["deletedata"])){
    $id=mysqli_real_escape_string($con,$_POST["id"]);
   
    if($id !="" && $id!=null){ 
    $q=mysqli_query($con,"DELETE FROM `tbl_categories` where `cat_id`='$id'");
    
    if($q > 0){
       echo "1"; 

    }else{
        echo "0";
  
    }
}
}
//this is for the update retreive record
if(isset($_POST["fetch"])){
$cat_id = $_POST['id'];
    $query = "SELECT * FROM `tbl_categories` where cat_id = '$cat_id'";
    $result = mysqli_query($con,$query);
    $response = array();
    $row = mysqli_fetch_array($result);
    $response = $row;
    echo json_encode($response);
}
//this is for the update record
if(isset($_POST["update"])) {
$id = $_POST["id"];
$cat_name = $_POST["cat_name"];
if($cat_name !="" && $cat_name !=null){
$q = "UPDATE `tbl_categories` SET `cat_name`= '$cat_name'  WHERE `cat_id` = $id";
    $query = mysqli_query($con,$q);
 if($query)
 {
    echo "1";
 }  
 else 
 {
    echo "0";
 }
}
}
if(isset($_POST["data"]))
{
$dataArr =  $_POST["data"];
foreach ($dataArr as $id) {
	mysqli_query($con,"DELETE FROM `tbl_categories` WHERE cat_id = '$id'");
}
echo "Record delete Successfully";
}
if(isset($_POST["loadforsubcat"])){

    $q = "SELECT * FROM `tbl_categories`";
       $query = mysqli_query($con,$q);
       $response=array();
     while($res =mysqli_fetch_array($query )){
      array_push($response,array("id"=>$res["cat_id"],"categoryname"=>$res["cat_name"]));
     }
     echo json_encode($response);
}
?>