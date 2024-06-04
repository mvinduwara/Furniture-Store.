<?php
require "./content/connection.php";
?>

<!doctype html>
<html lang="zxx">

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

<body onload="advanced_search()">
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

        <div class="shop-area pt-95 pb-100" >
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <div class="shop-top-bar">
                            <div class="select-shoing-wrap">
                                <p>Showing 1–12 of 20 result</p>
                            </div>

                        </div>

                        <div class="shop-bottom-area mt-35" id="product_selected">
                            <div class="tab-content jump">
                                <div id="shop-1" class="tab-pane active">

                                    <div class="row ht-products">
                                        <?php
                                        if (isset($_GET["page"])) {
                                            $pageno = $_GET["page"];
                                        } else {
                                            $pageno = 1;
                                        }

                                        $results_per_page = 9;
                                        $page_results = ($pageno - 1) * $results_per_page;

                                        $product_resulset = Database::search("SELECT * FROM product LIMIT $results_per_page OFFSET $page_results");
                                        $product_count_resulset = Database::search("SELECT COUNT(*) AS total FROM product");
                                        $product_count_data = $product_count_resulset->fetch_assoc();
                                        $product_count = $product_count_data['total'];

                                        $number_of_pages = ceil($product_count / $results_per_page);

                                        while ($product_list_data = $product_resulset->fetch_assoc()) {
                                        ?>
                                            <!--Product card Start-->
                                            <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6">
                                                <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                                                    <div class="ht-product-inner">
                                                        <div class="ht-product-image-wrap">
                                                            <?php
                                                            $product_data_id = $product_list_data['product_id'];
                                                            $product_image_resultset = Database::search("SELECT * FROM product_images WHERE product_id='" . $product_data_id . "' ");
                                                            $product_image_data = $product_image_resultset->fetch_assoc();

                                                            if (empty($product_image_data["product_image_path01"])) {
                                                            ?>
                                                                <a href="#" class="ht-product-image"> <img src="resources/img/No-Image.jpg" alt="Universal Product Style" style="height: 150px;"> </a>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <a href="product-details.php?id=<?php echo $product_image_data["product_id"]; ?>" class="ht-product-image"> <img src="product_img/path1/<?php echo $product_image_data["product_image_path01"]; ?>" alt="Universal Product Style"> </a>
                                                            <?php
                                                            }
                                                            ?>

                                                            <div class="ht-product-action">
                                                                <ul>
                                                                    <li><a href="#" data-toggle="modal" data-target="#exampleModal"><i class="sli sli-magnifier"></i><span class="ht-product-action-tooltip">Quick View</span></a></li>
                                                                    <li><a href="wishlist.html"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip">Add to Wishlist</span></a></li>
                                                                    <li><a href="compare-page.php?id=<?php echo $product_list_data["product_id"]; ?>&model=<?php echo $product_list_data['product_model_has_brand_id']; ?>"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip">Add to Compare</span></a></li>
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
                                                            <?php if ($product_list_data["status_id"] == 1) { ?>
                                                                <span class="text-success">Available</span>
                                                            <?php } else { ?>
                                                                <span class="text-danger">Not Available</span>
                                                            <?php } ?>
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
                                        <?php } ?>
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
                                    for ($page = 1; $page <= $number_of_pages; $page++) {
                                        if ($pageno == $page) {
                                    ?>
                                            <li><a class="active" href="?page=<?php echo $page; ?>"><?php echo $page; ?></a></li>
                                        <?php
                                        } else {
                                        ?>
                                            <li><a href="?page=<?php echo $page; ?>"><?php echo $page; ?></a></li>
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
                    <div class="col-lg-3" >
                        <div class="sidebar-style mr-30" id="product_search_parent">
                            <div class="sidebar-widget">
                                <h4 class="pro-sidebar-title">Search</h4>

                                <div class="pro-sidebar-search mb-50 mt-25">
                                    <div class="pro-sidebar-search-form">
                                        <input type="text" placeholder="Search here..." id="search_input" onkeypress="search(event);">         
                                    </div>
                                </div>

                            </div>
                            <div class="sidebar-widget">
                                <h4 class="pro-sidebar-title">Availability </h4>
                                <div class="sidebar-widget-list mt-30">
                                    <ul>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value="2" id="ofs" name="availabilty"> <a href="">Out of stock </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value="1" id="is" name="availabilty"> <a href="#">In Stock </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" id="clear01"> <a href="">Clear All </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="sidebar-widget mt-45">
                                <h4 class="pro-sidebar-title">Filter By Price </h4>
                                <div class="sidebar-widget-list mt-30">
                                    <ul>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value="1" id="lth" > <a href="#">Low to Hight </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value="2" id="htl"> <a href="#">Hight to Low </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" id="clear02"> <a href="#">Clear All </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>


                            <div class="sidebar-widget mt-50">
                                <h4 class="pro-sidebar-title">Category </h4>
                                <div class="sidebar-widget-list mt-20">
                                    <ul>
                                        <?php
                                        $category_resultset = Database::search("SELECT * FROM `product_category`");
                                        $category_count = $category_resultset->num_rows;

                                        for ($x = 0; $x < $category_count; $x++) {
                                            $category_data = $category_resultset->fetch_assoc();

                                        ?>

                                            <li>
                                                <div class="sidebar-widget-list-left">
                                                    <input type="checkbox" value="<?php echo $category_data["product_category_id"]; ?>" id="<?php echo $category_data["product_category_id"];  ?>" name="category"> <a href="#"><?php echo $category_data["product_category_name"];  ?></a>
                                                    <span class="checkmark"></span>
                                                </div>
                                            </li>

                                        <?php
                                        }

                                        ?>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" id="clear03"> <a href="#">Clear All </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- prodct-search-area-end -->
                </div>
            </div>
        </div>

        <!-- footer-section-start -->
        <?php require "./content/footer.php" ?>
        <!-- footer-section-end -->
       
        <script src="assets/js/script.js"></script>
</body>

</html>