<?php
include_once "database/connect.php";
if(isset($_POST['insert']))
{

    $parent = $_POST['parentCat'];
    $sub = $_POST['subCat'];
    if($parent !="" && $parent !=null && $sub!="" && $sub!="" && $sub!=null){
    $query = "INSERT INTO `tbl_sub_category`(`sub_cat_name`, `cat_id`) VALUES ('$sub',$parent)";
    $insertquery = mysqli_query($con,$query);
    if($insertquery >0)
    {
        echo "1";
    }
    else{
        echo "0";
    }
}
}
if(isset($_POST["load"])){
//
    $q = "SELECT * FROM `tbl_sub_category` as sub join `tbl_categories` as parent on sub.cat_id=parent.cat_id";
       $query = mysqli_query($con,$q);
       $response=array();
     while($res =mysqli_fetch_array($query )){
      array_push($response,array("id"=>$res["sub_cat_id"],"subCat"=>$res["sub_cat_name"],"parentCat"=>$res["cat_name"]));
     }
     echo json_encode($response);
}
if(isset($_POST["deletedata"])){
  //DELETE FROM `tbl_sub_category` WHERE `sub_cat_id` = $id
    $id=mysqli_real_escape_string($con,$_POST["id"]);
   
    if($id !="" && $id!=null){ 
    $q=mysqli_query($con,"DELETE FROM `tbl_sub_category` WHERE `sub_cat_id`='$id'");
    
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
    $query = "SELECT * FROM `tbl_sub_category` WHERE `sub_cat_id` = $cat_id";
    $result = mysqli_query($con,$query);
    $response = array();
    $row = mysqli_fetch_array($result);
    $response = $row;
    echo json_encode($response);
}
//this is for the update record
if(isset($_POST["update"])) 
{
$id = $_POST["id"];
$parent = $_POST["parent"];
$sub = $_POST["sub"];
$q = "UPDATE `tbl_sub_category` SET `sub_cat_name`= '$sub' ,`cat_id`= $parent WHERE `sub_cat_id`= $id";
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

if(isset($_POST["data"]))
{
$dataArr =  $_POST["data"];
foreach ($dataArr as $id) {
	mysqli_query($con,"DELETE FROM `tbl_sub_category` WHERE sub_cat_id = '$id'");
}
echo "Record delete Successfully";
}
?>