<?php
require "../content/connection.php";

$stock = $_POST["avilability"];
$category = $_POST["category"];

$query = "SELECT * FROM `product`";

if (!empty($stock) && empty($category)) {
    $query .= "WHERE `status_id`='" . $stock . "' ";
} else if ($stock != 0 && empty($category)) {
    $query .= " WHERE `product_category_id` ='" . $category . "' ";
} else if (!empty($stock) && !empty($category)) {
    $query .= " WHERE `status_id` = '" . $stock . "' AND `product_category_id` = '" . $category . "'";
}

?>

<div class="shop-bottom-area mt-35" >
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

                $product_resulset = Database::search($query. " LIMIT " .$results_per_page." OFFSET ".$page_results." ");
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
                                        <a href="product-details.php?id=<?php echo $product_image_data["product_id"]; ?>" class="ht-product-image"> <img src="./parlo-dashboard/<?php echo $product_image_data["product_image_path01"]; ?>" alt="Universal Product Style"> </a>
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