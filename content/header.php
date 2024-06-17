<!-- header-section-start -->
<header class="header-area sticky-bar">
    <div class="main-header-wrap">
        <div class="container ">
            <div class="row">
                <!-- logo- -->
                <div class="col-xl-2 col-lg-2">
                    <div class="logo pt-40">
                        <a href="index.php">
                            <img src="assets/img/logo/logo.png" alt="">
                        </a>
                    </div>
                </div>

                <!-- nav-bar-start -->
                <div class="col-xl-7 col-lg-7 ">
                    <div class="main-menu">
                        <nav>
                            <ul>
                                <li class="angle-shape"><a href="index.php">Home </a></li>
                                <li class="angle-shape"><a href="shop.php"> Shop </a></li>
                                <li><a href="contact-us.php"> Contact </a></li>
                                <!-- <li class="angle-shape"><a href="blog-3-col.php"> Blog </a></li> -->
                                <li><a href="about-us.php">about us </a></li>
                                <li class="angle-shape"><a href="#">Pages </a>
                                    <ul class="submenu">
                                        <li><a href="login-register.php">login/register </a></li>
                                        <li><a href="my-account.php">My account </a></li>
                                        <li><a onclick="signout();">sign out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- nav-bar-end -->

                <div class="col-xl-3 col-lg-2">
                    <div class="header-right-wrap pt-40">
                        <!-- <div class="header-search">
                            <a class="search-active" href="#"><i class="sli sli-magnifier"></i></a>
                        </div> -->
                        <div class="cart-wrap">
                            <?php

                            if (isset($_SESSION["user"])) {
                                $user_firstname = $_SESSION["user"]["user_firstname"];
                                $user_lastname = $_SESSION["user"]["user_lastname"];

                            ?>
                                <button class="icon-cart-active">
                                    <span class="cart-price">
                                        <?php echo $user_firstname . '  '  . $user_lastname  ?>
                                    </span>
                                </button>

                            <?php
                            } 
                            ?>
                                

                            <div class="shopping-cart-content">
                                <div class="shopping-cart-top">
                                    <h4>Shoping Cart</h4>
                                    <a class="cart-close" href="#"><i class="sli sli-close"></i></a>
                                </div>
                                <ul>

                                    <?php

                                    if (isset($_SESSION["user"])) {
                                        $user_id = $_SESSION["user"]["user_id"];
                                        $user_email = $_SESSION["user"]["user_email"];

                                        $user_cart_resultset = Database::search("SELECT * FROM `product_cart` WHERE `user_id`='" . $user_id . "'");
                                        $user_cart_count = $user_cart_resultset->num_rows;

                                        for ($i = 0; $i < $user_cart_count; $i++) {
                                            $user_cart_data = $user_cart_resultset->fetch_assoc();

                                            $product_resulset = Database::search("SELECT * FROM `product` WHERE `product_id` = '" . $user_cart_data["product_id"] . "' ");
                                            $product_data = $product_resulset->fetch_assoc();

                                            $product_image_resultset = Database::search("SELECT * FROM `product_images` WHERE `product_id` = '" . $user_cart_data["product_id"] . "' ");
                                            $product_image_data = $product_image_resultset->fetch_assoc();
                                    ?>

                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-img">
                                                    <a href="#"><img alt="" src="./parlo-dashboard/<?php echo $product_image_data["product_image_path01"]; ?>"></a>
                                                    <div class="item-close">
                                                        <a href="#"><i class="sli sli-close"></i></a>
                                                    </div>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="#"><?php echo $product_data["product_name"];  ?></a></h4>
                                                    <span><?php echo $user_cart_data["product_cart_quantity"]; ?>x RS <?php echo $product_data["product_price"];  ?>.00</span>
                                                </div>
                                            </li>

                                    <?php
                                        }
                                    }
                                    ?>


                                </ul>
                                <div class="shopping-cart-bottom">
                                    <div class="shopping-cart-total">
                                        <h4>Total : <span class="shop-total"></span></h4>
                                    </div>
                                    <div class="shopping-cart-btn btn-hover text-center">
                                        <a class="default-btn" href="checkout.php">checkout</a>
                                        <a class="default-btn" href="cart-page.php">view cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- main-search start -->
        <!-- <div class="main-search-active">
            <div class="sidebar-search-icon">
                <button class="search-close"><span class="sli sli-close"></span></button>
            </div>
            <div class="sidebar-search-input">
                <form>
                    <div class="form-search">
                        <input id="search" class="input-text" value="" placeholder="Search Now" type="search">
                        <button>
                            <i class="sli sli-magnifier"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div> -->
        <!-- main-search end -->

    </div>

    <!-- checkout-section-mobile -->
    <div class="header-small-mobile">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="mobile-logo">
                        <a href="index.php">
                            <img alt="" src="assets/img/logo/logo.png">
                        </a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="header-right-wrap">
                        <div class="cart-wrap">
                           
                            <div class="shopping-cart-content">
                                <div class="shopping-cart-top">
                                    <h4>Shoping Cart</h4>
                                    <a class="cart-close" href="#"><i class="sli sli-close"></i></a>
                                </div>
                                <ul>

                                    <li class="single-shopping-cart">
                                        <div class="shopping-cart-img">
                                            <a href="#"><img alt="" src="assets/img/cart/cart-1.jpg"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="#">Product Name </a></h4>
                                            <span>1 x 90.00</span>
                                        </div>
                                    </li>
                                    <li class="single-shopping-cart">
                                        <div class="shopping-cart-img">
                                            <a href="#"><img alt="" src="assets/img/cart/cart-2.jpg"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="#">Product Name</a></h4>
                                            <span>1 x 90.00</span>
                                        </div>
                                    </li>
                                </ul>
                                <div class="shopping-cart-bottom">
                                    <div class="shopping-cart-total">
                                        <h4>Total : <span class="shop-total">$260.00</span></h4>
                                    </div>
                                    <div class="shopping-cart-btn btn-hover text-center">
                                        <a class="default-btn" href="checkout.php">checkout</a>
                                        <a class="default-btn" href="cart-page.php">view cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mobile-off-canvas">
                            <a class="mobile-aside-button" href="#"><i class="sli sli-menu"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-section-mobile -->
</header>
<!-- header-section-end -->

<!-- header-section-mobile-start -->
<div class="mobile-off-canvas-active">
    <a class="mobile-aside-close"><i class="sli sli-close"></i></a>
    <div class="header-mobile-aside-wrap">

        <!-- search-section-mobile-start -->
        <!-- <div class="mobile-search">
            <form class="search-form" action="#">
                <input type="text" placeholder="Search entire store…">
                <button class="button-search"><i class="sli sli-magnifier"></i></button>
            </form>
        </div> -->
        <!-- search-section-mobile-end -->

        <div class="mobile-menu-wrap">
            <!-- mobile menu start -->
            <div class="mobile-navigation">
                <!-- mobile menu navigation start -->
                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children"><a href="index.php">Home</a></li>
                        <li class="menu-item-has-children "><a href="shop.php">shop</a> </li>
                        <li><a href="shop.php">Accessories </a></li>
                        <li class="menu-item-has-children"><a href="#">pages</a>
                            <ul class="dropdown">
                                <li><a href="about-us.php">about us </a></li>
                                <li><a href="login-register.php">login/register </a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children "><a href="blog-3-col.php">Blog</a></li>
                        <li><a href="contact-us.php">Contact us</a></li>
                    </ul>
                </nav>
                <!-- mobile menu navigation end -->
            </div>
            <!-- mobile menu end -->
        </div>
        <!-- <div class="mobile-social-wrap">
            <a class="facebook" href="#"><i class="sli sli-social-facebook"></i></a>
            <a class="twitter" href="#"><i class="sli sli-social-twitter"></i></a>
            <a class="pinterest" href="#"><i class="sli sli-social-pinterest"></i></a>
            <a class="instagram" href="#"><i class="sli sli-social-instagram"></i></a>
            <a class="google" href="#"><i class="sli sli-social-google"></i></a>
        </div> -->
    </div>
</div>
<!-- header-section-mobile-end -->