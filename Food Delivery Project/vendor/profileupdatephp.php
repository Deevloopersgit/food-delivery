<?php
$pagename = "Home";
// $pagename = "profile";
include_once "../database/connect.php";
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $image = $_FILES['image']['tmp_name'];
    // echo $image;
   $q =mysqli_query($con,"SELECT * FROM  `tbl_vendor` WHERE id = '$id'");
   $row = mysqli_fetch_array($q);
   if($_FILES["image"]["name"] !="" && $_FILES["image"]["name"] !=null)
   {
      $image= $_FILES["image"]['name'];
      move_uploaded_file($_FILES['image']['tmp_name'],"backassets/images/vendors/". $_FILES ['image']['name']);
}
   else
   {
       $image = $row['image'];
   }

   $e = mysqli_query($con,"UPDATE `tbl_vendor` SET `id`='$id',`name`='$name',`phone`='$phone',
   `email`='$email',`image`='$image',`address`='$address',`password`='$password' WHERE id='$id'");
if($e){
    header("location:profile.php");
}else{
    echo "not done";

}





// if($image =='' || $image == null){
//     $q=mysqli_query($con,"UPDATE `tbl_vendor` SET `id`='$id',`name`='$name',`phone`='$phone',
//     `email`='$email',`address`='$address',`password`='$password' WHERE id='$id' ");
//     }else{
//         //$image = $_FILES['image']['tmp_name'];
//         $c=mysqli_query($con,"UPDATE `tbl_vendor` SET `id`='$id',`name`='$name',`phone`='$phone',
//         `email`='$email',`image`='$image',`address`='$address',`password`='$password' WHERE id='$id' ");
//          if($c){
//               move_uploaded_file($_FILES['image']['tmp_name'],"backassets/images/vendors/". $_FILES ['image']['name']);

//          }
//     }
// if($q){
//     header("location:profile.php");
// }else{
//     echo "not done";

// }

}
   



?>