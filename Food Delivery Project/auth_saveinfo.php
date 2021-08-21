<?php
include_once "database/connect.php";

if (isset($_POST['submit'])) {
  $lgemail = $_POST['email'];
  $lgpassword = $_POST['password'];
  $login_query = "SELECT * FROM `tbl_user` WHERE  `email` = '$lgemail' and `password` = '$lgpassword'" or die(mysqli_error($con));
  $login_res = mysqli_query($con, $login_query);
  $login_row = mysqli_fetch_assoc($login_res);
  $log = mysqli_num_rows($login_res);
  if ($log > 0) {

    if ($login_row['role'] == '1') {

      if ($login_row['verification'] == 1) {
        $_SESSION['cart'] = "cart";
        $_SESSION["user_email"] = $login_row['email'];
        $_SESSION['u_name'] = $login_row['name'];
        $_SESSION['u_pic'] = $login_row['image'];
        $_SESSION['wel'] = "wel"; // Login Message

        header('location:index.php');
      } else {
        $_SESSION["verification_required"] = "Unverified Account";
        header('location:login.php');
      }
    } elseif ($login_row['role'] == '2') {

      // header('location:vendor/index.php');
      if ($login_row['status'] == 'Unsuspend') {
        $_SESSION["vendor_id"] = $login_row['id'];
        $_SESSION["vendor_email"] = $login_row['email'];
        $_SESSION['name'] = $login_row['name'];
        // $_SESSION['v_id'] = $login_row['uid'];
        $_SESSION['v_pic'] = $login_row['image'];
        // $_SESSION['wel'] = "wel";
        header('location:vendor/index.php');
      } else {
        $_SESSION["verification_required"] = "Unverified Account";
        header('location:login.php');
      }
    } elseif ($login_row['role'] == '3') {

      if ($login_row['status'] == 'Unsuspend') {
        $_SESSION["driver_email"] = $login_row['email'];
        $_SESSION['d_name'] = $login_row['name'];
        // $_SESSION['d_id'] = $login_row['uid'];
        $_SESSION['d_pic'] = $login_row['image'];
        // $_SESSION['wel'] = "wel";
        header('location:driver/index.php');
      } else {
        $_SESSION["verification_required"] = "Unverified Account";
        header('location:login.php');
      }
    } elseif ($login_row['role'] == '4') {
?>
      <script>
        alert("Admin Can't Login Here, Use ADMIN LOGIN PANEL");
        location.replace('login.php');
      </script>
    <?php
    }
  } else {
?>
    <script>
      alert("Login Failed Please Try Again");
      window.location.href = 'login.php';
    </script>
<?php
  }
}
?>