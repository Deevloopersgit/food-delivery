<?php
$pagename = 'Gmail-Register';
include("header.php");
?>
<!-- END HEADER -->

<!-- LOGIN WITH GOOGLE CODE GENTRATING START  -->
<?php
include('LoginWithGoogle.php');

if (isset($_GET["code"])) {

    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    if (!isset($token['error'])) {

        $google_client->setAccessToken($token['access_token']);

        $_SESSION['cart'] = $token['access_token'];

        $google_service = new Google_Service_Oauth2($google_client);

        $data = $google_service->userinfo->get();

        if (!empty($data['given_name'])) {
            $_SESSION['user_first_name'] = $data['given_name'];
        }

        if (!empty($data['email'])) {
            $_SESSION['user_email_address'] = $data['email'];
        }

        if (!empty($data['picture'])) {
            $_SESSION['user_image'] = $data['picture'];
        }
    }
}
?>
<!-- LOGIN WITH GOOGLE CODE GENRATING END -->

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section background_bg overlay_bg_50 page_title_light" data-img-src="assets/images/login_bg.jpg">
    <div class="container">
        <!-- STRART CONTAINER -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title">
                    <h1>Register</h1>
                </div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Register</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END CONTAINER-->
</div>
<br>
<!-- END SECTION BREADCRUMB -->
<!-- START SECTION LOGIN -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="lr_form box_shadow1 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                <div class="heading_s1 text-center pb-md-3">
                    <h2>Fill All Remaining Details</h2>
                </div>
                <form action="registerwithgmail.php" method="post" class="form_style1" enctype="multipart/form-data">
                    <div class="form-group">
                        <img style="border-radius: 50%;" src="<?= $_SESSION['user_image'] ?>" alt="image" height="100px" width="100px">
                    </div>
                    <div class="form-group">
                        <input type="text" required="" class="form-control" name="name" placeholder="First Name" value="<?= $_SESSION['user_first_name'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <input type="email" required="" class="form-control" name="email" placeholder="Email" value="<?= $_SESSION['user_email_address'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <input class="form-control" required="" type="password" name="password" Placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input class="form-control" required="" type="text" name="address" Placeholder="Address">
                    </div>
                    <div class="form-group">
                        <input class="form-control" required="" type="number" name="phone" Placeholder="Phone number">
                    </div>
                    <div class="login_footer form-group">
                        <div class="chek-form">
                            <div class="custome-checkbox">
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="">
                                <label class="form-check-label" for="exampleCheckbox3">I accept the <a href="#" class="text_default">Terms of use</a> &amp; <a href="#" class="text_default">Privacy Policy.</a></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default btn-block" name="RegisterMe">Create Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION LOGIN -->
<!-- START FOOTER -->
<?php
include_once "footer.php";
?>