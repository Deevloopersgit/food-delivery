<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once "database/connect.php";

if (isset($_POST['submit'])) {

  $vkey = md5(time());   // Verification Key
  $image = $_FILES['image']['name']; // Uploading File Name.
  $temp_img = $_FILES['image']['tmp_name']; // Temporary Image Name
  $folder = "assets/images/userimages/" . $image; // Image Saving Path
  $full_name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];

  if ($email != "") {
    $qe = "SELECT * FROM `tbl_user` WHERE email = '$email'";
    $res = mysqli_query($con, $qe);

    if (mysqli_num_rows($res) > 0) {
      $_SESSION["res"] = 'Email Already Exist';
      header("Location:index.php");
    } else {
      move_uploaded_file($temp_img, $folder);

      $query = "INSERT INTO `tbl_user`( `name`, `phone`, `email`, `password`, `image`, `address`, `role`, `verification`, `vkey` ,`status`) VALUES ('$full_name','$phone','$email','$password','$image','$address','1','0','$vkey','Suspend')";
      $result1 = mysqli_query($con, $query);

      if ($result1) {

        $sql = "SELECT * FROM tbl_user WHERE email = '$email' ";
        $result = mysqli_query($con, $sql);
        $res = mysqli_fetch_array($result);
        $row = mysqli_num_rows($result);
        if ($row > 0) {

          require 'PHPMailer/src/Exception.php';
          require 'PHPMailer/src/PHPMailer.php';
          require 'PHPMailer/src/SMTP.php';

          // Instantiation and passing `true` enables exceptions
          $mail = new PHPMailer(true);

          try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'youremail@gmail.com';                     // SMTP username
            $mail->Password   = 'yourpassword';                             // SMTP password
            $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('youremail@gmail.com', 'Sender Name');
            $mail->addAddress($email);               // Name is optional
            $mail->addReplyTo('youremail@gmail.com', 'Reciever Name');

            $mail->isHTML(true);

            // Email body content
            ob_start();
?>
            <!DOCTYPE html>
            <html>

            <head>

              <meta charset="utf-8">
              <meta http-equiv="x-ua-compatible" content="ie=edge">
              <title>E-mail Verification</title>
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <style type="text/css">
                /**
* Google webfonts. Recommended to include the .woff version for cross-client compatibility.
*/
                @media screen {
                  @font-face {
                    font-family: 'Source Sans Pro';
                    font-style: normal;
                    font-weight: 400;
                    src: local('Source Sans Pro Regular'), local('SourceSansPro-Regular'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format('woff');
                  }

                  @font-face {
                    font-family: 'Source Sans Pro';
                    font-style: normal;
                    font-weight: 700;
                    src: local('Source Sans Pro Bold'), local('SourceSansPro-Bold'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format('woff');
                  }
                }

                /**
* Avoid browser level font resizing.
* 1. Windows Mobile
* 2. iOS / OSX
*/
                body,
                table,
                td,
                a {
                  -ms-text-size-adjust: 100%;
                  /* 1 */
                  -webkit-text-size-adjust: 100%;
                  /* 2 */
                }

                /**
* Better fluid images in Internet Explorer.
*/
                img {
                  -ms-interpolation-mode: bicubic;
                }

                /**
* Remove blue links for iOS devices.
*/
                a[x-apple-data-detectors] {
                  font-family: inherit !important;
                  font-size: inherit !important;
                  font-weight: inherit !important;
                  line-height: inherit !important;
                  color: inherit !important;
                  text-decoration: none !important;
                }

                /**
* Fix centering issues in Android 4.4.
*/
                div[style*="margin: 16px 0;"] {
                  margin: 0 !important;
                }

                body {
                  width: 100% !important;
                  height: 100% !important;
                  padding: 0 !important;
                  margin: 0 !important;
                }

                /**
* Collapse table borders to avoid space between cells.
*/
                table {
                  border-collapse: collapse !important;
                }

                a {
                  color: #1a82e2;
                }

                img {
                  height: auto;
                  line-height: 100%;
                  text-decoration: none;
                  border: 0;
                  outline: none;
                }
              </style>

            </head>

            <body style="background-color: #e9ecef;">

              <!-- start preheader -->
              <div class="preheader" style="display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;">
                Please Verify Your Email Address To Create An Account.
              </div>
              <!-- end preheader -->

              <!-- start body -->
              <table border="0" cellpadding="0" cellspacing="0" width="100%">

                <!-- start logo -->
                <tr>
                  <td align="center" bgcolor="#e9ecef">

                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                      <tr>
                        <td align="center" valign="top" style="padding: 36px 24px;">

                          <a href="<?= $url ?>" target="_blank"><img src="https://i.ibb.co/3kN3Prv/logo-3.png" alt="logo" border="0" /></a>
                        </td>
                      </tr>
                    </table>

                  </td>
                </tr>
                <!-- end logo -->

                <!-- start hero -->
                <tr>
                  <td align="center" bgcolor="#e9ecef">

                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                      <tr>
                        <td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;">
                          <h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Congratulations</h1>
                        </td>
                      </tr>
                    </table>

                  </td>
                </tr>
                <!-- end hero -->

                <!-- start copy block -->
                <tr>
                  <td align="center" bgcolor="#e9ecef">

                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">

                      <!-- start copy -->
                      <tr>
                        <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                          <h4>Hi there!!</h4>
                          <p style="margin: 0;">You have been registered successfully please click the button below for verification purpuse..</p>
                        </td>
                      </tr>
                      <!-- end copy -->

                      <!-- start button -->
                      <tr>
                        <td align="left" bgcolor="#ffffff">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                              <td align="center" bgcolor="#ffffff" style="padding: 12px;">
                                <table border="0" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td align="center" bgcolor="#1a82e2" style="border-radius: 6px;">
                                      <a href="http://localhost/Food_Delivery_System/verificationkey.php?vkey=<?= $vkey ?>" target="_blank" style="display: inline-block; padding: 16px 36px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; color: #ffffff; text-decoration: none; border-radius: 6px;">Click here</a>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <!-- end button -->

                    </table>
                  </td>
                </tr>
                <!-- end copy block -->

              </table>

            </body>

            </html>

<?php
            $html = ob_get_contents();
            ob_end_clean();
            $mailContent = $html;
            $mail->Subject = 'Account Activation';
            $mail->Body = $mailContent;

            // Send email
            if (!$mail->send()) {
              echo 'Message could not be sent.';
              echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
              $_SESSION["status"] = "Email Successfully Sent";
              header("location:index.php");
            }
          } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          }
        } else {
          echo "<script>alert ('No Record Found, Unregistered Email')</script>";
          header("location:index.php");
        }
      } else {
        echo "<script>alert ('mysqli_query Error')</script>";
        header("location:index.php");
      }
    }
  }
}


if (isset($_POST['vendorsubmit'])) {
  $vendorname = $_POST['vendorname'];
  $vendorphone = $_POST['vendorphone'];
  $vendoremail = $_POST['vendoremail'];
  $vendoraddress = $_POST['vendoraddress'];
  $image = $_FILES['image']['name'];
  $vendorpassword = $_POST['vendorpassword'];
  if ($vendorname != "" && $vendorname != null || $vendorphone != "" && $vendorphone != null || $vendoremail != "" && $vendoremail != null || $vendoraddress != "" && $vendoraddress != null || $image != "" && $image != null || $vendorpassword != "" && $vendorpassword != null) {
    $query = "INSERT INTO `tbl_user`(`name`,`phone`,`email`,`address`,`image`,`role`,`password`,`status`) VALUES ('$vendorname','$vendorphone','$vendoremail','$vendoraddress','$image','2','$vendorpassword','Suspend')";
    move_uploaded_file($_FILES['image']['tmp_name'], "backassets/images/vendors/" . $_FILES['image']['name']);
    $insertquery = mysqli_query($con, $query);
    echo mysqli_error($con);
    if ($insertquery) {
      require 'PHPMailer/src/Exception.php';
      require 'PHPMailer/src/PHPMailer.php';
      require 'PHPMailer/src/SMTP.php';


      // Instantiation and passing `true` enables exceptions
      $mail = new PHPMailer(true);

      try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'stevejason360@gmail.com';                     // SMTP username
        $mail->Password   = 'honeysteve123';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('stevejason360@gmail.com', 'Steve');
        $mail->addAddress($vendoremail);               // Name is optional
        $mail->addReplyTo('stevejason360@gmail.com', 'Information');




        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'Congratulations you have been registered successfully Please wait for admin approval!!';

        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

        $_SESSION["uu"] = "sss";
        header("location: index.php");
      } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
    }
  } else {
    echo "<script>alert ('please insert correct information')</script>";
  }
}

// header("Location:login.php");
?>