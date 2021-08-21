<?php
$pagename = 'Login';
include_once "header.php";
?>
<!-- END HEADER -->

<!-- LOGIN WITH GOOGLE START -->
<?php
include('LoginWithGoogle.php');

    if(!isset($_SESSION['cart'])){
        $login_button = '<a href="' . $google_client->createAuthUrl() . '" class="sc_google"><i class="ion-social-googleplus"></i></a>';
    }
?>
<!-- LOGIN WITH GOOGLE END -->

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section background_bg overlay_bg_50 page_title_light" data-img-src="assets/images/login_bg.jpg">
    <div class="container">
        <!-- STRART CONTAINER -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title">
                    <h1>Login</h1>
                </div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Login</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START SECTION LOGIN -->
<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="lr_form box_shadow1 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                    <div class="heading_s1 text-center pb-md-3">
                        <h2>Login to Your Account</h2>
                    </div>
                    <form action="auth_saveinfo.php" method="post" class="form_style1">
                        <div class="form-group">
                            <input type="email" required="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class=" form-group">
                            <input type="password" class="form-control " required="password" name="password" Placeholder="Password">
                        </div>
                        <div class="login_footer form-group">
                            <a href="#" data-toggle="modal" data-target="#forgotpassword" id="forgotpass">Forgot password?</a>
                            <div class="chek-form">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="">
                                    <label class="form-check-label" for="exampleCheckbox3">Remember me</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default btn-block" name="submit">Login</button>
                        </div>
                    </form>
                    <div class="different_login">
                        <h5>OR Sign-Up with Social Network</h5>
                        <ul class="list_none text-center social_icons radius_social">
                            <li><a href="#" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                            <li><?= $login_button; ?></li>
                            <li><a href="#" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                    <div class="form-note text-center">Don't have an account? <a href="register.php" class="text_default">Sign Up</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="forgotpassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-weight-bold">Forgot password</h5>

                <button type="button" class="close" data-dismiss="modal" id="fog" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="forgotpassword.php">
                <div class="modal-body mx-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-2">
                                <label style="font-size: 12px;" data-error="wrong" data-success="right" for="form29">Your email</label>
                                <input type="email" class="form-control" name="email" style="font-size: 16px;" required>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4 my-3">
                        <button type="submit" class="btn btn-danger btn-block" style=" font-size: 15px;background-color: #0b2963;" name="submit">submit</button>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
<!-- END SECTION LOGIN -->

<!-- START FOOTER -->
<?php
include_once "footer.php";
?>

<?php
if (isset($_SESSION["logw"])) {
?>
    <script>
        swal({
            title: "Wrong!",
            text: "Please Insert Correct Email and Password!",
            icon: "warning",
            button: "ok!",
        });
    </script>
<?php
}
unset($_SESSION["logw"]);
?>
<?php
if (isset($_SESSION["verification_required"])) {
?>
    <script>
        swal({
            title: "Verification!",
            text: "Please Verify Your Account Then Login Again !",
            icon: "warning",
            button: "ok!",
        });
    </script>
<?php
}
unset($_SESSION["verification_required"]);
?>