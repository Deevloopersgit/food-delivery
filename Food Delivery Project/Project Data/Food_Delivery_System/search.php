<?php
include_once "database/connect.php";
if(isset($_POST['submit']))
{
$search = $_POST['search'];

$q = "SELECT * FROM `tbl_products` WHERE `product_name` LIKE '%$search%'";
$r = mysqli_query($con, $q);
$queryres = mysqli_num_rows($r);

// echo "There is '$queryres' results!";
$res=array();
if($queryres > 0)
{
    while($row = mysqli_fetch_assoc($r))
    {
       array_push($res,array("image"=>$row["product_image"], "product_name"=>$row["product_name"], "product_price"=>$row["product_price"]));
    }
    echo json_encode($res);
}else
{
    echo "Not Found";
}

}


?>
