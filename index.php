<?php
require "./content/connection.php";
session_start();
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Parlo | Home </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="assets/css/icons.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

    <div class="wrapper">

        <!-- header-sestion -->
        <?php require "./content/header.php" ?>
        <!-- header-sestion -->

        <!--page content-start-slider-area -->
        <div class="slider-area section-padding-1">
            <div class="slider-active owl-carousel nav-style-1">
                <div class="single-slider slider-height-1 bg-paleturquoise">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                                <div class="slider-content slider-animated-1">
                                    <h1 class="animated">Wooden Craft</h1>
                                    <p class="animated">In the new collection of sofas, tables and chairs, brass, the material of choice, interacts with stone, fabric and leather.</p>
                                    <div class="slider-btn btn-hover">
                                        <a class="animated" href="shop.php">Shop Now <i class="sli sli-basket-loaded"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                                <div class="slider-single-img slider-animated-1">
                                    <img class="animated" src="assets/img/slider/slider-hm1-1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider slider-height-1 bg-paleturquoise">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                                <div class="slider-content slider-animated-1">
                                    <h1 class="animated">Wooden Craft</h1>
                                    <p class="animated">Lorem Ipsum is simply dummy text of the printing and typesetting industry. It is a long established fact that a reader.</p>
                                    <div class="slider-btn btn-hover">
                                        <a class="animated" href="shop.html">Shop Now <i class="sli sli-basket-loaded"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                                <div class="slider-single-img slider-animated-1">
                                    <img class="animated" src="assets/img/slider/slider-hm1-2.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- second-section-start -->
        <div class="banner-area pt-100 pb-65">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="single-banner mb-30 scroll-zoom">
                            <a href="product-details.html"><img class="animated" src="assets/img/banner/banner-1.png" alt=""></a>
                            <div class="banner-content banner-position-1">
                                <h3>35% off <br>Black Monday</h3>
                                <h2>Lighting For <br> Home.</h2>
                                <a href="shop.php">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single-banner mb-30 scroll-zoom">
                            <a href="product-details.html"><img class="animated" src="assets/img/banner/banner-2.png" alt=""></a>
                            <div class="banner-content banner-position-2">
                                <h3>15% off</h3>
                                <h2>Table Shiner <br>Moving.</h2>
                                <a href="product-details.html">Shop Now</a>
                            </div>
                        </div>
                        <div class="single-banner mb-30 scroll-zoom">
                            <a href="product-details.html"><img class="animated" src="assets/img/banner/banner-3.png" alt=""></a>
                            <div class="banner-content banner-position-2">
                                <h3>Black Friday</h3>
                                <h2>Wall Lighting <br>Black.</h2>
                                <a href="product-details.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- second-section-end -->

        <!-- third-section-start -->
        <div class="product-area pb-70">
            <div class="container">
                <div class="section-title text-center pb-40">
                    <h2>All Products</h2>
                    <p> Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical</p>
                </div>
                <div class="product-tab-list nav pb-60 text-center">
                    <a class="active" href="#product-1" data-toggle="tab">
                        <h4>sofas and armchairs</h4>
                    </a>
                    <a href="#product-2" data-toggle="tab">
                        <h4>Tables and chairs </h4>
                    </a>
                    <a href="#product-3" data-toggle="tab">
                        <h4>Storage systems and units</h4>
                    </a>
                </div>

                <div class="tab-content jump-2">
                    <div id="product-1" class="tab-pane active">
                        <div class="ht-products product-slider-active owl-carousel">
                            <?php
                            $product_type1_resultset = Database::search("SELECT * FROM `product` INNER JOIN `product_images` ON `product`.`product_id`=`product_images`.`product_id`
                            WHERE `product_category_id` = '1' AND `status_id`='1'");
                            $product_type1_count = $product_type1_resultset->num_rows;

                            for ($i = 0; $i < $product_type1_count; $i++) {
                                $product_type1_data = $product_type1_resultset->fetch_assoc();
                                $product_model = $product_type1_data["product_model_has_brand_id"];
                            ?>
                                <!--Product Start-->
                                <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                                    <div class="ht-product-inner">
                                        <div class="ht-product-image-wrap">
                                            <?php
                                            if (empty($product_type1_data["product_image_path01"])) {
                                            ?>
                                                <a href="#" class="ht-product-image"> <img src="resources/img/No-Image.jpg" alt="Universal Product Style" style="height: 150px;"> </a>

                                            <?php
                                            } else {
                                            ?>
                                                <a href="product-details.php?id=<?php echo $product_type1_data["product_id"]; ?>" class="ht-product-image"> <img src="./parlo-dashboard/<?php echo $product_type1_data["product_image_path01"]; ?>" alt="Universal Product Style"> </a>

                                            <?php
                                            }

                                            ?> <div class="ht-product-action">
                                                <ul>
                                                    <li><a href="#" data-toggle="modal" data-target="#exampleModal"><i class="sli sli-magnifier"></i><span class="ht-product-action-tooltip">Quick View</span></a></li>
                                                    <li><a onclick="addtowishlist(<?php echo $product_type1_data['product_id'] ?> )"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip">Add to Wishlist</span></a></li>
                                                    <li><a href="compare-page.php?id=<?php echo $product_type1_data["product_id"]; ?>&model=<?php echo $product_type1_data['product_model_has_brand_id']; ?>"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip">Add to Compare</span></a></li>
                                                    <li><a href="cart-page.php"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip">Add to Cart</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="ht-product-content">
                                            <div class="ht-product-content-inner">
                                                <div class="ht-product-categories"><a href="product-details.php"><?php echo $product_type1_data["product_quantity"]; ?></a></div>
                                                <h4 class="ht-product-title"><a href="product-details.php"><?php echo $product_type1_data["product_name"]; ?></a></h4>
                                                <div class="ht-product-price">
                                                    <span class="new">RS <?php echo $product_type1_data["product_price"]; ?>.00</span><br>
                                                    <span class="old">$80.00</span>
                                                </div>
                                                <div class="ht-product-ratting-wrap">
                                                    <span class="ht-product-ratting">
                                                        <span class="ht-product-user-ratting" style="width: 100%;">
                                                            <i class="sli sli-star"></i>
                                                            <i class="sli sli-star"></i>
                                                            <i class="sli sli-star"></i>
                                                            <i class="sli sli-star"></i>
                                                            <i class="sli sli-star"></i>
                                                        </span>
                                                        <i class="sli sli-star"></i>
                                                        <i class="sli sli-star"></i>
                                                        <i class="sli sli-star"></i>
                                                        <i class="sli sli-star"></i>
                                                        <i class="sli sli-star"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ht-product-categories mt-2">Delivery fee Rs.<?php echo $product_type1_data["product_delivery_fee"];  ?>.00</div>
                                            <div class="ht-product-action">
                                                <ul>
                                                    <li><a href="product-details.php"><i class="sli sli-magnifier"></i><span class="ht-product-action-tooltip">Quick View</span></a></li>
                                                    <li><a href="wishlist.php"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip">Add to Wishlist</span></a></li>
                                                    <li><a href="compare-page.php"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip">Add to Compare</span></a></li>
                                                    <li><a href="cart-page.php"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip">Add to Cart</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="ht-product-countdown-wrap">
                                                <div class="ht-product-countdown" data-countdown="2020/01/01"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Product End-->
                            <?php
                            }
                            ?>


                        </div>
                    </div>
                    <div id="product-2" class="tab-pane">
                        <div class="ht-products product-slider-active owl-carousel">
                            <?php
                            $product_type2_resultset = Database::search("SELECT * FROM `product` INNER JOIN `product_images` ON `product`.`product_id`=`product_images`.`product_id`
                            WHERE `product_category_id` = '2' AND `status_id`='1'");
                            $product_type2_count = $product_type2_resultset->num_rows;

                            for ($i = 0; $i < $product_type2_count; $i++) {
                                $product_type2_data = $product_type2_resultset->fetch_assoc();
                                $product_model = $product_type2_data["product_model_has_brand_id"];
                            ?>
                                <!--Product Start-->
                                <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                                    <div class="ht-product-inner">
                                        <div class="ht-product-image-wrap">
                                            <?php
                                            if (empty($product_type2_data["product_image_path01"])) {
                                            ?>
                                                <a href="#" class="ht-product-image"> <img src="resources/img/No-Image.jpg" alt="Universal Product Style" style="height: 150px;"> </a>

                                            <?php
                                            } else {
                                            ?>
                                                <a href="product-details.php?id=<?php echo $product_type2_data["product_id"]; ?>" class="ht-product-image"> <img src="./parlo-dashboard/<?php echo $product_type2_data["product_image_path01"]; ?>" alt="Universal Product Style"> </a>

                                            <?php
                                            }

                                            ?> <div class="ht-product-action">
                                                <ul>
                                                    <li><a href="#" data-toggle="modal" data-target="#exampleModal"><i class="sli sli-magnifier"></i><span class="ht-product-action-tooltip">Quick View</span></a></li>
                                                    <li><a href="wishlist.php"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip">Add to Wishlist</span></a></li>
                                                    <li><a href="compare-page.php?id=<?php echo $product_type2_data["product_id"]; ?>&model=<?php echo $product_type2_data['product_model_has_brand_id']; ?>"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip">Add to Compare</span></a></li>
                                                    <li><a href="cart-page.php"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip">Add to Cart</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="ht-product-content">
                                            <div class="ht-product-content-inner">
                                                <div class="ht-product-categories"><a href="product-details.php"><?php echo $product_type2_data["product_quantity"]; ?></a></div>
                                                <h4 class="ht-product-title"><a href="product-details.php"><?php echo $product_type2_data["product_name"]; ?></a></h4>
                                                <div class="ht-product-price">
                                                    <span class="new">RS <?php echo $product_type2_data["product_price"]; ?>.00</span><br>
                                                    <span class="old">$80.00</span>
                                                </div>
                                                <div class="ht-product-ratting-wrap">
                                                    <span class="ht-product-ratting">
                                                        <span class="ht-product-user-ratting" style="width: 100%;">
                                                            <i class="sli sli-star"></i>
                                                            <i class="sli sli-star"></i>
                                                            <i class="sli sli-star"></i>
                                                            <i class="sli sli-star"></i>
                                                            <i class="sli sli-star"></i>
                                                        </span>
                                                        <i class="sli sli-star"></i>
                                                        <i class="sli sli-star"></i>
                                                        <i class="sli sli-star"></i>
                                                        <i class="sli sli-star"></i>
                                                        <i class="sli sli-star"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ht-product-categories mt-2">Delivery fee Rs.<?php echo $product_type2_data["product_delivery_fee"];  ?>.00</div>
                                            <div class="ht-product-action">
                                                <ul>
                                                    <li><a href="product-details.php"><i class="sli sli-magnifier"></i><span class="ht-product-action-tooltip">Quick View</span></a></li>
                                                    <li><a href="wishlist.php"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip">Add to Wishlist</span></a></li>
                                                    <li><a href="compare-page.php"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip">Add to Compare</span></a></li>
                                                    <li><a href="cart-page.php"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip">Add to Cart</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="ht-product-countdown-wrap">
                                                <div class="ht-product-countdown" data-countdown="2020/01/01"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Product End-->
                            <?php
                            }
                            ?>
                            <!--Product Start-->
                            <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                                <div class="ht-product-inner">
                                    <div class="ht-product-image-wrap">
                                        <a href="product-details.html" class="ht-product-image"> <img src="assets/img/product/product-5.jpg" alt="Universal Product Style"> </a>
                                        <div class="ht-product-action">
                                            <ul>
                                                <li><a href="#" data-toggle="modal" data-target="#exampleModal"><i class="sli sli-magnifier"></i><span class="ht-product-action-tooltip">Quick View</span></a></li>
                                                <li><a href="#"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip">Add to Wishlist</span></a></li>
                                                <li><a href="#"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip">Add to Compare</span></a></li>
                                                <li><a href="#"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip">Add to Cart</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="ht-product-content">
                                        <div class="ht-product-content-inner">
                                            <div class="ht-product-categories"><a href="#">Clock</a></div>
                                            <h4 class="ht-product-title"><a href="product-details.html">Demo Product Name</a></h4>
                                            <div class="ht-product-price">
                                                <span class="new">$60.00</span>
                                            </div>
                                            <div class="ht-product-ratting-wrap">
                                                <span class="ht-product-ratting">
                                                    <span class="ht-product-user-ratting" style="width: 100%;">
                                                        <i class="sli sli-star"></i>
                                                        <i class="sli sli-star"></i>
                                                        <i class="sli sli-star"></i>
                                                        <i class="sli sli-star"></i>
                                                        <i class="sli sli-star"></i>
                                                    </span>
                                                    <i class="sli sli-star"></i>
                                                    <i class="sli sli-star"></i>
                                                    <i class="sli sli-star"></i>
                                                    <i class="sli sli-star"></i>
                                                    <i class="sli sli-star"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="ht-product-action">
                                            <ul>
                                                <li><a href="#"><i class="sli sli-magnifier"></i><span class="ht-product-action-tooltip">Quick View</span></a></li>
                                                <li><a href="#"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip">Add to Wishlist</span></a></li>
                                                <li><a href="#"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip">Add to Compare</span></a></li>
                                                <li><a href="#"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip">Add to Cart</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="ht-product-countdown-wrap">
                                            <div class="ht-product-countdown" data-countdown="2020/01/01"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Product End-->
                        </div>
                    </div>
                    <div id="product-3" class="tab-pane">
                        <div class="ht-products product-slider-active owl-carousel">
                            <?php
                            $product_type3_resultset = Database::search("SELECT * FROM `product` INNER JOIN `product_images` ON `product`.`product_id`=`product_images`.`product_id`
                            WHERE `product_category_id` = '3' AND `status_id`='1'");
                            $product_type3_count = $product_type3_resultset->num_rows;

                            for ($i = 0; $i < $product_type2_count; $i++) {
                                $product_type3_data = $product_type3_resultset->fetch_assoc();
                                $product_model = $product_type3_data["product_model_has_brand_id"];
                            ?>

                                <!--Product Start-->
                                <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                                    <div class="ht-product-inner">
                                        <div class="ht-product-image-wrap">
                                            <?php
                                            if (empty($product_type3_data["product_image_path01"])) {
                                            ?>
                                                <a href="#" class="ht-product-image"> <img src="resources/img/No-Image.jpg" alt="Universal Product Style" style="height: 150px;"> </a>

                                            <?php
                                            } else {
                                            ?>
                                                <a href="product-details.php?id=<?php echo $product_type3_data["product_id"]; ?>" class="ht-product-image"> <img src="./parlo-dashboard/<?php echo $product_type3_data["product_image_path01"]; ?>" alt="Universal Product Style"> </a>

                                            <?php
                                            }

                                            ?> <div class="ht-product-action">
                                                <ul>
                                                    <li><a href="#" data-toggle="modal" data-target="#exampleModal"><i class="sli sli-magnifier"></i><span class="ht-product-action-tooltip">Quick View</span></a></li>
                                                    <li><a href="wishlist.php"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip">Add to Wishlist</span></a></li>
                                                    <li><a href="compare-page.php?id=<?php echo $product_type3_data["product_id"]; ?>&model=<?php echo $product_type3_data['product_model_has_brand_id']; ?>"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip">Add to Compare</span></a></li>
                                                    <li><a href="cart-page.php"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip">Add to Cart</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="ht-product-content">
                                            <div class="ht-product-content-inner">
                                                <div class="ht-product-categories"><a href="product-details.php"><?php echo $product_type3_data["product_quantity"]; ?></a></div>
                                                <h4 class="ht-product-title"><a href="product-details.php"><?php echo $product_type3_data["product_name"]; ?></a></h4>
                                                <div class="ht-product-price">
                                                    <span class="new">RS <?php echo $product_type3_data["product_price"]; ?>.00</span><br>
                                                    <span class="old">$80.00</span>
                                                </div>
                                                <div class="ht-product-ratting-wrap">
                                                    <span class="ht-product-ratting">
                                                        <span class="ht-product-user-ratting" style="width: 100%;">
                                                            <i class="sli sli-star"></i>
                                                            <i class="sli sli-star"></i>
                                                            <i class="sli sli-star"></i>
                                                            <i class="sli sli-star"></i>
                                                            <i class="sli sli-star"></i>
                                                        </span>
                                                        <i class="sli sli-star"></i>
                                                        <i class="sli sli-star"></i>
                                                        <i class="sli sli-star"></i>
                                                        <i class="sli sli-star"></i>
                                                        <i class="sli sli-star"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ht-product-categories mt-2">Delivery fee Rs.<?php echo $product_type3_data["product_delivery_fee"];  ?>.00</div>
                                            <div class="ht-product-action">
                                                <ul>
                                                    <li><a href="product-details.php"><i class="sli sli-magnifier"></i><span class="ht-product-action-tooltip">Quick View</span></a></li>
                                                    <li><a href="wishlist.php"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip">Add to Wishlist</span></a></li>
                                                    <li><a href="compare-page.php"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip">Add to Compare</span></a></li>
                                                    <li><a href="cart-page.php"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip">Add to Cart</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="ht-product-countdown-wrap">
                                                <div class="ht-product-countdown" data-countdown="2020/01/01"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Product End-->
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- third-section-end -->

        <!-- Fourth-section-start -->
        <div class="testimonial-area pt-80 pb-95 section-margin-1" style="background-image: url(assets/img/bg/bg-1.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 ml-auto mr-auto">
                        <div class="testimonial-active owl-carousel nav-style-1">
                            <div class="single-testimonial text-center">
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. Lorem ipsum dolor sit amet, consectetur adipiscing elit, didunt.</p>
                                <div class="client-info">
                                    <img src="assets/img/icon-img/testi.png" alt="">
                                    <h5>Nikolas Dehlli</h5>
                                </div>
                            </div>
                            <div class="single-testimonial text-center">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat Duis aute irure dolor in reprehenderit.</p>
                                <div class="client-info">
                                    <img src="assets/img/icon-img/testi.png" alt="">
                                    <h5>Grace Alvarado</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fourth-section-end -->

        <!-- Fifth-section-start -->
        <div class="product-area pt-95 pb-70">
            <div class="container">
                <div class="section-title text-center pb-60">
                    <h2>New Arrivals</h2>
                    <p> Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical</p>
                </div>
                <div class="arrivals-wrap scroll-zoom">
                    <div class="ht-products product-slider-active owl-carousel">
                        <?php
                        $product_resultset = Database::search("SELECT * FROM `product` INNER JOIN `product_images` ON `product`.`product_id`=`product_images`.`product_id`  ORDER BY `product_datetime_added` ASC LIMIT 4");
                        $product_resultset_count = $product_resultset->num_rows;

                        for ($i = 0; $i < $product_resultset_count; $i++) {
                            $product_resultset_data = $product_resultset->fetch_assoc();

                        ?>
                            <!--Product Start-->
                            <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                                <div class="ht-product-inner">
                                    <div class="ht-product-image-wrap">
                                        <?php
                                        if (empty($product_resultset_data["product_image_path01"])) {
                                        ?>
                                            <a href="#" class="ht-product-image"> <img src="resources/img/No-Image.jpg" alt="Universal Product Style" style="height: 150px;"> </a>

                                        <?php
                                        } else {
                                        ?>
                                            <a href="product-details.php?id=<?php echo $product_resultset_data["product_id"]; ?>" class="ht-product-image"> <img src="./parlo-dashboard/<?php echo $product_resultset_data["product_image_path01"]; ?>" alt="Universal Product Style"> </a>

                                        <?php
                                        }

                                        ?>

                                        <div class="ht-product-action">
                                            <ul>
                                                <li><a type="button" onclick="ProductSingleViewModal(<?php echo $product_resultset_data['product_id']; ?>)"><i class="sli sli-magnifier"></i><span class="ht-product-action-tooltip">Quick View</span></a></li>
                                                <!-- <li><button data-toggle="modal" data-target="#exampleModal" onclick="ProductSingleViewModal(<?php echo $product_resultset_data['product_id']; ?>)"><i class="sli sli-magnifier"></i><span class="ht-product-action-tooltip">Quick View</span></button></li> -->
                                                <!-- <li><a href="#" data-toggle="modal" data-target="#exampleModal"><i class="sli sli-magnifier"></i><span class="ht-product-action-tooltip">Quick View</span></a></li> -->
                                                <li><a onclick="addtowishlist(<?php echo $product_resultset_data['product_id'] ?> )"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip">Add to Wishlist</span></a></li>
                                                <li><a href="compare-page.php?id=<?php echo $product_resultset_data["product_id"]; ?>&model=<?php echo $product_resultset_data['product_model_has_brand_id']; ?>"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip">Add to Compare</span></a></li>
                                                <li><a href="#"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip">Add to Cart</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="ht-product-content">
                                        <div class="ht-product-content-inner">
                                            <div class="ht-product-categories"><a href="#"><?php echo $product_resultset_data["product_quantity"]; ?></a></div>

                                            <h4 class="ht-product-title"><a href="#"><?php echo $product_resultset_data["product_name"]; ?></a></h4>
                                            <div class="ht-product-price">
                                                <span class="new">RS <?php echo $product_resultset_data["product_price"]; ?>.00</span><br>
                                            </div>
                                            <div class="ht-product-ratting-wrap">
                                                <span class="ht-product-ratting">
                                                    <span class="ht-product-user-ratting" style="width: 100%;">
                                                        <i class="sli sli-star"></i>
                                                        <i class="sli sli-star"></i>
                                                        <i class="sli sli-star"></i>
                                                        <i class="sli sli-star"></i>
                                                        <i class="sli sli-star"></i>
                                                    </span>
                                                    <i class="sli sli-star"></i>
                                                    <i class="sli sli-star"></i>
                                                    <i class="sli sli-star"></i>
                                                    <i class="sli sli-star"></i>
                                                    <i class="sli sli-star"></i>
                                                </span>
                                            </div>

                                        </div>
                                        <div class="ht-product-categories mt-2">Delivery fee Rs.<?php echo $product_resultset_data["product_delivery_fee"];  ?>.00</div>
                                        <div class="ht-product-action">
                                            <ul>
                                                <li><a href="#"><i class="sli sli-magnifier"></i><span class="ht-product-action-tooltip">Quick View</span></a></li>
                                                <li><a href="#"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip">Add to Wishlist</span></a></li>
                                                <li><a href="#"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip">Add to Compare</span></a></li>
                                                <li><a href="#"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip">Add to Cart</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="ht-product-countdown-wrap">
                                            <div class="ht-product-countdown" data-countdown="2020/01/01"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Product End-->
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- Fifth-section-end -->


        <!-- Sixth-section-start -->
        <div class="banner-area pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="single-banner mb-30 scroll-zoom">
                            <a href="shop.php"><img src="assets/img/banner/banner-4.png" alt=""></a>
                            <div class="banner-content banner-position-3">
                                <h3>Black Monday</h3>
                                <h2>Wooden Lamp <br>Save 30%</h2>
                                <a href="shop.phpl">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single-banner mb-30 scroll-zoom">
                            <a href="shop.php"><img src="assets/img/banner/banner-5.png" alt=""></a>
                            <div class="banner-content banner-position-4">
                                <h3>Black Monday</h3>
                                <h2>Wooden Lamp <br>Save 30%</h2>
                                <a href="shop.phpl">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sixth-section-end -->


        <!-- Seventh-section-start -->
        <div class="feature-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="single-feature mb-40">
                            <div class="feature-icon">
                                <img src="assets/img/icon-img/free-shipping.png" alt="">
                            </div>
                            <div class="feature-content">
                                <h4>Free Shipping</h4>
                                <p>Most product are free <br>shipping.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-4 col-md-4">
                        <div class="single-feature mb-40 pl-50">
                            <div class="feature-icon">
                                <img src="assets/img/icon-img/support.png" alt="">
                            </div>
                            <div class="feature-content">
                                <h4>Customer Support</h4>
                                <p>24x7 Customer Support</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-4">
                        <div class="single-feature mb-40">
                            <div class="feature-icon">
                                <img src="assets/img/icon-img/security.png" alt="">
                            </div>
                            <div class="feature-content">
                                <h4>Secure Payment</h4>
                                <p>Most Secure Payment <br>for customer.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Seventh-section-end -->


        <!-- footer-start -->
        <?php require "./content/footer.php"; ?>
        <!-- footer-end-->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5 col-sm-12 col-xs-12">

                                <div class="tab-content quickview-big-img">
                                    <div id="pro-1" class="tab-pane fade show active">
                                        <img src="assets/img/product/quickview-l1.jpg" alt="">
                                    </div>
                                    <div id="pro-2" class="tab-pane fade">
                                        <img src="assets/img/product/quickview-l2.jpg" alt="">
                                    </div>
                                    <div id="pro-3" class="tab-pane fade">
                                        <img src="assets/img/product/quickview-l3.jpg" alt="">
                                    </div>
                                    <div id="pro-4" class="tab-pane fade">
                                        <img src="assets/img/product/quickview-l2.jpg" alt="">
                                    </div>
                                </div>
                                <!-- Thumbnail Large Image End -->

                                <!-- Thumbnail Image End -->
                                <div class="quickview-wrap mt-15">
                                    <div class="quickview-slide-active owl-carousel nav nav-style-2" role="tablist">
                                        <a class="active" data-toggle="tab" href="#pro-1"><img class="modal-img-1" src="" alt=""></a>
                                        <a data-toggle="tab" href="#pro-2"><img class="modal-img-2" src="" alt=""></a>
                                        <a data-toggle="tab" href="#pro-3"><img class="modal-img-3" src="" alt=""></a>
                                        <a data-toggle="tab" href="#pro-4"><img class="modal-img-4" src="" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-12 col-xs-12">
                                <div class="product-details-content quickview-content">
                                    <h2></h2>
                                    <p class="product_Id_P"></p>
                                    <div class="product-details-price">
                                        <span></span>
                                    </div>
                                    <div class="pro-details-rating-wrap">
                                        <span>3 Reviews</span>
                                    </div>
                                    <p class="product_Description_P"></p>
                                    <div class="pro-details-list">
                                        <ul>
                                            <li>- 0.5 mm Dail</li>
                                            <li>- Inspired vector icons</li>
                                            <li>- Very modern style </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->
    </div>


    <!-- All JS is here
============================================ -->
    <!-- script.js -->
    <script src="assets/js/script.js"></script>
    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- Popper JS -->
    <script src="assets/js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Plugins JS -->
    <script src="assets/js/plugins.js"></script>
    <!-- Ajax Mail -->
    <script src="assets/js/ajax-mail.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>

</html>