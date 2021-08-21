<?php
$pagename = 'BLOG';
include_once "header.php";

?>
<style>
        /* [1] The container */
.post-thumb {
  /*height: 300px;  [1.1] Set it as per your need */
  overflow: hidden; /* [1.2] Hide the overflowing of child elements */
}

/* [2] Transition property for smooth transformation of images */
.post-thumb img {
  transition: transform .5s ease;
}

/* [3] Finally, transforming the image when container gets hovered */
.post-thumb:hover img {
  transform: scale(1.5);
}
.tl-1 {
    width: 80px;
    height: 1px;
    display: inline-block;
    background: #eee;
}
.tl-2 {
    display: inline-block;
    height: 12px;
    margin: 0 5px;
    position: relative;
    top: 5px;
    width: 12px;
    border: 1px solid #ebc131;
    border-radius: 50px;
}
.tl-3 {
    width: 80px;
    height: 1px;
    display: inline-block;
    background: #eee;
}
.spe-title h2 span {
    color: #f4364f;
    font-size: 44px;
    font-weight: 600;
    font-family: 'Quicksand', sans-serif;
}
    </style>
<style>
  
</style>
<!-- END HEADER -->


<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section background_bg overlay_bg_50 page_title_light" data-img-src="assets/images/about_bg.jpg">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row">
            <div class="col-md-12">
                <div class="page-title">
            		<h2>BLOGS</h2>
                </div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">BLOGS</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>




<br><br>

<section>
		<div class="rows inn-page-bg com-colo" >
			<div class="container inn-page-con-bg tb-space pad-bot-redu-5" id="inner-page-title">
				<!-- TITLE & DESCRIPTION -->
                <center>	<div class="spe-title col-md-12">
					<h2> <span>Blog</span> </h2>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					<p>Browse our blog to find ideas and inpiration for  your upcoming surfing trips.</p>
				</div></center>
				<!--===== POSTS ======-->
			<style>
			 h3
			{
				padding-top: 17px;
    text-align: center;
	color:#7e7f80 !important;
			}
			h3:hover
			{
			
	color:black !important;
			}
			.add
			{
				box-shadow: 8px 8px 14px lightgrey;
    border: 1px solid #d3d3d338;
			}
			.list-group-item:first-child{
			    border-top-left-radius: 0px !important;
              border-top-right-radius: 0px !important;
			}
			 
			 
			</style>
				<div class="rows">

					
						
						    
						    <div id="results">  <style>
        /* [1] The container */
.post-thumb {
  /*height: 300px;  [1.1] Set it as per your need */
  overflow: hidden; /* [1.2] Hide the overflowing of child elements */
}

/* [2] Transition property for smooth transformation of images */
.post-thumb img {
  transition: transform .5s ease;
}

/* [3] Finally, transforming the image when container gets hovered */
.post-thumb:hover img {
  transform: scale(1.5);
}
    </style>
<div class="row">
  <?php
  $q = mysqli_query($con,"SELECT * FROM `tbl_blog`");
  $row = mysqli_fetch_assoc($q);
  ?>
		<div class="col-md-8 col-sm-12 col-xs-12 " style="margin-top: 40px;">
		
		<div class="col-md-12 col-sm-12 col-xs-12 add">
        <article class="blog-post-item">
            <div class="post-thumb">
                <img src="assets/images/about_bg.jpg " alt="" style="width: 100%;margin-top: 15px;height: 400px;" class="img-fluid">
            </div>
            <div class="post-item mt-4">
                <div class="post-meta">
                    <span class="post-author">Uploaded by <a href="javascript:void(0);">Admin</a></span> | 
                    <span class="post-date"><i class="fa fa-calendar-alt mr-2"></i>March 31, 2021</span>
                </div>
                <h4 class="post-title"><a href="javascript:void(0)" style="font-size: 30px;color: #f4364f;font-weight: 600;"><?php echo $row['blog_name']?></a></h4>
            
                <div class="card-text">
                    <p style="color: #747373;font-weight: 400;letter-spacing: 1px;"><?php echo $row['blog_desc']?></p>
        
                  
                </div>
            </div>
        </article>
        </div>
      
        </div>
        <div class="col-md-1 col-sm-12 col-xs-12 " style="margin-top: 40px;">

        </div>
    
        <div class="col-md-3 col-sm-12 col-xs-12 " style="margin-top: 40px;">
        <?php
  $q = mysqli_query($con,"SELECT * FROM `tbl_blog` limit 3");
  while($row = mysqli_fetch_assoc($q)){
  ?>
        <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="admin/backassets/images/blog/<?php echo $row['blog_image']?>" alt="Card image cap">
  <div class="card-body">
  <h4 class="post-title"><?php echo $row['blog_name']?></h4>
    <p class="card-text"><?php echo $row['blog_desc']?></p>
  </div>
</div>
<br>
<?php
}
?>
        </div>


        </div>
	


					

						 
				<!--===== POST END ======-->
			</div>
		</div>
	</div></section>
    <br><br>

    <section>
		<div class="rows inn-page-bg com-colo">
			<div class="container inn-page-con-bg tb-space pad-bot-redu-5" id="inner-page-title">
				<!-- TITLE & DESCRIPTION -->
				<center><div class="spe-title col-md-12">
					<h2> <span>Blog</span> </h2>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
				</div></center>
				<!--===== POSTS ======-->
                <br><br>

				<div class="row">

					
						<div class="col-md-6 col-sm-12 col-xs-12"> 
						<div class="spe-title">
					
						<h2 style="font-size:25px !important;"> <span style="font-size:25px !important;"> OUR MISSION:</span> Connect surfers worldwide</h2>
						<p>Do you feel it too? The sudden urge to catch some waves? If you know what I mean you’re at the right place. Because we connect <span style="font-size: 18px !important; color:#3778e0;"> YOU</span> with the <span style="font-size: 18px !important; color:#3778e0;">RIGHT PEOPLE </span> and the <span style="font-size: 18px !important; color:#3778e0;">OCEAN</span> to make sure you get to the nicest surf spots asap. It’s big, but simple. Worldwide, but so close. It’s the ocean. And us. – Wavebus. </p>
						<br>
						<br>
						<a href="faq.php" class="btn btn-default" style="font-size: 12px;">FAQs</a>
						<a href="register.php" class="btn btn-default " style="font-size: 12px;">Register</a>
						 </div>
						 </div>
						 <style>
					

.icoe
{
    opacity:0;
    animation: anima 1s ease infinite;
}
@keyframes anima{
    to{
        opacity:1;
        top:0.1rem;
    }
}
						 </style>
						 <div class="col-md-1 "></div>
						 <div class="col-md-4 col-sm-12 col-xs-12 add">
						      
						  <img src="assets/images/about_img5.jpg" style="margin-top: 3%;margin-bottom: 3%;">
	

                        <div class="inner-box wow  animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible;-webkit-animation-duration: 1500ms; -moz-animation-duration: 1500ms; animation-duration: 1500ms;-webkit-animation-delay: 0ms; -moz-animation-delay: 0ms; animation-delay: 0ms;">
						<div class="image" style="border-radius: 8px;">
						<a data-fancybox="gallery" href="images/newsight/wavebus.mp4">
						    </a>
                            <!-- <center><a data-fancybox="gallery" href="images/newsight/wavebus.mp4">
						    <i class="fa fa-play icoe" aria-hidden="true" style="position: relative;padding-top: 19%;font-size: 70px;color: white;margin-bottom: 14%;"></i></a>
						
						</center> -->
						</div>
						
					</div>
						
						 </div>

						 			
				<!--===== POST END ======-->
			</div>
		</div>
	</div></section>
		
<!-- END SECTION BREADCRUMB -->


<br>
<br>


<?php
include_once "footer.php";

?>