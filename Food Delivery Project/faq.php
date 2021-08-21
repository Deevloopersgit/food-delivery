<?php
$pagename = 'FAQ';
include_once "header.php";

?>
<style>
     h1{
      text-align: center;
      font-size: 3rem;
      padding-bottom: 0.25em;
      border-bottom: 1px solid silver;
      border-image: linear-gradient(to right, transparent 20%, darkslategrey, transparent 80%)30;
    }
  details{
      margin-bottom: 1rem;
      padding: 1rem;
      background: lavender;
      border-radius: 0.25rem;
    }
    summary{
		  list-style-type:'❔ ';
      font-size: 1.25rem;
      font-weight: bold;
      color: slategrey;
      cursor: pointer; 
      position: relative;
			outline: none;
    }
    summary::after{
      content: "➕";
      background: whitesmoke;
      border-radius: 0.25rem;
      padding: 0.5rem;
      position: absolute;
      right: 0.25rem;
      top: -0.5rem;
      color: whitesmoke;
    }
    details[open]{
			background: whitesmoke;
    }
	details[open] summary{
		color: dimgrey;
	}
    details[open] summary::after{
      content: "➖";
    }
/*** End specific styles ***/
    p{
      color: dimgrey;
      font-family:"Josefin Sans",sans-serif ;
      letter-spacing: 1.5;
    }


</style>
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section background_bg overlay_bg_50 page_title_light" data-img-src="assets/images/about_bg.jpg">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title">
            		<h2>FAQ</h2>
                </div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">FAQ</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START SECTION ABOUT -->
<div class="section">
	<div class="container">
    <h1>F.A.Q.</h1>
    <details>
   <summary>Question 1</summary>
   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam esse qui asperiores corrupti est architecto doloribus! Fugiat est reiciendis cum dolorem enim omnis iste, sit cupiditate, magni labore saepe velit.</p>
 </details>
 <details>
   <summary>Question 2</summary>
   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam esse qui asperiores corrupti est architecto doloribus! Fugiat est reiciendis cum dolorem enim omnis iste, sit cupiditate, magni labore saepe velit.</p>
 </details>
 <details>
   <summary>Question 3</summary>
   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam esse qui asperiores corrupti est architecto doloribus! Fugiat est reiciendis cum dolorem enim omnis iste, sit cupiditate, magni labore saepe velit.</p>
 </details>
 <details>
   <summary>Question 4</summary>
   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam esse qui asperiores corrupti est architecto doloribus! Fugiat est reiciendis cum dolorem enim omnis iste, sit cupiditate, magni labore saepe velit.</p>
 </details>
 <details>
   <summary>Question 5</summary>
   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam esse qui asperiores corrupti est architecto doloribus! Fugiat est reiciendis cum dolorem enim omnis iste, sit cupiditate, magni labore saepe velit.</p>
 </details>
    </div>
</div>
<!-- END SECTION ABOUT --> 



<?php
include_once "footer.php";

?>