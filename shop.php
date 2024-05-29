<?php
require "./content/connection.php";
$pageno;
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Parlo | Shop</title>
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
                        <li class="active">Shop </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--navigation-section-end-->

        <div class="shop-area pt-95 pb-100">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <div class="shop-top-bar">
                            <div class="select-shoing-wrap">
                                <div class="shop-select">
                                    <select>
                                        <option value="">Sort by newness</option>
                                        <option value="">A to Z</option>
                                        <option value=""> Z to A</option>
                                        <option value="">In stock</option>
                                    </select>
                                </div>
                                <p>Showing 1–12 of 20 result</p>
                            </div>

                        </div>

                        <div class="shop-bottom-area mt-35">
                            <div class="tab-content jump">
                                <div id="shop-1" class="tab-pane active">

                                    <div class="row ht-products" id="product_id">
                                        <?php
                                        if (isset($_GET["page"])) {
                                            $pageno = $_GET["page"];
                                        } else {
                                            $pageno = 1;
                                        }

                                        $product_resulset = Database::search("SELECT * FROM `product` INNER JOIN `product_images` ON `product`.`product_id`=`product_images`.`product_id`");
                                        $product_count = $product_resulset->num_rows;


                                        $results_per_page = 8;
                                        $number_of_pages = ceil($product_count / $results_per_page);

                                        $page_results = ($pageno - 1) * $results_per_page;
                                        $product_list_resultset = Database::search("SELECT * FROM `product` INNER JOIN `product_images` ON `product`.`product_id`=`product_images`.`product_id`
                                        ORDER BY `product_price` ASC LIMIT  $results_per_page  OFFSET  $page_results ");


                                        $product_list_count = $product_list_resultset->num_rows;

                                        for ($x = 0; $x < $product_list_count; $x++) {
                                            $product_list_data = $product_resulset->fetch_assoc();

                                        ?>
                                            <!--Product card Start-->
                                            <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6">
                                                <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                                                    <div class="ht-product-inner">
                                                        <div class="ht-product-image-wrap">
                                                            <?php
                                                            if (empty($product_list_data["product_image_path01"])) {
                                                            ?>
                                                                <a href="#" class="ht-product-image"> <img src="resources/img/No-Image.jpg" alt="Universal Product Style" style="height: 150px;"> </a>

                                                            <?php
                                                            } else {
                                                            ?>
                                                                <a href="product-details.php?id=<?php echo $product_list_data["product_id"]; ?>" class="ht-product-image"> <img src="product_img/path1/<?php echo $product_list_data["product_image_path01"]; ?>" alt="Universal Product Style"> </a>

                                                            <?php
                                                            }
                                                            ?>

                                                            <div class="ht-product-action">
                                                                <ul>
                                                                    <li><a href="#" data-toggle="modal" data-target="#exampleModal"><i class="sli sli-magnifier"></i><span class="ht-product-action-tooltip">Quick View</span></a></li>
                                                                    <li><a href="wishlist.html"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip">Add to Wishlist</span></a></li>
                                                                    <li><a href="compare-page.html"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip">Add to Compare</span></a></li>
                                                                    <li><a href="cart-page.html"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip">Add to Cart</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="ht-product-content">
                                                            <div class="ht-product-content-inner">
                                                                <div class="ht-product-categories"><a href="#"><?php echo $product_list_data["product_quantity"]  ?></a></div>
                                                                <h4 class="ht-product-title"><a href="product-details.html"><?php echo $product_list_data["product_name"] ?></a></h4>

                                                                <div class="ht-product-price">
                                                                    <span class="new">Rs <?php echo $product_list_data["product_price"] ?>.00</span>
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
                                                            <div class="ht-product-categories mt-2">Delivery fee Rs.<?php echo $product_list_data["product_delivery_fee"];  ?>.00</div>
                                                            <?php if ($product_list_data["status_id"] == 1) {
                                                            ?>
                                                                <span class="text-success">Available</span>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <span class="text-danger">Not Available</span>
                                                            <?php
                                                            }
                                                            ?>
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
                                            </div>
                                            <!--Product card End-->

                                        <?php
                                        }
                                        ?>

                                    </div>

                                </div>
                            </div>

                            <!-- pagination-section-start -->
                            <div class="pro-pagination-style text-center mt-30">
                                <ul>
                                    <li><a class="prev" href="
                                                <?php if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno - 1);
                                                } ?>"><i class="sli sli-arrow-left"></i></a></li>

                                    <?php

                                    for ($y = 1; $y <= $number_of_pages; $y++) {
                                        if ($y == $pageno) {
                                    ?>

                                            <li><a class="active" href="<?php echo "?page=" . ($y); ?>"><?php echo $y; ?></a></li>

                                        <?php
                                        } else {
                                        ?>


                                            <li><a href="<?php echo "?page=" . ($y); ?>"><?php echo $y; ?></a></li>

                                    <?php
                                        }
                                    }

                                    ?>

                                    

                                    <li><a class="next" href="
                                                <?php if ($pageno >= $number_of_pages) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno + 1);
                                                } ?>"><i class="sli sli-arrow-right"></i></a></li>
                                </ul>
                            </div>
                            <!-- pagination-section-end -->

                        </div>
                    </div>

                    <!-- prodct-search-area-start -->
                    <div class="col-lg-3">
                        <div class="sidebar-style mr-30">
                            <div class="sidebar-widget">
                                <h4 class="pro-sidebar-title">Search </h4>
                                <div class="pro-sidebar-search mb-50 mt-25">
                                    <form class="pro-sidebar-search-form" action="#">
                                        <input type="text" placeholder="Search here...">
                                        <button>
                                            <i class="sli sli-magnifier"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="sidebar-widget">
                                <h4 class="pro-sidebar-title">Refine By </h4>
                                <div class="sidebar-widget-list mt-30">
                                    <ul>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox"> <a href="#">On Sale <span>4</span> </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value=""> <a href="#">New <span>5</span></a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value=""> <a href="#">In Stock <span>6</span> </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-widget mt-45">
                                <h4 class="pro-sidebar-title">Filter By Price </h4>
                                <div class="price-filter mt-10">
                                    <div class="price-slider-amount">
                                        <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                    </div>
                                    <div id="slider-range"></div>
                                </div>
                            </div>
                            <div class="sidebar-widget mt-50">
                                <h4 class="pro-sidebar-title">Colour </h4>
                                <div class="sidebar-widget-list mt-20">
                                    <ul>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value=""> <a href="#">Green <span>7</span> </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value=""> <a href="#">Cream <span>8</span> </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value=""> <a href="#">Blue <span>9</span> </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value=""> <a href="#">Black <span>3</span> </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-widget mt-40">
                                <h4 class="pro-sidebar-title">Size </h4>
                                <div class="sidebar-widget-list mt-20">
                                    <ul>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value=""> <a href="#">XL <span>4</span> </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value=""> <a href="#">L <span>5</span> </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value=""> <a href="#">SM <span>6</span> </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value=""> <a href="#">XXL <span>7</span> </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-widget mt-50">
                                <h4 class="pro-sidebar-title">Tag </h4>
                                <div class="sidebar-widget-tag mt-25">
                                    <ul>
                                        <li><a href="#">Clothing</a></li>
                                        <li><a href="#">Accessories</a></li>
                                        <li><a href="#">For Men</a></li>
                                        <li><a href="#">Women</a></li>
                                        <li><a href="#">Fashion</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- prodct-search-area-end -->

                </div>
            </div>
        </div>

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