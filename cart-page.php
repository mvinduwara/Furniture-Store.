<?php
require "./content/connection.php";
session_start();

if (isset($_SESSION["user"])) {
    $user_id = $_SESSION["user"]["user_id"];

    if (isset($_SESSION["order"])) {
        unset($_SESSION['order']);
    }

    $tatal = 0;
    $sub_total = 0;

?>

    <!doctype html>
    <html class="no-js" lang="zxx">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Parlo | Cart</title>
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
                            <li class="active">Cart page </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--navigation-section-start-->

            <?php
            $user_cart_resultset = Database::search("SELECT * FROM `product_cart` WHERE `user_id` = '" . $user_id . "'");
            $user_cart_num = $user_cart_resultset->num_rows;

            $total=0;
            if ($user_cart_num == 0) {

            ?>

                <div class="customer-zone mb-20 p-5">
                    <p class="cart-page-title">you have no item add to cart yet? <a class="checkout-click1" href="shop.php">Click here to shop</a></p>
                </div>

            <?php
            } else {
            ?>

                <div class="cart-main-area pt-95 pb-100">
                    <div class="container">
                        <h3 class="cart-page-title">Your cart items</h3>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
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
                                                    <th>action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $user_cart_data_resultset = Database::search("SELECT * FROM `product_cart`
                                                INNER JOIN `product` ON `product`.`product_id` = `product_cart`.`product_id`
                                                INNER JOIN `product_images` ON `product_images`.`product_id` = `product`.`product_id`
                                                 WHERE `user_id`='" . $user_id . "' ");
                                                $user_cart_data_count = $user_cart_data_resultset->num_rows;

                                                for ($i = 0; $i < $user_cart_data_count; $i++) {
                                                    $product_data = $user_cart_data_resultset->fetch_assoc();

                                                    // $sub_total += (((int)$user_cart_data["product_price"]) * ((int)$user_cart_data["product_cart_quantity"]));
                                                    $delivery = ((int)1000) * $user_cart_data_count;
                                                    
                                                    $product_id = $product_data["product_id"];
                                                    $product_name = $product_data["product_name"];
                                                    $product_img = $product_data["product_image_path01"];
                                                    $product_price = $product_data["product_price"];
                                                    $product_quantity = $product_data["product_cart_quantity"];
                                                    $subtotal = $product_price * $product_quantity;
                                                    
                                                    $total+=$subtotal;

                                                    $cart_items[] = array(
                                                        'product_id' => $product_id,
                                                        'product_name' => $product_name,
                                                        'product_img' => $product_img,
                                                        'product_price' => $product_price,
                                                        'product_quantity' => $product_quantity,
                                                        'subtotal' => $subtotal
                                                    );
                                                    $_SESSION['cart'] = $cart_items;
                                                }


                                                foreach ($_SESSION['cart'] as $cart_item) {
                                                ?>

                                                    <tr>
                                                        <td class="product-thumbnail">
                                                            <?php
                                                            if (empty($cart_item["product_img"])) {
                                                            ?>

                                                                <a href="#"><img src="resources/img/No-Image.jpg" alt=""></a>

                                                            <?php
                                                            } else {
                                                            ?>

                                                                <a href="#"><img src="product_img/path1/<?php echo $cart_item["product_img"]; ?>" alt="" style="width: 90px; height: 90px;"></a>

                                                            <?php
                                                            }
                                                            ?>

                                                        </td>
                                                        <td class="product-name"><a href="#"><?php echo $cart_item["product_name"]  ?></a></td>
                                                        <td class="product-price-cart"><span class="amount">RS <?php echo $cart_item["product_price"]  ?>.00</span></td>
                                                        <td class="product-quantity"><?php echo $cart_item["product_quantity"]  ?></td>
                                                        <td class="product-subtotal">RS <?php echo $cart_item["subtotal"]  ?>.00</td>
                                                        <td class="product-remove">
                                                            <a href="#" onclick="removecartproduct(<?php echo $cart_item['product_id']; ?>)"><i class="sli sli-close"></i></a>
                                                        </td>
                                                    </tr>

                                                <?php
                                                }

                                                ?>

                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- cart-table-button-section-start -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="cart-shiping-update-wrapper">
                                                <div class="cart-shiping-update">
                                                    <a href="checkout.php">Continue Shopping</a>
                                                </div>
                                                <div class="cart-clear">
                                                    <a href="shop.php">Update Shopping Cart</a>
                                                    <button href="">Clear Shopping Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- cart-table-button-section-end -->

                                </form>



                                <div class="row" style="justify-content: end;">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="grand-totall">
                                            <div class="title-wrap">
                                                <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                            </div>
                                            <h5>Total products <span><?php echo $user_cart_data_count * ((int)$user_cart_data["product_cart_quantity"]) ?></span></h5>
                                            <div class="total-shipping">
                                                <h5>Total shipping</h5>
                                                <ul>
                                                    <li><input type="checkbox"> SubTatal <span>Rs <?php echo $total  ?>.00</span></li>
                                                    <li><input type="checkbox"> Delivery fee <span><?php echo ((int)$product_data["product_delivery_fee"]) * $user_cart_data_count;   ?></span></li>
                                                </ul>
                                            </div>
                                            <h4 class="grand-totall-title">Grand Total <span>Rs <?php echo ((int)$product_data["product_delivery_fee"]* $user_cart_data_count)+$total; ?>.00</span></h4>

                                            <form action="checkout.php" method="POST">
                                                <input type="hidden" name="delivery" value="<?php echo ((int)$product_data["product_delivery_fee"]) * $user_cart_data_count; ?>">
                                                <input type="hidden" name="sub_total" value="<?php echo $total; ?>">
                                                <input type="hidden" name="quantity" value="<?php echo $user_cart_data_count * ((int)$user_cart_data["product_cart_quantity"]) ?>">
                                                <button type="submit" class="btn btn-danger">Check now</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>

            <!-- footer-start -->
            <?php require "./content/footer.php"; ?>
            <!-- footer-end-->


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