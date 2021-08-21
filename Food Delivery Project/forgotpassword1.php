<?php
include_once "database/connect.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Title</title>
<style>
body {
  background-color: #2a4066;
}

.form-container {
  /* margin: 100px auto; */
  padding: 30px;
  max-width: 350px;
  background: white;
  box-sizing: border-box;
}

.container {
  margin: 100px auto;
  max-width: 350px;
  /* background: white; */
  box-sizing: border-box;
}

.form-container .head {
  text-align: center;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
}

.Inputs {
  padding-top: 50px;
}

form {
  width: 100%;
}

form label {
  display: block;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  color: grey;
  line-height: 30px;
}

input {
  display: block;
  margin-bottom: 20px;
  width: 100%;
  padding: 5px;
  border: 1px solid rgb(133, 133, 133);
  border-radius: 5px;
  box-sizing: border-box;
}

button {
  display: block;
  margin-bottom: 20px;
  width: 100%;
  padding: 5px;
  background: #3fb996;
  border: hidden;
  color: white;
  font-weight: bold;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
}

.footer {
  text-align: center;
  font-size: 10px;
  box-sizing: border-box;
  padding: 5px 20px;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
}

a {
  text-decoration: none;
}

.signup {
  margin: 20px;
  text-align: center;
  color: white;
  /* font-weight: bold; */
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
}

.signup a {
  color: #3fb996;
}


</style>
</head>
<body>
  <div class="container">
    <div class="form-container">
      <div class="head">
        <h3>Forgot password</h3>
      </div>
      <form class="Inputs" action="#" method="POST" >
      <!-- <input type="text" hidden name="id" value="<?=$newID?>"> -->
        <label for="pswd">Password</label>
        <input onkeyup='check();' id="password" name="password" value="" />
        <label for="cofirm_pswd">Confirm Password</label>
        <input onkeyup='check();' id="confirm_password" name="cofirm_pswd" value="" /> 
        <div class="uk-margin-small uk-width-auto uk-text-small">
        <span id='message'></span> 
        </div>
        <button type="submit" name="submit" id="btn" >Sign Up</button>
      </form>
    
    </div>
    <script>
 var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'MATCHING';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'NOT MATCHING';
  }
}
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>
<?php
if(isset($_POST['submit'])){
	$newID = $_GET['id'];
	$password = $_POST['password'];
	$q = " UPDATE `tbl_user` SET `password`='$password' where id = '$newID'";
    $query = mysqli_query($con,$q);
    if($query){
    
      header('location:index.php');

    }
    

    // header("Location: index.php");
   
}


?>
<script>
let btn = document. getElementById("btn");
  btn.addEventListener("click", function(){ 
    var psd = document.getElementById("password").value();
    var cpsd = document.getElementById("confirm_password").value();
    if(psd == cpsd){
      swal({
  title: "Wrong!",
  text: " please fill both feild same",
  icon: "warnig",
  button: "Aww yiss!",
});
    }
    
  });


</script>
  