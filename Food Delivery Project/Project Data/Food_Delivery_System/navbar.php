<body>

    <!-- LOADER -->
    <div id="preloader">
        <div class="loader_wrap">
            <div class="sk-chase">
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
            </div>
        </div>
    </div>
    <!-- END LOADER -->

    <!-- START HEADER -->
    <header class="header_wrap fixed-top light_skin sticky_dark_skin main_menu_uppercase transparent_header dd_dark_skin">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.html">
                    <img class="logo_light" src="assets/images/logo/deevlooperslogo1.png" alt="logo" style="width: 38%;">
                    <img class="logo_dark" src="assets/images/logo/deevlooperslogo1.png" alt="logo" style="width: 32%;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false">
                    <span class="ion-android-menu"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="dropdown">
                            <a class="nav-link  active" href="index.php">Home</a>

                        </li>
                        <li class="dropdown">
                            <a href="about.php" class="nav-link ">about us</a>
                        </li>
                        <!-- <li class="dropdown">
                    <a href="contact.php"   class="nav-link ">contact us</a>
                    </li> -->
                        <li class="dropdown">
                            <a href="faq.php" class="nav-link ">FAQ</a>
                        </li>
                        <li class="dropdown">
                            <a href="menu-2.php" class="nav-link ">menu</a>
                        </li>
                        <li class="dropdown"><a class="nav-link" href="blog.php">Blog</a>
                        </li>
                        <?php
                        if (isset($_SESSION['cart'])) {
                            
                            ?>

                            <ul class="navbar-nav attr-nav align-items-center">
                                <li><a href="javascript:void(0);" class="nav-link search_trigger"><i class="linearicons-magnifier"></i></a>
                                    <div class="search_wrap">
                                        <span class="close-search"><i class="ion-ios-close-empty "></i></span>
                                        <form>
                                            <input type="text" placeholder="Search" class="form-control" id="search_input">
                                            <button type="submit" class="search_icon"><i class="ion-ios-search-strong"></i></button>
                                        </form>
                                    </div>
                                    <div class="search_overlay"></div>
                                </li>
                                <li><a class="nav-link cart_trigger" href="javascript:void(0);"><i class="linearicons-cart"></i><span class=" total-count cart_count">2</span></a>
                                    <div class="cart_box" id="cart">
                                        <div class="cart_header">
                                            <h3>Your Cart</h3>
                                        </div>
                                        <ul class="show-cart ">
                                            <!-- <li>
                                <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                <a href="#"><img src="assets/images/cart_thamb1.jpg" alt="cart_thumb1">Berry Salad</a>
                                <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>78.00</span>
                            </li>
                            <li>
                                <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                <a href="#"><img src="assets/images/cart_thamb2.jpg" alt="cart_thumb2">Milky Fruit</a>
                                <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>81.00</span>
                            </li>
                            <li>
                                <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                <a href="#"><img src="assets/images/cart_thamb3.jpg" alt="cart_thumb3">Egg Bread</a>
                                <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>78.00</span>
                            </li>
                            <li>
                                <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                <a href="#"><img src="assets/images/cart_thamb4.jpg" alt="cart_thumb4">Orange Jam</a>
                                <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>81.00</span>
                            </li> -->
                                        </ul>

                                        <div class="cart_footer">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-3 col-lg-4 col-12">
                                                        <p class="cart-total" style="margin-top: 6px;"><strong>Total:</strong> <span class="total-cart"> <span class="price_symbole"></span></span></p>
                                                    </div>
                                                    <div class="col-md-4 col-lg-3 col-12">
                                                        <p class="cart_buttons"><a href="shop-cart.php" class="btn btn-default btn-radius checkout" style="font-size: 11px;">Cart</a></p>
                                                    </div>
                                                    <div class="col-md-5 col-lg-5 col-12 ">
                                                        <p class="cart_buttons"><a href="#" class="clear-cart btn btn-default btn-radius checkout " style="font-size: 11px;">clear cart</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <li class="dropdown">
                                <a href="logout.php" class="nav-link "> logout</a>
                            </li>
                        <?php } else { ?>

                            <li class="dropdown">
                                <a href="login.php" class="nav-link ">log-in</a>
                            </li>

                            <li class="dropdown">
                                <a href="register.php" class="nav-link ">sign-up</a>
                            </li>
                        <?php } ?>
                       


                    </ul>
                </div>


            </nav>
        </div>
    </header>
    <!-- END HEADER -->