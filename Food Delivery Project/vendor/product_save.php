<?php
include "database/connect.php";
// if(isset($_POST["option"])){
// $pro = $_POST['option'];
// $query = "SELECT * FROM tbl_sub_category WHERE cat_id = '$pro'";
// $q = mysqli_query($con, $query);
// $row = mysqli_fetch_array($q);
 
// echo $row['sub_cat_name'];
// }

$Vendor_ID = $_SESSION["vendor_id"];

if(isset($_POST['subcat']))
{
	
$subcat = $_POST['subcat'];
echo "$subcat";

	$query = "SELECT * from `tbl_categories` JOIN tbl_sub_category ON tbl_sub_category.cat_id=tbl_categories.cat_id WHERE tbl_categories.cat_id = '$subcat'";

	$result = $con->query($query);
// echo "alert($result)";
	if ($result->num_rows > 0) {
        echo '<option>select</option>'; 
 	   while ($row = $result->fetch_assoc()) {
		echo '       

        <option value="'.$row['sub_cat_id'].'">'.$row['sub_cat_name'].'</option>';
 	    }
	}else{
	    echo '<option value="">No Record </option>'; 
	}
}

if(isset($_POST['subcategory']))
{
	
$subcate = $_POST['subcategory'];
echo "$subcate";

	$query = "SELECT * from `tbl_categories` JOIN tbl_sub_category ON tbl_sub_category.cat_id=tbl_categories.cat_id WHERE tbl_categories.cat_id = '$subcate'";

	$result = $con->query($query);
// echo "alert($result)";
	if ($result->num_rows > 0) {
        echo '<option>select</option>'; 
 	   while ($row = $result->fetch_assoc()) {
		echo '       

        <option value="'.$row['sub_cat_id'].'">'.$row['sub_cat_name'].'</option>';
 	    }
	}else{
	    echo '<option value="">No Record </option>'; 
	}
}

if(isset($_POST["opti"])){
    $pro = $_POST['opti'];
    $query = "SELECT * FROM tbl_sub_category WHERE cat_id = '$pro'";
    $q = mysqli_query($con, $query);
    $row = mysqli_fetch_array($q);
     
    echo $row['sub_cat_name'];
    }
if(isset($_POST['submit']))
{
    $category = $_POST['parent_category1'];
    $subcategory = $_POST['sub_cat_name1'];
    $pname = $_POST['pro_name'];
    $pprice = $_POST['pro_price'];
    $pimage = $_FILES['image']['name'];
    $quantity = $_POST['quantity'];
    $desc = $_POST['desc'];
    if($category !="" && $category !=null || $subcategory !="" && $subcategory !=null || $pname !="" && $pname !=null || $pprice !="" && $pprice !=null || $pimage !="" && $pimage !=null || $quantity !="" && $quantity !=null|| $desc !="" && $desc !=null){
    $query = "INSERT INTO `tbl_products`(`vendor_id`, `category`,`sub_category`,`product_name`,`product_price`,`product_image`,`qauntity`,`descp`,`status`) VALUES ('$Vendor_ID', '$category','$subcategory','$pname','$pprice','$pimage','$quantity','$desc','Suspend')";
    move_uploaded_file($_FILES['image']['tmp_name'],"backassets/images/product/".$_FILES['image']['name']);
    $insertquery = mysqli_query($con,$query);
    echo mysqli_error($con); 
    if($insertquery > 0)
    {
        $_SESSION['uu'] = "sss";
        header("location: product.php");
    }
    else{
        echo "<script>alert ('Sorry Something Went Wrong')</script>";
    }
}
 header("Location: product.php");
}

if(isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    $query2 = "DELETE FROM `tbl_products` WHERE `id` = '$id'";
    $r = mysqli_query($con, $query2);
    if($r)
        {
          $_SESSION['m'] = "mmmm"; 
          header("Location: product.php");
        }
        else
        {
          echo "<script>alert ('Sorry Something Went Wrong')</script>";
        }
    
    header("Location: product.php");
}else{  
   echo '<script>alert("Please Select Product You Want To Delete");
   location.replace("product.php");</script>';
}
// header("Location: product.php");
    //this is for the update record
    if(isset($_POST["update"])) {
    $id = $_POST["id"];
    $Cat = $_POST["name"];
    $sub = $_POST["upd_sub_cat_name"];
    $pname = $_POST["upd_pro_name"];
    $pprice = $_POST["upd_pro_price"];
    $quan = $_POST["upd_quantity"];
    $des = $_POST["upd_desc"];
    $pimage = $_FILES["upd_pro_image"]['name'];
    
    $q1 = "SELECT * FROM `tbl_products` WHERE `id`= '$id'";
    $res = mysqli_query($con, $q1);
    $row = mysqli_fetch_array($res);

    if($_FILES["upd_pro_image"]["name"]  !="" && $_FILES["upd_pro_image"]["name"] !=null)
    {
       $pimage= $_FILES["upd_pro_image"]['name'];
        move_uploaded_file($_FILES["upd_pro_image"]['tmp_name'],"backassets/images/product/".$_FILES["upd_pro_image"]['name']);
    }
    else
    {
        $pimage = $row['product_image'];
    }

    $q = "UPDATE `tbl_products` SET `category`= '$Cat' ,`sub_category`= '$sub',`product_name`='$pname',`product_price`='$pprice', `product_image`='$pimage', `qauntity`='$quan', `descp`='$des' WHERE `id`= '$id'";
        $query = mysqli_query($con, $q);
     if($query)
     {
        $_SESSION['suc'] = "lll";
        header("Location: product.php");
     }  
     else 
     {
        echo "<script>alert ('Sorry Something Went Wrong')</script>"; 
     }
     header("Location: product.php");
    }
    
   
    if(isset($_GET["Suspend_id"])){
        $id=$_GET["Suspend_id"];
        $u = " UPDATE `tbl_products` SET `status` ='Unsuspend' WHERE `id`='$id'";
        $up = mysqli_query($con,$u);
        echo mysqli_error($con);
        if($up)
        {
          $_SESSION['success'] = 'success';
        header("location:product.php"); 
        }
        else
        {
          echo "<script>alert ('Sorry Something Went Wrong')</script>";
        }
      
        header("location:product.php");
      }
      if(isset($_GET["Unsuspend_id"])){
        $id=$_GET["Unsuspend_id"];
        $u = " UPDATE `tbl_products` SET `status` ='Suspend' where `id` ='$id'";
        $up = mysqli_query($con,$u);
        echo mysqli_error($con);
        if($up)
        {
          $_SESSION['status'] = 'status';
            header("location:product.php");
      
        }
        else
        {
          echo "<script>alert ('Sorry Something Went Wrong')</script>";
        }
        header("location:product.php");
    }

   
    if(isset($_POST['chk_id']))
    {
        $arr = $_POST['chk_id'];
        foreach ($arr as $id) {
            $y =  mysqli_query($con,"DELETE FROM tbl_products WHERE id = " . $id);
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
    //    header("Location: product.php");
    header("Location: product.php");   
    }
     
?>