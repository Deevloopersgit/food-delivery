<?php
$pagename = 'Menu';
include_once "header.php";
?>
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section background_bg overlay_bg_50 page_title_light" data-img-src="assets/images/menu_bg2.jpg">
    <div class="container">
        <!-- STRART CONTAINER -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title">
                    <h1>Our Menu</h1>
                </div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Our Menu</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START SECTION OUR MENU -->
<div class="section pb_70">
    <div class="container">
        <div class="row justify-content-end">
            <form action="search.php" method="POST" class="" id="form">
                <div class="col-md-12">


                    <div class="input-group">
                        <div class="input-group-prepend">
                            <select name="select" id="select" class="form-control form-control-sm">
                                <option value="">--Select--</option>
                                <?php
                                $query = "SELECT * FROM `tbl_categories`";
                                $res = mysqli_query($con, $query);
                                while ($row = mysqli_fetch_assoc($res)) {
                                ?>
                                    <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>


                        <input type="text" name="search" id="search" placeholder="Search Here...." class="form-control form-control-sm">
                        <div class="input-group-append">
                            <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-search fa-2x"></i></button>
                        </div>
                    </div>
                </div>
        </div>
        </form>
        <div class="row align-items-center">

            <div class="col-md-12">
                <div class="heading_tab_header animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                    <div class="heading_s1">
                        <h2>from Our Menu</h2>
                    </div>

                    <div class="tab-style1">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#tabmenubar" aria-expanded="false">
                            <span class="ion-android-menu"></span>
                        </button>
                        <ul id="tabmenubar" class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="Breakfast-tab" data-toggle="tab" href="#Breakfast" role="tab" aria-controls="Breakfast" aria-selected="true">Breakfast</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Lunch-tab" data-toggle="tab" href="#Lunch" role="tab" aria-controls="Lunch" aria-selected="false">Lunch</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Dinner-tab" data-toggle="tab" href="#Dinner" role="tab" aria-controls="Dinner" aria-selected="false">Dinner</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Drink-tab" data-toggle="tab" href="#Drink" role="tab" aria-controls="Drink" aria-selected="false">Drink</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="Breakfast" role="tabpanel" aria-labelledby="Breakfast-tab">
                        <div class="row" id="lklkl">
                            <?php
                            $q = mysqli_query($con, "SELECT * FROM `tbl_products`");
                            while ($row = mysqli_fetch_assoc($q)) {
                            ?>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product">
                                        <div class="menu_product_img">
                                            <img src="admin/backassets/images/product/<?php echo $row['product_image'] ?>" style="height: 239px;" alt="menu_item1">
                                            <div class="action_btn"><a href="#" data-name="<?php echo $row['product_name'] ?>" data-price="<?php echo $row['product_price'] ?>" class="add-to-cart btn btn-white">Add To Cart</a></div>
                                        </div>

                                        <div class="menu_product_info">
                                            <div class="title">
                                                <h5><a href="#"><?php echo $row['product_name'] ?></a></h5>
                                            </div>
                                            <p>Lorem Ipsum is simply dummy text of the printing and industry.</p>
                                        </div>
                                        <div class="menu_footer">
                                            <div class="rating">
                                                <div class="product_rate" style="width:68%"></div>
                                            </div>
                                            <div class="price">
                                                <p style="color:#ff3252;font-weight: 500;">&#8358 <span><?php echo $row['product_price'] ?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- START SECTION OUR MENU -->

<?php
include_once "footer.php";
?>

<script>
    $('#form').on("submit", function(e) {
        e.preventDefault();

        var formData = new FormData;
        formData.append("search", $("#search").val());
        formData.append("submit", "btn");

        $.ajax({
            url: 'search.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,

            dataType: 'JSON',
            success: function(data) {
                // alert(data);
                console.log(data);
                // if (data.lenght > 0) {
                    $('#lklkl').empty();
                    for (let index = 0; index < data.length; index++) {
                        $("#lklkl").append('<div class="col-lg-3 col-sm-6"><div class="single_product"><div class="menu_product_img"><img src="admin/backassets/images/product/' + data[index]["image"] + '" style="height: 239px;" alt="menu_item1"><div class="action_btn"><a href="#" data-name="' + data[index]["product_name"] + '" data-price="' + data[index]["product_price"] + '" class="add-to-cart btn btn-white">Add To Cart</a></div></div><div class="menu_product_info"><div class="title"><h5><a href="#">' + data[index]["product_name"] + '</a></h5></div><p>Lorem Ipsum is simply dummy text of the printing and industry.</p></div><div class="menu_footer"><div class="rating"><div class="product_rate" style="width:68%"></div></div><div class="price"><p style="color:#ff3252;font-weight: 500;">&#8358  <span>' + data[index]["product_price"] + '</span></p> </div></div></div></div>');

                    }
                // }
                //   else
                // {
                //     alert("No Record Found");
                // }
            }
        });
    });
</script>