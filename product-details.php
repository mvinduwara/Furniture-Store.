<?php
require "./content/connection.php";
session_start();

if (isset($_GET["id"])) {
    $product_id = $_GET["id"];


?>

    <!doctype html>
    <html class="no-js" lang="zxx">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Parlo - eCommerce Bootstrap 4 Template</title>
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

            <!--navigation-section-start-->
            <div class="breadcrumb-area pt-35 pb-35 bg-gray">
                <div class="container">
                    <div class="breadcrumb-content text-center">
                        <ul>
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li class="active">Product Details </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--navigation-section-end-->

            <?php
            $product_resulset = Database::search("SELECT * FROM `product` INNER JOIN `product_images` ON `product`.`product_id`=`product_images`.`product_id` WHERE `product`.`product_id` = '" . $product_id . "'");
            $product_resultset_data = $product_resulset->fetch_assoc();

            $product_related_cat = $product_resultset_data['product_category_id'];

            $product_review_resulset = Database::search("SELECT * FROM `product_review` WHERE `product_id` = ' $product_id ' LIMIT 4");
            $review_count = $product_review_resulset->num_rows;
            $product_review_data = $product_review_resulset->fetch_assoc();

            ?>

            <div class="product-details-area pt-100 pb-95">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <?php
                            $product_image_resultset = Database::search("SELECT * FROM `product_images` WHERE `product_id` = '" . $product_id . "'");
                            $product_image_resultset_data = $product_image_resultset->fetch_assoc();

                            ?>
                            <div class="product-details-img">
                                <div class="zoompro-border zoompro-span">
                                    <img class="zoompro" src="product_img/path1/<?php echo $product_image_resultset_data["product_image_path01"]; ?>"" data-zoom-image=" product_img/path1/<?php echo $product_image_resultset_data["product_image_path01"]; ?>"" alt="" />
                                </div>
                                <div id="gallery" class="mt-20 product-dec-slider">
                                    <a data-image="product_img/path1/<?php echo $product_image_resultset_data["product_image_path01"]; ?>" data-zoom-image="product_img/path1/<?php echo $product_image_resultset_data["product_image_path01"]; ?>">
                                        <img src="product_img/path1/<?php echo $product_image_resultset_data["product_image_path01"]; ?>" alt="" style="width: 90px; height: 90px;">
                                    </a>
                                    <a data-image="product_img/path2/<?php echo $product_image_resultset_data["product_image_path02"]; ?>" data-zoom-image="product_img/path2/<?php echo $product_image_resultset_data["product_image_path02"]; ?>">
                                        <img src="product_img/path2/<?php echo $product_image_resultset_data["product_image_path02"]; ?>" alt="" style="width: 90px; height: 90px;">
                                    </a>
                                    <a data-image="product_img/path3/<?php echo $product_image_resultset_data["product_image_path03"]; ?>" data-zoom-image="product_img/path3/<?php echo $product_image_resultset_data["product_image_path03"]; ?>">
                                        <img src="product_img/path3/<?php echo $product_image_resultset_data["product_image_path03"]; ?>" alt="" style="width: 90px; height: 90px;">
                                    </a>
                                    <a data-image="product_img/path4/<?php echo $product_image_resultset_data["product_image_path04"]; ?>" data-zoom-image="product_img/path3/<?php echo $product_image_resultset_data["product_image_path04"]; ?>">
                                        <img src="product_img/path4/<?php echo $product_image_resultset_data["product_image_path04"]; ?>" alt="" style="width: 90px; height: 90px;">
                                    </a>
                                    <a data-image="product_img/path5/<?php echo $product_image_resultset_data["product_image_path05"]; ?>" data-zoom-image="product_img/path3/<?php echo $product_image_resultset_data["product_image_path05"]; ?>">
                                        <img src="product_img/path5/<?php echo $product_image_resultset_data["product_image_path05"]; ?>" alt="" style="width: 90px; height: 90px;">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="product-details-content ml-30">
                                <h2><?php echo $product_resultset_data["product_name"] ?></h2>
                                <div class="product-details-price">
                                    <span>RS <?php echo $product_resultset_data["product_price"] ?>.00</span>
                                    <span class="old">$20.00 </span>
                                </div>
                                <div class="pro-details-rating-wrap">
                                    <div class="pro-details-rating">
                                        <i class="sli sli-star yellow"></i>
                                        <i class="sli sli-star yellow"></i>
                                        <i class="sli sli-star yellow"></i>
                                        <i class="sli sli-star yellow"></i>
                                        <i class="sli sli-star yellow"></i>
                                    </div>
                                    <span><a href="#"><?php echo $review_count ?> Reviews</a></span>
                                </div>
                                <p><?php echo $product_resultset_data["product_title"] ?></p>
                                <div class="pro-details-list">
                                    <ul>
                                        <li>- 0.5 mm Dail</li>
                                        <li>- Inspired vector icons</li>
                                        <li>- Very modern style </li>
                                    </ul>
                                </div>

                                <div class="pro-details-size-color">
                                    <div class="col-12">
                                        <p id="responseAlert"></p>
                                    </div>
                                </div>

                                <div class="pro-details-quality">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1">
                                    </div>
                                    <div class="pro-details-cart btn-hover">
                                        <a onclick="addToCart(<?php echo $product_id; ?>, document.querySelector('.cart-plus-minus-box').value);" ?>Add To Cart</a>
                                    </div>
                                    <div class="pro-details-wishlist">
                                        <a title="Add To Wishlist" onclick="addtowishlist(<?php echo $product_resultset_data['product_id'] ?> )"><i class="sli sli-heart"></i></a>
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
            <!-- decriptio-box -->
            <div class="description-review-area pb-95">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <div class="description-review-wrapper">
                                <div class="description-review-topbar nav">
                                    <a class="active" data-toggle="tab" href="#des-details1">Description</a>
                                    <a data-toggle="tab" href="#des-details3">Additional information</a>
                                    <a data-toggle="tab" href="#des-details2">Reviews <?php echo $review_count ?></a>
                                </div>
                                <div class="tab-content description-review-bottom">
                                    <div id="des-details1" class="tab-pane active">
                                        <div class="product-description-wrapper">
                                            <p><?php echo $product_resultset_data["product_description"] ?></p>
                                        </div>
                                    </div>
                                    <div id="des-details3" class="tab-pane">
                                        <div class="product-anotherinfo-wrapper">
                                            <ul>
                                                <li><span>Weight</span> 400 g</li>
                                                <li><span>Dimensions</span><?php echo $product_resultset_data["product_dimentions"] ?></li>
                                                <li><span>Materials</span><?php echo $product_resultset_data["product_material"] ?></li>
                                                <li><span>Designer</span><?php echo $product_resultset_data["product_designer"] ?></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- review-vsection-start -->
                                    <div id="des-details2" class="tab-pane">
                                        <div class="review-wrapper">
                                            <div class="single-review">
                                                <?php
                                                if (empty($product_review_data["product_review_description"]) && empty($product_review_data["product_review_name"])) {
                                                ?>
                                                    <div class="review-content">
                                                        <div class="review-top-wrap">
                                                            <div class="review-name">
                                                                <h4> No Reviews</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="review-img">
                                                        <img src="resources/img/person.jpg" alt="">
                                                    </div>
                                                    <div class="review-content">
                                                        <p>“<?php echo $product_review_data["product_review_description"] ?>”</p>
                                                        <div class="review-top-wrap">
                                                            <div class="review-name">
                                                                <h4><?php echo $product_review_data["product_review_name"] ?></h4>
                                                            </div>
                                                            <!-- <div class="review-rating">
                                                                <i class="sli sli-star"></i>
                                                                <i class="sli sli-star"></i>
                                                                <i class="sli sli-star"></i>
                                                                <i class="sli sli-star"></i>
                                                                <i class="sli sli-star"></i> -->
                                                        </div>
                                                    </div>
                                            </div>
                                        <?php
                                                }

                                        ?>

                                        </div>
                                    </div>
                                    <div class="ratting-form-wrapper">
                                        <span>Add a Review</span>
                                        <p>Your email address will not be published. Required fields are marked <span>*</span></p>
                                        <div class="star-box-wrap">
                                            <div class="single-ratting-star">
                                                <i class="sli sli-star"></i>
                                            </div>
                                            <div class="single-ratting-star">
                                                <i class="sli sli-star"></i>
                                                <i class="sli sli-star"></i>
                                            </div>
                                            <div class="single-ratting-star">
                                                <i class="sli sli-star"></i>
                                                <i class="sli sli-star"></i>
                                                <i class="sli sli-star"></i>
                                            </div>
                                            <div class="single-ratting-star">
                                                <i class="sli sli-star"></i>
                                                <i class="sli sli-star"></i>
                                                <i class="sli sli-star"></i>
                                                <i class="sli sli-star"></i>
                                            </div>
                                            <div class="single-ratting-star">
                                                <i class="sli sli-star"></i>
                                                <i class="sli sli-star"></i>
                                                <i class="sli sli-star"></i>
                                                <i class="sli sli-star"></i>
                                                <i class="sli sli-star"></i>
                                            </div>
                                        </div>
                                        <!-- review-view-section-end-->

                                        <!-- review-form-start -->
                                        <div class="ratting-form">
                                            <form method="POST">
                                                <div class="row">

                                                    <div class="col-12">
                                                        <p id="responseAlert"></p>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="rating-form-style mb-20">
                                                            <label>Your review <span>*</span></label>
                                                            <textarea id="review_text"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="rating-form-style mb-20">
                                                            <label>Name <span>*</span></label>
                                                            <input type="text" id="review_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="rating-form-style mb-20">
                                                            <label>Email <span>*</span></label>
                                                            <input type="email" id="review_email">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-submit">
                                                            <input type="button" value="submit" onclick="review_adding(<?php echo $product_id ?>);">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- review-form-end -->

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="pro-dec-banner">
                            <a href="#"><img src="assets/img/banner/banner-15.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- related-product-section-start -->
        <div class="product-area pb-70">
            <div class="container">
                <div class="section-title text-center pb-60">
                    <h2>Related products</h2>
                    <p> Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical</p>
                </div>
                <div class="arrivals-wrap scroll-zoom">
                    <div class="ht-products product-slider-active owl-carousel">
                        <?php
                        $product_type_resultset = Database::search("SELECT * FROM `product` INNER JOIN `product_images` ON `product`.`product_id`=`product_images`.`product_id`
                        WHERE `product`.`product_category_id` = '" . $product_related_cat . "' AND `status_id`='1' ORDER BY `product_datetime_added` DESC");
                        $product_type_count = $product_type_resultset->num_rows;

                        for ($x = 0; $x < $product_type_count; $x++) {
                            $product_type_data = $product_type_resultset->fetch_assoc();
                            $product_model = $product_type_data["product_model_has_brand_id"];

                        ?>
                            <!--Product Start-->
                            <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                            <div class="ht-product-inner">
                                    <div class="ht-product-image-wrap">
                                        <?php
                                        if (empty($product_type_data["product_image_path01"])) {
                                        ?>
                                            <a href="#" class="ht-product-image"> <img src="resources/img/No-Image.jpg" alt="Universal Product Style" style="height: 150px;"> </a>

                                        <?php
                                        } else {
                                        ?>
                                            <a href="product-details.php?id=<?php echo $product_type_data["product_id"]; ?>" class="ht-product-image"> <img src="product_img/path1/<?php echo $product_type_data["product_image_path01"]; ?>" alt="Universal Product Style"> </a>

                                        <?php
                                        }

                                        ?>

                                        <div class="ht-product-action">
                                            <ul>
                                                <li><a href="#" data-toggle="modal" data-target="#exampleModal"><i class="sli sli-magnifier"></i><span class="ht-product-action-tooltip">Quick View</span></a></li>
                                                <li><a href="#"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip">Add to Wishlist</span></a></li>
                                                <li><a href="compare-page.php?id=<?php echo $product_type_data["product_id"]; ?>&model=<?php echo $product_type_data['product_model_has_brand_id']; ?>"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip">Add to Compare</span></a></li>
                                                <li><a href="#"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip">Add to Cart</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="ht-product-content">
                                        <div class="ht-product-content-inner">
                                            <div class="ht-product-categories"><a href="#"><?php echo $product_type_data["product_quantity"]; ?></a></div>

                                            <h4 class="ht-product-title"><a href="#"><?php echo $product_type_data["product_name"]; ?></a></h4>
                                            <div class="ht-product-price">
                                                <span class="new">RS <?php echo $product_type_data["product_price"]; ?>.00</span><br>
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
                                        <div class="ht-product-categories mt-2">Delivery fee Rs.<?php echo $product_type_data["product_delivery_fee"];  ?>.00</div>
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
        <!-- related-product-section-end -->


        <!-- footer-start -->
        <?php require "./content/footer.php"; ?>
        <!-- footer-end-->

        <!-- Modal-start -->
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

<?php
} else {
    header("Location:login-register.php");
}
?>