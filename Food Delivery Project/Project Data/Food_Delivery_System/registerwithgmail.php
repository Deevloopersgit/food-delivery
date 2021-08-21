<?php
include_once "database/connect.php";

if (isset($_POST['RegisterMe'])) {

    $vkey = md5(time());   // Verification Key
    $full_name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $image = $_SESSION['user_image']; // Gmail Account Image
    $address = $_POST['address'];

    if ($email != "") {
        $qe = "SELECT * FROM `tbl_user` WHERE email = '$email'";
        $res = mysqli_query($con, $qe);

        if (mysqli_num_rows($res) > 0) {
            $_SESSION["res"] = 'Email Already Exist';
            header("Location:index.php");
        } else {

            $query = "INSERT INTO `tbl_user`( `name`, `phone`, `email`, `password`, `image`, `address`, `role`, `verification`, `vkey`, `status`) VALUES ('$full_name','$phone','$email','$password','$image','$address','1','1','$vkey','Suspend')";
            $result = mysqli_query($con, $query);

            if ($result) {
                $_SESSION["Signup_Gmail"] = "Data Successfully Inserted";
                header("Location: index.php");
            } else {
                echo "<script>alert('mysqli_query Error')</script>";
                header("location:index.php");
            }
        }
    }
}