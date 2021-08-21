<?php
include "database/connect.php";

if(isset($_POST['submit']))
{
    $username = $_POST['name'];
    $pack_name = $_POST['p_num'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $duration = $_POST['duration'];
    if($username !="" && $username !=null || $pack_name !="" && $pack_name !=null || $price !="" && $price !=null || $desc !="" && $desc !=null  || $duration !="" && $duration !=null ){
    $query = "INSERT INTO `tbl_subscriptionplan`(`username`,`pack_name`,`pack_price`,`pack_description`,`pack_duration`,`pack_status`) VALUES ('$username','$pack_name','$price','$desc','$duration','Unsuspend')";
    $insertquery = mysqli_query($con, $query);
    echo mysqli_error($con); 
    if($insertquery)
    {
        $_SESSION['uu'] = "sss";
        header("location: subscription.php");
    }
    else{
      echo "<script>alert ('Sorry Something Went Wrong')</script>";
    }
}
header("Location: subscription.php");
}

    if(isset($_GET['del_id'])){
        $id = $_GET['del_id'];
        $query2 = "DELETE FROM `tbl_subscriptionplan` WHERE `pack_id` = '$id'";
        $r = mysqli_query($con, $query2);
        if($r)
        {
          $_SESSION['m'] = "mmmm";
          header("Location: subscription.php");
        }
        else
        {
          echo "<script>alert ('Sorry Something Went Wrong')</script>";
        }

        header("Location: subscription.php");
    }
    
   
    if(isset($_POST["update"])) 
    {
    $id = $_POST["id"];
    $username = $_POST["upd_name"];
    $pack_name = $_POST["upd_phone"];
    $pack_price = $_POST["upd_address"];
    $pack_duration = $_POST["upd_duration"];

    $q = "UPDATE `tbl_subscriptionplan` SET `username`= '$username' ,`pack_name`= '$pack_name',`pack_price`='$pack_price',`pack_duration`='$pack_duration' WHERE `id`= '$id'";
        $query = mysqli_query($con, $q);
     if($query)
     {
        $_SESSION['suc'] = "lll";
        header("Location: subscription.php");
     }  
     else 
     {
      echo "<script>alert ('Sorry Something Went Wrong')</script>"; 
     }
    }

    if(isset($_GET["Suspend_id"])){
        $id=$_GET["Suspend_id"];
        $u = " UPDATE `tbl_subscriptionplan` SET `pack_status` ='Unsuspend' WHERE `pack_id`='$id'";
        $up = mysqli_query($con,$u);
        echo mysqli_error($con);
        if($up)
        {
          $_SESSION['success'] = 'success';
        header("location:subscription.php");
        }
        else
        {
          echo "<script>alert ('Sorry Something Went Wrong')</script>";
        }
      
      
      }
      if(isset($_GET["Unsuspend_id"])){
        $id=$_GET["Unsuspend_id"];
        $u = " UPDATE `tbl_subscriptionplan` SET `pack_status` ='Suspend' WHERE `pack_id` ='$id'";
        $up = mysqli_query($con,$u);
        echo mysqli_error($con);
        if($up)
        {
          $_SESSION['status'] = 'status';
      header("location:subscription.php");
      
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
           $y = mysqli_query($con,"DELETE FROM tbl_subscriptionplan WHERE pack_id = " . $id);
        }
        if($y)
        {
          $_SESSION['d'] = "dddd";
          header("Location: subscription.php");
        }
        else
        {
          echo "<script>alert ('Sorry Something Went Wrong')</script>";
        }
           
       header("Location: subscription.php");
    }
?>

<?php
if(isset($_POST['price']))
{
	
$price = $_POST['price'];


	$query = "SELECT * from `package` ";

	$result = $con->query($query);
// echo "alert($result)";
	if ($result->num_rows > 0) {
 	   while ($row = $result->fetch_assoc()) {
		echo '       
        <label >Package Price</label>
        <input type="text" class="form-control"  readonly name="price" hidden  value="'.$row['id'].'" >';
echo'
        <input type="text" class="form-control"  readonly name="price"  value="'.$row['price'].'" >';

 	    }
	}else{
	    echo '<input type="text" class="form-control"  readonly   value="no record found" >'; 
	}
}
if(isset($_POST['duration']))
{
	
    $price = $_POST['duration'];


	$query = "SELECT * from `package`";

	$res = $con->query($query);
// echo "alert($result)";
	if ($res->num_rows > 0) {
		echo '       
        <label >Package Duration</label>
        <input type="text" class="form-control"  readonly name="duration"  value="'.$res['duration'].'" >';

 	    
	}else{
	    echo '<input type="text" class="form-control"  readonly   value="no record found" >'; 
	}
}
if(isset($_POST["crtsubs"]))
{
	$id=$_POST["id"];
	$js=mysqli_query($con,"SELECT * FROM `package` where id='$id'");
	$row=mysqli_fetch_array($js);

	echo json_encode($row);

}
?>