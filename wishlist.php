<?php
require "./content/connection.php";
session_start();

if (isset($_SESSION["user"])) {
    $user_id = $_SESSION["user"]["user_id"];


?>

    <!doctype html>
    <html class="no-js" lang="zxx">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Parlo | Wishlist</title>
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
                            <li class="active">wishlist </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--navigation-section-end-->

            <div class="cart-main-area pt-95 pb-100">
                <div class="container">
                    <h3 class="cart-page-title">Your watchlist items</h3>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                            <?php
                            $watchlist_resultset = Database::search("SELECT * FROM `product_watchlist` WHERE `user_id` = '" . $user_id . "'");
                            $watchlist_num = $watchlist_resultset->num_rows;

                            for ($i = 0; $i < $watchlist_num; $i++) {
                                $user_watchlist_data = $watchlist_resultset->fetch_assoc();

                                $product_resulset = Database::search("SELECT * FROM `product` WHERE `product_id` = '" . $user_watchlist_data["product_id"] . "' ");
                                $product_data = $product_resulset->fetch_assoc();

                                $product_image_resultset = Database::search("SELECT * FROM `product_images` WHERE `product_id` = '" . $user_watchlist_data["product_id"] . "' ");
                                $product_image_data = $product_image_resultset->fetch_assoc();

                                if ($watchlist_num == 0) {

                            ?>
                                    <div class="customer-zone mb-20 p-5">
                                        <p class="cart-page-title">you have no item add to watchlist yet? <a class="checkout-click1" href="shop.php">Click here to shop</a></p>
                                    </div>


                                <?php
                                } else {
                                ?>
                                    <form action="#">
                                        <div class="table-content table-responsive cart-table-content">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Product Name</th>
                                                        <th>Until Price</th>
                                                        <th>Qty</th>
                                                        <th>Subtotal</th>
                                                        <th>Add To Cart</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td class="product-thumbnail">
                                                            <?php
                                                            if (empty($product_image_data["product_image_path01"])) {
                                                            ?>
                                                                <a href="#"><img src="resources/img/No-Image.jpg" alt=""></a>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <a href=" #"><img src="product_img/path1/<?php echo $product_image_data["product_image_path01"]; ?>" alt="" style="width: 90px; height: 90px;"></a>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="product-name"><a href="#"><?php echo $product_data["product_name"];  ?></a></td>
                                                        <td class="product-price-cart"><span class="amount">Rs <?php echo $product_data["product_price"];  ?>.00</span></td>
                                                        <td class="product-quantity">
                                                            <div class="cart-plus-minus">
                                                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1">
                                                            </div>
                                                        </td>
                                                        <td class="product-subtotal">Rs <?php echo $product_data["product_price"];  ?>.00</td>
                                                        <td class="product-wishlist-cart">
                                                            <a href="#" onclick="addToCart(<?php echo $product_data['product_id']; ?>, document.querySelector('.cart-plus-minus-box').value);">add to cart</a>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </form>

                                <?php
                                }
                                ?>

                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>

            <!-- footer-start -->
            <?php require "./content/footer.php"; ?>
            <!-- footer-end-->

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