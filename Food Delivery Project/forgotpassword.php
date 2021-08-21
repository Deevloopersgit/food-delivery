<?php
include_once ("database/connect.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit'])){
	$email = $_POST['email'];
    $sql="SELECT * FROM tbl_user WHERE email = '$email' ";
    $result= mysqli_query($con, $sql);
    $res = mysqli_fetch_array($result);
	$row= mysqli_num_rows($result);
    if($row >0){
       






if(isset($_POST['submit']) && isset($_POST["email"])){
    $email=$_POST['email'];
 



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
    $mail->Username   = 'syedraiyyanali456@gmail.com';                     // SMTP username
    $mail->Password   = 'raiyyanali123@gmail.com';                               // SMTP password
    $mail->SMTPSecure ='tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('syedraiyyanali456@gmail.com', 'raiyyan');
    $mail->addAddress($email);               // Name is optional
    $mail->addReplyTo('syedraiyyanali456@gmail.com', 'Information');

    
    
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b> http://mysite-php.com/food/forgotpassword1.php?id='.$res['id'];
 
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $_SESSION['success'] = 'success';
    header('Location:index.php');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}

}else{
    $email = $_POST['email'];
    $sql="SELECT * FROM tbl_vendor WHERE email = '$email' ";
    $result= mysqli_query($con, $sql);
    $res = mysqli_fetch_array($result);
	$row= mysqli_num_rows($result);

    if(isset($_POST['submit']) && isset($_POST["email"])){
        $email=$_POST['email'];
     
    
    
    
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
        $mail->SMTPSecure ='tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('stevejason360@gmail.com', 'Steve');
        $mail->addAddress('stevejason360@gmail.com');               // Name is optional
        $mail->addReplyTo('stevejason360@gmail.com', 'Information');
    
        
        
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b> http://mysite-php.com/food/forgotpassword2.php?id='.$res['id'];
     
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        $_SESSION['success'] = 'success';
        header('Location:index.php');
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    }
}

}

header('Location:login.php');


?> 