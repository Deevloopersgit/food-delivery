<?php

$pagename = 'Register';
include ("header.php");
?>

<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section background_bg overlay_bg_50 page_title_light" data-img-src="assets/images/login_bg.jpg">
    <div class="container"><!-- STRART CONTAINER -->
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
    </div><!-- END CONTAINER-->
</div>
<br>
<!-- END SECTION BREADCRUMB -->
<div class="container ">
<div class="row ">
    <div class="col-md-4"></div>
    <div class="col-md-2">
    <button type="submit" id="user" class="btn btn-default btn-block " name="submit" style="width: 109px;font-size: 12px;">User</button>

    </div>
<div class="col-md-2">
<button type="submit" id="vendor" class="btn btn-default btn-block " name="submit" style="width: 109px;font-size: 12px;">Vendor</button>
<div class="col-md-4"></div>
</div>


</div>
</div>
<!-- START SECTION LOGIN -->
<div class="section" id="usershow">
	<div class="container">
    	<div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="lr_form box_shadow1 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                    <div class="heading_s1 text-center pb-md-3">
                        <h2>Register New Account</h2>
                    </div>
                    <form action="register1.php" method="post" class="form_style1" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" required="" class="form-control" name="name" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <input type="text" required="" class="form-control" name="email" placeholder="Email">
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
                        <div class="form-group">
                            <input class="form-control" required="" type="file" name="image" Placeholder="Image">
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
                            <button type="submit" class="btn btn-default btn-block" name="submit">Create Account</button>
                        </div>
                    </form>
                    <div class="different_login">
                        <h5>Or Register with social network</h5>
                        <ul class="list_none text-center social_icons radius_social">
                            <li><a href="#" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#" class="sc_google"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                    <div class="form-note text-center">Already have an account? <a href="login.php" class="text_default">Sign in</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION LOGIN -->
<div class="section" id="vendorshow" style="display: none;">
	<div class="container">
    	<div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="lr_form box_shadow1 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                    <div class="heading_s1 text-center pb-md-3">
                        <h2>Register New Account</h2>
                    </div>
                    <form action="register1.php" method="post" class="form_style1" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" required="" class="form-control" name="vendorname" placeholder="Vendor Name">
                        </div>
                        <div class="form-group">
                            <input type="text" required="" class="form-control" name="vendoremail" placeholder="Vendor Email">
                        </div>
                        <div class="form-group">
                            <input class="form-control" required="" type="password" name="vendorpassword" Placeholder="Vendor Password">
                        </div>
                        <div class="form-group">
                            <input class="form-control" required="" type="text" name="vendoraddress" Placeholder="Vendor Address">
                        </div>
                        <div class="form-group">
                            <input class="form-control" required="" type="number" name="vendorphone" Placeholder="Vendor number">
                        </div>
                        <div class="form-group">
                            <input class="form-control" required="" type="file" name="image" Placeholder="Image">
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
                            <button type="submit" class="btn btn-default btn-block" name="vendorsubmit">Create Account</button>
                        </div>
                    </form>
                    <div class="different_login">
                        <h5>Or Register with social network</h5>
                        <ul class="list_none text-center social_icons radius_social">
                            <li><a href="#" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#" class="sc_google"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                    <div class="form-note text-center">Already have an account? <a href="login.php" class="text_default">Sign in</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- START FOOTER -->
<?php
include_once "footer.php";
?>
<script>
$(document).ready(function(){
  $("#vendor").click(function(){
    $("#usershow").hide();
  });
  $("#vendor").click(function(){
    $("#vendorshow").show();
  });
  $("#user").click(function(){
    $("#vendorshow").hide();
  });
  $("#user").click(function(){
    $("#usershow").show();
  });
});
</script>