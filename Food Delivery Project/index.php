<?php
$pagename = 'Home';
include_once "header.php";
?>

<style>
    .pricing-table {
        display: flex;
        flex-flow: row wrap;
        width: 100%;
        max-width: 1100px;
        margin: 0 auto;
        background: #ffffff;
    }

    .pricing-table .ptable-item {
        width: 33.33%;
        padding: 0 15px;
        margin-bottom: 30px;
    }

    @media (max-width: 992px) {
        .pricing-table .ptable-item {
            width: 33.33%;
        }
    }

    @media (max-width: 768px) {
        .pricing-table .ptable-item {
            width: 50%;
        }
    }

    @media (max-width: 576px) {
        .pricing-table .ptable-item {
            width: 100%;
        }
    }

    .pricing-table .ptable-single {
        position: relative;
        width: 100%;
        overflow: hidden;
    }

    .pricing-table .ptable-header,
    .pricing-table .ptable-body,
    .pricing-table .ptable-footer {
        position: relative;
        width: 100%;
        text-align: center;
        overflow: hidden;
    }

    .pricing-table .ptable-status,
    .pricing-table .ptable-title,
    .pricing-table .ptable-price,
    .pricing-table .ptable-description,
    .pricing-table {
        position: relative;
        width: 100%;
        text-align: center;
    }

    .pricing-table .ptable-single {
        background: #f6f8fa;
    }

    .pricing-table .ptable-single:hover {
        box-shadow: 0 0 10px #999999;
    }

    .pricing-table .ptable-header {
        margin: 0 30px;
        padding: 30px 0 45px 0;
        width: auto;
        background: #FF324D;
        ;
    }

    .pricing-table .ptable-header::before,
    .pricing-table .ptable-header::after {
        content: "";
        position: absolute;
        bottom: 0;
        width: 0;
        height: 0;
        border-bottom: 100px solid #f6f8fa;
    }

    .pricing-table .ptable-header::before {
        right: 50%;
        border-right: 250px solid transparent;
    }

    .pricing-table .ptable-header::after {
        left: 50%;
        border-left: 250px solid transparent;
    }

    .pricing-table .ptable-item.featured-item .ptable-header {
        background: #FF6F61;
    }

    .pricing-table .ptable-status {
        margin-top: -30px;
    }

    .pricing-table .ptable-status span {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 30px;
        padding: 5px 0;
        text-align: center;
        color: #FF6F61;
        font-size: 14px;
        font-weight: 300;
        letter-spacing: 1px;
        background: #2A293E;
    }

    .pricing-table .ptable-status span::before,
    .pricing-table .ptable-status span::after {
        content: "";
        position: absolute;
        bottom: 0;
        width: 0;
        height: 0;
        border-bottom: 10px solid #FF6F61;
    }

    .pricing-table .ptable-status span::before {
        right: 50%;
        border-right: 25px solid transparent;
    }

    .pricing-table .ptable-status span::after {
        left: 50%;
        border-left: 25px solid transparent;
    }

    .pricing-table .ptable-title h2 {
        color: #ffffff;
        font-size: 24px;
        font-weight: 300;
        letter-spacing: 2px;
    }

    .pricing-table .ptable-price h2 {
        margin: 0;
        color: #ffffff;
        font-size: 45px;
        font-weight: 700;
        margin-left: 15px;
    }

    .pricing-table .ptable-price h2 small {
        position: absolute;
        font-size: 18px;
        font-weight: 300;
        margin-top: 16px;
        margin-left: -15px;
    }

    .pricing-table .ptable-price h2 span {
        margin-left: 3px;
        font-size: 16px;
        font-weight: 300;
    }

    .pricing-table .ptable-body {
        padding: 20px 0;
    }

    .pricing-table .ptable-description ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .pricing-table .ptable-description ul li {
        color: #2A293E;
        font-size: 14px;
        font-weight: 300;
        letter-spacing: 1px;
        padding: 7px;
        border-bottom: 1px solid #dedede;
    }

    .pricing-table .ptable-description ul li:last-child {
        border: none;
    }

    .pricing-table .ptable-footer {
        padding-bottom: 30px;
    }

    .pricing-table a {
        display: inline-block;
        padding: 10px 20px;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 2px;
        text-decoration: none;
    }
</style>
<!-- START SECTION BANNER -->
<div class="banner_section staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade carousel_style1 light_arrow" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active background_bg overlay_bg_60" data-img-src="assets/images/banner1.jpg">
                <div class="banner_slide_content">
                    <div class="container">
                        <!-- STRART CONTAINER -->
                        <div class="row justify-content-center">
                            <div class="col-lg-7 col-md-12 col-sm-12 text-center">
                                <div class="banner_content text_white">
                                    <h2 class="staggered-animation font_style1" data-animation="fadeInUp" data-animation-delay="0.2s">Delicious food</h2>
                                    <p class="staggered-animation" data-animation="fadeInUp" data-animation-delay="0.4s">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                                    <a class="btn btn-default btn-radius staggered-animation" href="#" data-animation="fadeInUp" data-animation-delay="0.6s">Get Started</a>
                                    <a class="btn btn-white btn-radius staggered-animation" href="#" data-animation="fadeInUp" data-animation-delay="0.6s">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- END CONTAINER-->
                </div>
            </div>
            <div class="carousel-item background_bg overlay_bg_60" data-img-src="assets/images/banner2.jpg">
                <div class="banner_slide_content">
                    <div class="container">
                        <!-- STRART CONTAINER -->
                        <div class="row justify-content-center">
                            <div class="col-lg-7 col-md-12 col-sm-12 text-center">
                                <div class="banner_content text_white">
                                    <h2 class="staggered-animation font_style1" data-animation="fadeInUp" data-animation-delay="0.2s">Choose & enjoy</h2>
                                    <p class="staggered-animation" data-animation="fadeInUp" data-animation-delay="0.4s">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                                    <a class="btn btn-default btn-radius staggered-animation" href="#" data-animation="fadeInUp" data-animation-delay="0.6s">Get Started</a>
                                    <a class="btn btn-white btn-radius staggered-animation" href="#" data-animation="fadeInUp" data-animation-delay="0.6s">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- END CONTAINER-->
                </div>
            </div>
            <div class="carousel-item background_bg overlay_bg_60" data-img-src="assets/images/banner3.jpg">
                <div class="banner_slide_content">
                    <div class="container">
                        <!-- STRART CONTAINER -->
                        <div class="row justify-content-center">
                            <div class="col-lg-7 col-md-12 col-sm-12 text-center">
                                <div class="banner_content text_white">
                                    <h2 class="staggered-animation font_style1" data-animation="fadeInUp" data-animation-delay="0.2s">Feel Better Food</h2>
                                    <p class="staggered-animation" data-animation="fadeInUp" data-animation-delay="0.4s">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                                    <a class="btn btn-default btn-radius staggered-animation" href="#" data-animation="fadeInUp" data-animation-delay="0.6s">Get Started</a>
                                    <a class="btn btn-white btn-radius staggered-animation" href="#" data-animation="fadeInUp" data-animation-delay="0.6s">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- END CONTAINER-->
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"><i class="ion-chevron-left"></i></a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"><i class="ion-chevron-right"></i></a>
    </div>
</div>
<!-- END SECTION BANNER -->

<!-- START SECTION ABOUT -->
<div class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                <div class="about_img">
                    <img src="assets/images/about_img1.jpg" alt="about_img1" />
                </div>
            </div>
            <div class="col-lg-7 animation" data-animation="fadeInUp" data-animation-delay="0.03s">
                <div class="about_section pl-lg-3">
                    <div class="heading_s1">
                        <span class="sub_heading font_style1">About Us</span>
                        <h2>Welcome to our restaurant</h2>
                    </div>
                    <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. consequuntur quibusdam enim expedita sed nesciunt incidunt accusamus adipisci officia libero laboriosam!</p>
                    <a class="btn btn-dark btn-radius" href="#">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION ABOUT -->

<!-- START SECTION OUR MENU -->
<div class="section bg_linen">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="heading_s1 text-center animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                    <div class="sub_heading font_style1">Special Food</div>
                    <h2>from Our Menu</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for=""></label>
                    <select class="form-control" name="cat" id="cat">
                        <option>Select</option>
                        <?php
                        $q = "SELECT * FROM `tbl_categories`";
                        $query = mysqli_query($con, $q);
                        while ($row = mysqli_fetch_array($query)) {

                        ?>
                            <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for=""></label>
                    <select class="form-control" name="subcat" id="subcat">
                        <option>select</option>
                    </select>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="small_divider clearfix"></div>
                <ul class="menu_list animation" data-animation="fadeInUp" data-animation-delay="0.03s">
                    <li>

                        <div class="single_menu_product" id="menu">

                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center pt-sm-3">
                <a href="#" class="btn btn-default btn-radius">View All</a>
            </div>
        </div>
    </div>
</div>
<!-- START SECTION OUR MENU -->

<!-- START SECTION MOBILE APP -->
<!-- <div class="section">
	<div class="container">
    	<div class="row align-items-center">
        	<div class="col-md-7 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                <div class="heading_s1">
                    <span class="sub_heading font_style1">Put in Your Pocket</span>
                    <h2>Download Our Mobile App</h2>
                </div>
                <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. consequuntur quibusdam enim expedita sed nesciunt incidunt accusamus adipisci officia libero laboriosam!</p>
                <a class="btn btn-dark btn-radius" href="#"><i class="ion-social-apple"></i>App Store</a>
                <a class="btn btn-default btn-radius" href="#"><i class="ion-social-android"></i>Play Store</a>
            </div>
            <div class="col-md-5 animation" data-animation="fadeInUp" data-animation-delay="0.03s">	
                <div class="mobile_app text-center">
                    <img src="assets/images/mobile_app.png" alt="mobile_app" />
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- END SECTION MOBILE APP -->

<!-- START SECTION BOOK TABLE -->
<!-- <div class="section background_bg overlay_bg_70" data-img-src="assets/images/book_table_bg.jpg">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-12 animation" data-animation="fadeInUp" data-animation-delay="0.2s">
            	<div class="book_table">
                    <div class="heading_s1 heading_light mb-md-0">
                    	<span class="sub_heading font_style1">Reservations</span>
                        <h2>Book A Table</h2>
                    </div>
                    <div class="small_divider clearfix"></div>
                    <div class="field_form form_style2 rounded_input">
                    	<form method="post" name="enq">
                            <div class="row">
                                <div class="form-group col-lg-4 col-sm-6">
                                    <div class="input_group">
                                        <input required="required" placeholder="Name" class="form-control" name="name" type="text">
                                        <div class="input_icon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                 </div>
                                <div class="form-group col-lg-4 col-sm-6">
                                    <div class="input_group">
                                        <input required="required" placeholder="Email Address" class="form-control" name="email" type="email">
                                        <div class="input_icon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-lg-4 col-sm-6">
                                    <div class="input_group">
                                        <input placeholder="Time" class="form-control timepicker" data-theme="red" name="date" type="text">
                                        <div class="input_icon">
                                            <i class="far fa-clock"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-lg-4 col-sm-6">
                                    <div class="input_group">
                                        <input required="required" placeholder="Mobile No." class="form-control" name="phone" type="tel">
                                        <div class="input_icon">
                                            <i class="fa fa-mobile-alt"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-lg-4 col-sm-6">
                                    <div class="input_group">
                                        <input placeholder="Select Date" class="form-control datepicker" name="date" type="text">
                                        <div class="input_icon">
                                            <i class="far fa-calendar-alt"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-lg-4 col-sm-6">
                                    <div class="custom_select">
                                        <select class="form-control">
                                            <option value="">Select Person</option>
                                            <option value="1">1 Person</option>
                                            <option value="2">2 Person</option>
                                            <option value="3">3 Person</option>
                                            <option value="4">4 Person</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" title="Submit Your Message!" class="btn btn-white btn-radius" name="submit" value="Submit">book now</button>
                                </div>
                            </div>
                    	</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- END SECTION BOOK TABLE -->

<!-- START SECTION TEAM -->
<!-- <div class="section pb_70">
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-lg-6 col-md-8 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
            	<div class="heading_s1 text-center">
                	<span class="sub_heading font_style1">Awesome Chef</span>
                	<h2>Our Team Members</h2>
                </div>
                <p class="text-center leads">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
            </div>
        </div>
        <div class="row justify-content-center">
        	<div class="col-lg-3 col-sm-6 animation" data-animation="fadeInUp" data-animation-delay="0.03s">
            	<div class="team_box team_style1 radius_all_10">
                	<div class="team_img">
                    	<img src="assets/images/team_img1.jpg" alt="team_img1">
                        <ul class="social_icons social_white">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                    <div class="team_content">
                        <div class="team_title">
                            <h4>Anders Stone</h4>
                            <span>The Chef</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 animation" data-animation="fadeInUp" data-animation-delay="0.04s">
            	<div class="team_box team_style1 radius_all_10">
                	<div class="team_img">
                    	<img src="assets/images/team_img2.jpg" alt="team_img2">
                        <ul class="social_icons social_white">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                    <div class="team_content">
                        <div class="team_title">
                            <h4>Laura Martin</h4>
                            <span>The Chef</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 animation" data-animation="fadeInUp" data-animation-delay="0.05s">
            	<div class="team_box team_style1 radius_all_10">
                	<div class="team_img">
                    	<img src="assets/images/team_img3.jpg" alt="team_img3">
                        <ul class="social_icons social_white">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                    <div class="team_content">
                        <div class="team_title">
                            <h4>Adam Smith</h4>
                            <span>The Chef</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 animation" data-animation="fadeInUp" data-animation-delay="0.06s">
            	<div class="team_box team_style1 radius_all_10">
                	<div class="team_img">
                    	<img src="assets/images/team_img4.jpg" alt="team_img4">
                        <ul class="social_icons social_white">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                    <div class="team_content">
                        <div class="team_title">
                            <h4>Bruce Flores</h4>
                            <span>The Chef</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- END SECTION TEAM -->

<!-- START SECTION TESTIMONIAL -->
<div class="section parallax_bg overlay_bg_70" data-parallax-bg-image="assets/images/testimonial_bg.jpg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                <div class="heading_s1 heading_light text-center">
                    <span class="sub_heading font_style1">Deevloopers</span>
                    <h2>Our Client Say!</h2>
                </div>
                <p class="text-center leads text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 animation" data-animation="fadeInUp" data-animation-delay="0.03s">
                <div class="testimonial_slider testimonial_style1 carousel_slider owl-carousel owl-theme nav_style1 dot_white" data-margin="30" data-loop="true" data-autoplay="true" data-responsive='{"0":{"items": "1"}, "767":{"items": "2"}, "1199":{"items": "2"}}'>
                    <div class="testimonial_box">
                        <div class="author_info">
                            <div class="author_img">
                                <img src="assets/images/user1.jpg" alt="user" />
                            </div>
                            <div class="author_name">
                                <h5>Richard Clark</h5>
                                <span>Customer</span>
                            </div>
                        </div>
                        <div class="testimonial_desc">
                            <p>Sed perspiciatis unde omnis iste natus error voluptatem laudantium, quaeillo inventore sed veritatis architecto beatae vitae dicta explicabo eiusmod tempor labore which pain can some pleasure.</p>
                        </div>
                    </div>
                    <div class="testimonial_box">
                        <div class="author_info">
                            <div class="author_img">
                                <img src="assets/images/user2.jpg" alt="user" />
                            </div>
                            <div class="author_name">
                                <h5>Daisy Lana</h5>
                                <span>Customer</span>
                            </div>
                        </div>
                        <div class="testimonial_desc">
                            <p>Sed perspiciatis unde omnis iste natus error voluptatem laudantium, quaeillo inventore sed veritatis architecto beatae vitae dicta explicabo eiusmod tempor labore which pain can some pleasure.</p>
                        </div>
                    </div>
                    <div class="testimonial_box">
                        <div class="author_info">
                            <div class="author_img">
                                <img src="assets/images/user3.jpg" alt="user" />
                            </div>
                            <div class="author_name">
                                <h5>Alden Smith</h5>
                                <span>Customer</span>
                            </div>
                        </div>
                        <div class="testimonial_desc">
                            <p>Sed perspiciatis unde omnis iste natus error voluptatem laudantium, quaeillo inventore sed veritatis architecto beatae vitae dicta explicabo eiusmod tempor labore which pain can some pleasure.</p>
                        </div>
                    </div>
                    <div class="testimonial_box">
                        <div class="author_info">
                            <div class="author_img">
                                <img src="assets/images/user4.jpg" alt="user" />
                            </div>
                            <div class="author_name">
                                <h5>John Becker</h5>
                                <span>Customer</span>
                            </div>
                        </div>
                        <div class="testimonial_desc">
                            <p>Sed perspiciatis unde omnis iste natus error voluptatem laudantium, quaeillo inventore sed veritatis architecto beatae vitae dicta explicabo eiusmod tempor labore which pain can some pleasure.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION TESTIMONIAL -->

<!-- START SECTION BLOG -->
<div class="section pb_70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                <div class="heading_s1 text-center">
                    <span class="sub_heading font_style1">From The Blog</span>
                    <h2>Our Latest News</h2>
                </div>
                <p class="text-center leads">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 animation" data-animation="fadeInUp" data-animation-delay="0.03s">
                <div class="blog_post blog_style1 box_shadow1">
                    <div class="blog_img">
                        <a href="#">
                            <img src="assets/images/blog_small_img1.jpg" alt="blog_small_img1">
                        </a>
                        <span class="post_date radius_all_10"><strong>02</strong> May</span>
                    </div>
                    <div class="blog_content">
                        <div class="blog_text">
                            <ul class="list_none blog_meta">
                                <li><a href="#"><i class="linearicons-user"></i> By Admin</a></li>
                                <li><a href="#"><i class="linearicons-bubbles"></i> 2 Comment</a></li>
                            </ul>
                            <h5 class="blog_title"><a href="#">The Sanford Stadium project consists of three main areas</a></h5>
                            <p>Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this generator on the Internet.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                <div class="blog_post blog_style1 box_shadow1">
                    <div class="blog_img">
                        <a href="#">
                            <img src="assets/images/blog_small_img2.jpg" alt="blog_small_img2">
                        </a>
                        <span class="post_date radius_all_10"><strong>02</strong> May</span>
                    </div>
                    <div class="blog_content">
                        <div class="blog_text">
                            <ul class="list_none blog_meta">
                                <li><a href="#"><i class="linearicons-user"></i> By Admin</a></li>
                                <li><a href="#"><i class="linearicons-bubbles"></i> 2 Comment</a></li>
                            </ul>
                            <h5 class="blog_title"><a href="#">On the other hand we provide Inhence with righteous Career</a></h5>
                            <p>Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this generator on the Internet.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 animation" data-animation="fadeInUp" data-animation-delay="0.05s">
                <div class="blog_post blog_style1 box_shadow1">
                    <div class="blog_img">
                        <a href="#">
                            <img src="assets/images/blog_small_img3.jpg" alt="blog_small_img3">
                        </a>
                        <span class="post_date radius_all_10"><strong>02</strong> May</span>
                    </div>
                    <div class="blog_content">
                        <div class="blog_text">
                            <ul class="list_none blog_meta">
                                <li><a href="#"><i class="linearicons-user"></i> By Admin</a></li>
                                <li><a href="#"><i class="linearicons-bubbles"></i> 2 Comment</a></li>
                            </ul>
                            <h5 class="blog_title"><a href="#">A cheap and flexible solution for the starter package </a></h5>
                            <p>Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this generator on the Internet.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION BLOG -->
<br>
<!-- subscription card -->

<br>


<!-- subscription card end -->


<!-- db -->
<div class="pricing-table">
    <?php
    $q = mysqli_query($con, "SELECT * FROM package ");
    while ($row = mysqli_fetch_assoc($q)) {
    ?>
        <div class="ptable-item">
            <div class="ptable-single" style="border-radius: 8px;">
                <div class="ptable-header">
                    <div class="ptable-title">
                        <h2><?php echo $row['name'] ?></h2>
                    </div>
                    <div class="ptable-price">
                        <h2><small>&#8358</small><?php echo $row['price'] ?><span>/<?php echo $row['duration'] ?></span></h2>
                    </div>
                </div>
                <div class="ptable-body">
                    <div class="ptable-description">
                        <ul>
                            <li><?php echo $row['description'] ?></li>
                            <li></li>
                        </ul>
                    </div>
                </div>
                <div class="ptable-footer">
                    <div class="ptable-action">
                        <a href="subscriptionplan_reg.php?insertbtn=btn&pid=<?= $row["pid"] ?>" class="btn btn-default btn-radius">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
    ?>



</div>

<!-- db -->
<?php
include_once "footer.php"
?>

<?php
if (isset($_SESSION["res"])) {
?>
    <script>
        swal({
            title: "Your Account Already Registerd",
            text: "Please Login With Your Email and Password",
            icon: "error",
            button: "ok!",
        });
    </script>
<?php
}
unset($_SESSION["res"]);
?>

<?php
if (isset($_SESSION["Signup_Gmail"])) {
?>
    <script>
        swal({
            title: "Congratulations!",
            text: "Your Account Has Registered Successfully",
            icon: "success",
            button: "ok!",
        });
    </script>
<?php
}
unset($_SESSION["Signup_Gmail"]);
?>

<?php
if (isset($_SESSION["status"])) {
?>
    <script>
        swal({
            title: "We have sent you an E-mail",
            text: "Please Check & Verify It To Create An Account",
            icon: "success",
            button: "ok!",
        });
    </script>
<?php
}
unset($_SESSION["status"]);
?>

<?php
if (isset($_SESSION['verif_completed'])) {
?>
    <script>
        swal({
            title: "Congratulations! Account VERIFIED",
            text: "Please Login With Your Account",
            icon: "success",
            button: "ok!",
        });
    </script>
<?php
}
unset($_SESSION['verif_completed']);
?>

<?php
if (isset($_SESSION["uu"])) {
?>
    <script>
        swal({
            title: "Your Account As a Vendor Has Created Successfully",
            text: "Registeration Successfull",
            icon: "success",
            button: "ok!",
        });
    </script>
<?php
}
unset($_SESSION["uu"]);
?>

<?php
if (isset($_SESSION["sub"])) {
?>
    <script>
        swal({
            title: "Congratulations",
            text: "you have been successfully subscribe",
            icon: "success",
            button: "ok!",
        });
    </script>
<?php
}
unset($_SESSION["sub"]);
?>

<?php
if (isset($_SESSION["ddd"])) {
?>
    <script>
        swal({
            title: "Sorry",
            text: "you have already buyed one",
            icon: "error",
            button: "ok!",
        });
    </script>
<?php
}
unset($_SESSION["ddd"]);
?>

<?php
if (isset($_SESSION["sube"])) {
?>
    <script>
        swal({
            title: "Sorry",
            text: "Please login first",
            icon: "warning",
            button: "ok!",
        });
    </script>
<?php
}
unset($_SESSION["sube"]);
?>

<?php
if (isset($_SESSION["wel"])) {
?>
    <script>
        swal({
            title: "WELCOME!",
            text: "You are Log-in Successfully",
            icon: "success",
            button: "ok!",
        });
    </script>
<?php
}
unset($_SESSION["wel"]);
?>

<script>
    // Country dependent ajax
    $("#cat").on("change", function() {
        var subcat = $(this).val();
        if (subcat) {
            $.ajax({
                url: "cat_to_subcat.php",
                type: "POST",
                cache: false,
                data: {
                    subcat: subcat
                },
                success: function(data) {

                    $("#subcat").html(data);
                }
            });
        } else {
            $('#subcat').html('<option value="">No Record found</option>');

        }
    });
    $("#subcat").on("change", function() {
        var menu = $(this).val();
        if (menu) {
            $.ajax({
                url: "cat_to_subcat.php",
                type: "POST",
                cache: false,
                data: {
                    menu: menu
                },
                success: function(data) {
                    // alert(data)
                    $("#menu").html(data);
                }
            });
        } else {
            $('#menu').html('<p>No record found</p>');

        }
    });
</script>