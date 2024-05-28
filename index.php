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
                                    <p class="animated">Lorem Ipsum is simply dummy text of the printing and typesetting industry. It is a long established fact that a reader.</p>
                                    <div class="slider-btn btn-hover">
                                        <a class="animated" href="shop.html">Shop Now <i class="sli sli-basket-loaded"></i></a>
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
                                <a href="product-details.html">Shop Now</a>
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
                    <?php
                    $product_category_resulset = Database::search("SELECT * FROM `product_category`");
                    $product_category_count = $product_category_resulset->num_rows;

                    for ($i = 0; $i < $product_category_count; $i++) {
                        $product_category_data = $product_category_resulset->fetch_assoc();
                    ?>
                        <a class="<?php echo ($i == 0) ? 'active' : ''; ?>" href="#product-<?php echo $product_category_data["product_category_id"]; ?>" data-toggle="tab">
                            <h4><?php echo $product_category_data["product_category_name"];; ?></h4>
                        </a>
                    <?php
                    }
                    ?>
                </div>

                <div class="tab-content jump-2">
                    <?php
                    $product_resultset = Database::search("SELECT * FROM `product` INNER JOIN `product_images` ON `product`.`product_id`=`product_images`.`product_id` 
                    WHERE `product_category_id` = '" . $product_category_data["product_category_id"] . "' LIMIT 4 ");
                    $product_count = $product_resultset->num_rows;

                    for ($i = 0; $i < $product_count; $i++) {
                        $product_data = $product_resultset->fetch_assoc();

                    ?>
                        <div id="product-<?php echo $product_category_data["product_category_id"]; ?>" class="tab-pane active">
                            <div class="ht-products product-slider-active owl-carousel">
                                <!--Product Start-->
                                <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                                    <div class="ht-product-inner">
                                        <div class="ht-product-image-wrap">
                                            <?php
                                            if (empty($product_data["product_image_path01"])) {
                                            ?>
                                                <a href="#" class="ht-product-image"> <img src="resources/img/No-Image.jpg" alt="Universal Product Style" style="height: 150px;"> </a>

                                            <?php
                                            } else {
                                            ?>
                                                <a href="product-details.php?id=<?php echo $product_data["product_id"]; ?>" class="ht-product-image"> <img src="product_img/path1/<?php echo $product_data["product_image_path01"]; ?>" alt="Universal Product Style"> </a>

                                            <?php
                                            }

                                            ?> <div class="ht-product-action">
                                                <ul>
                                                    <li><a href="#" data-toggle="modal" data-target="#exampleModal"><i class="sli sli-magnifier"></i><span class="ht-product-action-tooltip">Quick View</span></a></li>
                                                    <li><a href="wishlist.php"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip">Add to Wishlist</span></a></li>
                                                    <li><a href="compare-page.php"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip">Add to Compare</span></a></li>
                                                    <li><a href="cart-page.php"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip">Add to Cart</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="ht-product-content">
                                            <div class="ht-product-content-inner">
                                                <div class="ht-product-categories"><a href="product-details.php"><?php echo $product_data["product_quantity"]; ?></a></div>
                                                <h4 class="ht-product-title"><a href="product-details.php"><?php echo $product_data["product_name"]; ?></a></h4>
                                                <div class="ht-product-price">
                                                    <span class="new">RS <?php echo $product__data["product_price"]; ?>.00</span><br>
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
                                            <div class="ht-product-categories mt-2">Delivery fee Rs.<?php echo $product_data["product_delivery_fee"];  ?>.00</div>
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
                            </div>
                        </div>

                    <?php
                    }
                    ?>


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
                                <img src="assets/img/testimonial/testi-1.png" alt="">
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. Lorem ipsum dolor sit amet, consectetur adipiscing elit, didunt.</p>
                                <div class="client-info">
                                    <img src="assets/img/icon-img/testi.png" alt="">
                                    <h5>Nikolas Dehlli</h5>
                                </div>
                            </div>
                            <div class="single-testimonial text-center">
                                <img src="assets/img/testimonial/testi-2.png" alt="">
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
                                            <a href="product-details.php?id=<?php echo $product_resultset_data["product_id"]; ?>" class="ht-product-image"> <img src="product_img/path1/<?php echo $product_resultset_data["product_image_path01"]; ?>" alt="Universal Product Style"> </a>

                                        <?php
                                        }

                                        ?>

                                        <div class="ht-product-action">
                                            <ul>
                                                <li><a href="#" data-toggle="modal" data-target="#exampleModal"><i class="sli sli-magnifier"></i><span class="ht-product-action-tooltip">Quick View</span></a></li>
                                                <li><a href="#"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip">Add to Wishlist</span></a></li>
                                                <li><a href="compare-page.php"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip">Add to Compare</span></a></li>
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
                            <a href="product-details.html"><img src="assets/img/banner/banner-4.png" alt=""></a>
                            <div class="banner-content banner-position-3">
                                <h3>Black Monday</h3>
                                <h2>Wooden Lamp <br>Save 30%</h2>
                                <a href="product-details.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single-banner mb-30 scroll-zoom">
                            <a href="product-details.html"><img src="assets/img/banner/banner-5.png" alt=""></a>
                            <div class="banner-content banner-position-4">
                                <h3>Black Monday</h3>
                                <h2>Wooden Lamp <br>Save 30%</h2>
                                <a href="product-details.html">Shop Now</a>
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


        <!-- blog-area-start -->
        <div class="blog-area pt-50 pb-65">
            <div class="container">
                <div class="section-title text-center pb-60">
                    <h2>New Blog Posts</h2>
                    <p> Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical</p>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="blog-wrap mb-30 mr-20 text-center scroll-zoom">
                            <div class="blog-img mb-25">
                                <a href="blog-details.html"><img src="assets/img/blog/blog-1.jpg" alt=""></a>
                            </div>
                            <div class="blog-content">
                                <h3><a href="blog-details.html">Distracted by the readable content</a></h3>
                                <div class="blog-meta blog-mrg-border">
                                    <ul>
                                        <li><a href="#">23 December 2019 </a></li>
                                        <li><a href="#"> 24 View </a></li>
                                        <li><a href="#">4 likes</a></li>
                                    </ul>
                                </div>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="blog-wrap mb-30 ml-20 text-center scroll-zoom">
                            <div class="blog-img mb-25">
                                <a href="blog-details.html"><img src="assets/img/blog/blog-2.jpg" alt=""></a>
                            </div>
                            <div class="blog-content">
                                <h3><a href="blog-details.html">There are many variations of passages of Lorem</a></h3>
                                <div class="blog-meta blog-mrg-border">
                                    <ul>
                                        <li><a href="#">23 December 2019 </a></li>
                                        <li><a href="#"> 24 View </a></li>
                                        <li><a href="#">4 likes</a></li>
                                    </ul>
                                </div>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog-area-end -->

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
                                        <a class="active" data-toggle="tab" href="#pro-1"><img src="assets/img/product/quickview-s1.jpg" alt=""></a>
                                        <a data-toggle="tab" href="#pro-2"><img src="assets/img/product/quickview-s2.jpg" alt=""></a>
                                        <a data-toggle="tab" href="#pro-3"><img src="assets/img/product/quickview-s3.jpg" alt=""></a>
                                        <a data-toggle="tab" href="#pro-4"><img src="assets/img/product/quickview-s2.jpg" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-12 col-xs-12">
                                <div class="product-details-content quickview-content">
                                    <h2>Products Name Here</h2>
                                    <div class="product-details-price">
                                        <span>$18.00 </span>
                                        <span class="old">$20.00 </span>
                                    </div>
                                    <div class="pro-details-rating-wrap">
                                        <div class="pro-details-rating">
                                            <i class="sli sli-star yellow"></i>
                                            <i class="sli sli-star yellow"></i>
                                            <i class="sli sli-star yellow"></i>
                                            <i class="sli sli-star"></i>
                                            <i class="sli sli-star"></i>
                                        </div>
                                        <span>3 Reviews</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisic elit eiusm tempor incidid ut labore et dolore magna aliqua. Ut enim ad minim venialo quis nostrud exercitation ullamco</p>
                                    <div class="pro-details-list">
                                        <ul>
                                            <li>- 0.5 mm Dail</li>
                                            <li>- Inspired vector icons</li>
                                            <li>- Very modern style </li>
                                        </ul>
                                    </div>
                                    <div class="pro-details-size-color">
                                        <div class="pro-details-color-wrap">
                                            <span>Color</span>
                                            <div class="pro-details-color-content">
                                                <ul>
                                                    <li class="blue"></li>
                                                    <li class="maroon active"></li>
                                                    <li class="gray"></li>
                                                    <li class="green"></li>
                                                    <li class="yellow"></li>
                                                    <li class="white"></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="pro-details-size">
                                            <span>Size</span>
                                            <div class="pro-details-size-content">
                                                <ul>
                                                    <li><a href="#">s</a></li>
                                                    <li><a href="#">m</a></li>
                                                    <li><a href="#">l</a></li>
                                                    <li><a href="#">xl</a></li>
                                                    <li><a href="#">xxl</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro-details-quality">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                                        </div>
                                        <div class="pro-details-cart">
                                            <a href="#">Add To Cart</a>
                                        </div>
                                        <div class="pro-details-wishlist">
                                            <a title="Add To Wishlist" href="#"><i class="sli sli-heart"></i></a>
                                        </div>
                                        <div class="pro-details-compare">
                                            <a title="Add To Compare" href="#"><i class="sli sli-refresh"></i></a>
                                        </div>
                                    </div>
                                    <div class="pro-details-meta">
                                        <span>Categories :</span>
                                        <ul>
                                            <li><a href="#">Minimal,</a></li>
                                            <li><a href="#">Furniture,</a></li>
                                            <li><a href="#">Fashion</a></li>
                                        </ul>
                                    </div>
                                    <div class="pro-details-meta">
                                        <span>Tag :</span>
                                        <ul>
                                            <li><a href="#">Fashion, </a></li>
                                            <li><a href="#">Furniture,</a></li>
                                            <li><a href="#">Electronic</a></li>
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