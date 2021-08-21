<?php
include "database/connect.php";

if(isset($_POST['submit']))
{
    $blog_name = $_POST['blog_name'];
    $blog_desc = $_POST['blog_desc'];
    $image = $_FILES['image']['name'];

    if($blog_name !="" && $blog_name !=null || $blog_desc !="" && $blog_desc !=null || $blog_image !="" && $blog_image !=null ){
    $query = "INSERT INTO `tbl_blog`(`blog_name`, `blog_desc`, `blog_image`, `status`) VALUES ('$blog_name','$blog_desc','$image','0')";
    move_uploaded_file($_FILES['image']['tmp_name'],"backassets/images/blog/".$_FILES['image']['name']);
    $insertquery = mysqli_query($con, $query);
    echo mysqli_error($con); 
    if($insertquery)
    {
        $_SESSION['uu'] = "sss";
        header("location: blog.php");
    }
    else{
      echo "<script>alert ('Sorry Something Went Wrong')</script>";
    }
}
header("Location: blog.php");
}
if(isset($_POST["fecthupate"])){
    extract($_POST);
    // echo $id;
    $q=mysqli_query($con,"select * from tbl_blog where id='$id'");
    $fe=mysqli_fetch_array($q);
    echo $fe["blog_desc"];
}

    if(isset($_GET['del_id'])){
        $id = $_GET['del_id'];
        $query2 = "DELETE FROM `tbl_blog` WHERE `id` = '$id'";
        $r = mysqli_query($con, $query2);

        if($r)
        {
          $_SESSION['m'] = "mmmm";
          header("Location: blog.php");
        }
        else
        {
          echo "<script>alert ('Sorry Something Went Wrong')</script>";
        }

        header("Location: blog.php");
    }
    
   
    if(isset($_POST["update"])) 
    {
    $id = $_POST["id"];
    $upd_blog_name = $_POST["upd_blog_name"];
    $upd_blog_desc = $_POST["upd_blog_desc"];
    
    $q1 = "SELECT * FROM `tbl_blog` WHERE `id`= '$id'";
    $res = mysqli_query($con, $q1);
    $row = mysqli_fetch_array($res);

    if($_FILES["upd_blog_image"]["name"] !="" && $_FILES["upd_blog_image"]["name"] !=null)
    {
       $upd_blog_image= $_FILES["upd_blog_image"]['name'];
        move_uploaded_file($_FILES["upd_blog_image"]['tmp_name'],"backassets/images/blog/".$_FILES["upd_blog_image"]['name']);
    }
    else
    {
        $upd_blog_image = $row['upd_blog_image'];
    }
    $q = "UPDATE `tbl_blog` SET `blog_name`= '$upd_blog_name' ,`blog_desc`= '$upd_blog_desc', `blog_image`='$upd_blog_image' WHERE `id`= '$id'";
        $query = mysqli_query($con, $q);
     if($query)
     {
        $_SESSION['suc'] = "lll";
        header("Location: blog.php");
     }  
     else 
     {
      echo "<script>alert ('Sorry Something Went Wrong')</script>"; 
     }
     header("Location: blog.php");
    }

    if(isset($_GET["Suspend_id"])){
        $id=$_GET["Suspend_id"];
        $u = " UPDATE `tbl_agent` SET `status` ='Unsuspend' WHERE `id`='$id'";
        $up = mysqli_query($con,$u);
        echo mysqli_error($con);
        if($up)
        {
          $_SESSION['success'] = 'success';
        header("location:agent.php");
        }
        else
        {
          echo "<script>alert ('Sorry Something Went Wrong')</script>";
        }
      
      
      }
      if(isset($_GET["Unsuspend_id"])){
        $id=$_GET["Unsuspend_id"];
        $u = " UPDATE `tbl_agent` SET `status` ='Suspend' where `id` ='$id'";
        $up = mysqli_query($con,$u);
        echo mysqli_error($con);
        if($up)
        {
          $_SESSION['status'] = 'status';
      header("location:agent.php");
      
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
       $y = mysqli_query($con,"DELETE FROM tbl_blog WHERE id = " . $id);
    }
    if($y)
    {
      $_SESSION['d'] = "dddd";
      header("Location: blog.php");
    }
    else
    {
      echo "<script>alert ('Sorry Something Went Wrong')</script>";
    }
   header("Location: blog.php");
}
if(isset($_POST['pro'])){
  $promocode = $_POST['promocode'];
 
 $e="SELECT * FROM `tbl_order` where promo_code ='$promocode '" ;
 $r = mysqli_query($con,$e);
 $t=mysqli_num_rows($r);
 if($t>0){
   $_SESSION['pro'] = 'pro';
   header("location:agent.php");
 }else{
   $_SESSION['promo'] = 'promo';
   header("location:agent.php");
 }
}
?>