<?php
$pagename = 'Contact us';
include_once "header.php";
?>
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section background_bg overlay_bg_50 page_title_light" data-img-src="assets/images/contact_bg.jpg">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title">
            		<h1>Contact</h1>
                </div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Contact</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START CONTACT -->
<div class="section pb_70">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
            	<div class="contact_wrap contact_style1">
                    <div class="contact_icon">
                        <i class="ti-location-pin"></i>
                    </div>
                    <div class="contact_text">
                        <span>Address</span>
                        <p>123 Street, Old Trafford, London, UK</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
            	<div class="contact_wrap contact_style1">
                    <div class="contact_icon">
                        <i class="ti-mobile"></i>
                    </div>
                    <div class="contact_text">
                        <span>Phone</span>
                        <p>+ 457 789 789 65</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
            	<div class="contact_wrap contact_style1">
                    <div class="contact_icon">
                        <i class="ti-email"></i>
                    </div>
                    <div class="contact_text">
                        <span>Email Address</span>
                        <a href="mailto:info@sitename.com">info@yourmail.com</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTACT -->

<!-- START CONTACT -->
<div class="section">
    <div class="container">
    	<div class="row justify-content-center">
        	<div class="col-lg-6 col-md-9">
            	<div class="heading_s1 text-center">
                	<h2>Get In touch</h2>
                </div>
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
            	<div class="field_form">
                    <form >
                        <div class="row">
                            <div class="form-group col-md-6">
                            	<label>Name<span class="required">*</span></label>
                                <input required="" placeholder="Enter Name" id="first-name" class="form-control" name="name" type="text">
                             </div>
                            <div class="form-group col-md-6">
                            	<label>Email<span class="required">*</span></label>
                                <input required="" placeholder="Enter Email" id="email" class="form-control" name="email" type="email">
                            </div>
                            <div class="form-group col-md-6">
                            	<label>Phone<span class="required">*</span></label>
                                <input required="" placeholder="Enter Phone No" id="phone" class="form-control" name="phone" type="text">
                            </div>
                            <div class="form-group col-md-6">
                            	<label>Subject</label>
                                <input placeholder="Enter Subject" id="subject" class="form-control" name="subject" type="text">
                            </div>
                            <div class="form-group col-md-12">
                            	<label>Message<span class="required">*</span></label>
                                <textarea required="" placeholder="Enter Message" id="description" class="form-control" name="message" rows="4"></textarea>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" title="Submit Your Message!" class="btn btn-default"  name="submit" value="Submit">Send Message</button>
                            </div>
                            
                        </div>
                    </form>		
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTACT -->

<?php
include_once "footer.php";

?>