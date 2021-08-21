<?php
include_once "database/connect.php";

    if(isset($_POST['cannouncement']))
    {
        $title = $_POST['title'];
        $date = $_POST['date'];
        $desc = $_POST['desc'];
        $aimage = $_FILES['image']['name'];
        if($title !="" && $title !=null || $date !="" && $date !=null || $desc !="" && $desc !=null ||  $aimage !="" && $aimage !=null ){
        $query = "INSERT INTO `announcement`(`title`, `description`, `date`, `image`, `status`) VALUES 
        ('$title','$desc','$date','$aimage','1')";
        move_uploaded_file($_FILES['image']['tmp_name'],"backassets/images/announcement/".$_FILES['image']['name']);
        $insertquery = mysqli_query($con,$query);
        echo mysqli_error($con); 
        if($insertquery > 0)
        {
            $_SESSION['u'] = "addd";
            header("Location: announcement.php");
        }
        else{
            echo "<script>alert ('Sorry Something Went Wrong')</script>";
        }
    }
        header("Location: announcement.php");
    }
    
    
    if(isset($_GET['del_id'])){
        $id = $_GET['del_id'];
        $query2 = "DELETE FROM `announcement` WHERE `id` = '$id'";
        $r = mysqli_query($con, $query2);

        if($r)
        {
            $_SESSION['l'] = "sass";
            header("Location: announcement.php");
        }
        else
        {
            echo "<script>alert ('Sorry Something Went Wrong')</script>";
        }
        header("Location: announcement.php");
    }
   
        
        //this is for the update record
        if(isset($_POST["update"])) 
        {
        $id = $_POST["id"];
        $title = $_POST["utitle"];
        $date = $_POST["udate"];
        $desc = $_POST["udesc"];
        // $pprice = $_POST["upd_pro_price"];
        // $pimage = $_FILES["upd_pro_image"]['name'];
        
        $q1 = "SELECT * FROM `announcement` WHERE `id`= '$id'";
        $res = mysqli_query($con, $q1);
        $row = mysqli_fetch_array($res);
       
        $q1 = "SELECT * FROM `announcement` WHERE `id`= '$id'";
        $res = mysqli_query($con, $q1);
        $row = mysqli_fetch_array($res);
    
        if($_FILES["uimage"]["name"] !="" && $_FILES["uimage"]["name"] !=null)
        {
           $image= $_FILES["uimage"]['name'];
            move_uploaded_file($_FILES["uimage"]['tmp_name'],"backassets/images/announcement/".$_FILES["uimage"]['name']);
        }
        else
        {
            $image = $row['image'];
        }
           
        $q = "UPDATE `announcement` SET `title`= '$title' ,`description`= '$desc',`date`='$date',`image`='$image' WHERE `id`= '$id'";
            $query = mysqli_query($con, $q);
            echo  mysqli_error($con);
         if($query)
         {
            $_SESSION['s'] =  "jjj";
            header("Location: announcement.php");
         }  
         else 
         {
            echo "<script>alert ('Sorry Something Went Wrong')</script>";
         }
        header("Location: announcement.php");
        }
        
        
    if(isset($_GET["Suspend_id"])){
        $id=$_GET["Suspend_id"];
        $u = " UPDATE `announcement` SET `status` ='1' WHERE `id`='$id'";
        $up = mysqli_query($con,$u);
        echo mysqli_error($con);
        if($up)
        {
          $_SESSION['success'] = 'success';
         header("location:announcement.php");
        }
        else
        {
          echo "<script>alert ('Sorry Something Went Wrong')</script>";
        }
      
         header("location:announcement.php");
      }
      if(isset($_GET["Unsuspend_id"])){
        $id=$_GET["Unsuspend_id"];
        $u = " UPDATE `announcement` SET `status` ='0' where `id` ='$id'";
        $up = mysqli_query($con,$u);
        echo mysqli_error($con);
        if($up)
        {
          $_SESSION['status'] = 'status';
             header("location:announcement.php");
      
        }
        else
        {
          echo "<script>alert ('Sorry Something Went Wrong')</script>";
        }
            header("location:announcement.php");
    }

   
    if(isset($_POST['chk_id']))
    {
        $arr = $_POST['chk_id'];
        foreach ($arr as $id) {
           $r = mysqli_query($con,"DELETE FROM announcement WHERE id = " . $id);
        }
        if($r)
        {
            $_SESSION['k'] = "kkk";
            header("Location: announcement.php");
        }
        else
        {
            echo "<script>alert ('Sorry Something Went Wrong')</script>";
        }
        header("Location: announcement.php");
    }

    ?>  