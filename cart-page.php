<?php
require "./content/connection.php";
session_start();

if (isset($_SESSION["user"])) {
    $user_id = $_SESSION["user"]["user_id"];

    if (isset($_GET["id"])) {
        $product_id = $_GET["id"];

        $tatal = 0;
        $sub_total = 0;
        $shipping = 0;

?>

        <!doctype html>
        <html class="no-js" lang="zxx">


        <!-- Mirrored from demo.hasthemes.com/parlo/parlo/cart-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2024 06:17:38 GMT -->

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
                                                    <tr>
                                                        <td class="product-thumbnail">
                                                            <a href="#"><img src="assets/img/cart/cart-3.jpg" alt=""></a>
                                                        </td>
                                                        <td class="product-name"><a href="#">Product Name</a></td>
                                                        <td class="product-price-cart"><span class="amount">$260.00</span></td>
                                                        <td class="product-quantity">1</td>
                                                        <td class="product-subtotal">$110.00</td>
                                                        <td class="product-remove">
                                                            <a href="#"><i class="sli sli-close"></i></a>
                                                        </td>
                                                    </tr>
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
                                        <div class="col-lg-4 col-md-6">
                                            <!-- <div class="cart-tax">
                                                <div class="title-wrap">
                                                    <h4 class="cart-bottom-title section-bg-gray">Estimate Shipping And Tax</h4>
                                                </div>
                                                <div class="tax-wrapper">
                                                    <p>Enter your destination to get a shipping estimate.</p>
                                                    <div class="tax-select-wrapper">
                                                        <div class="tax-select">
                                                            <label>
                                                                * Country
                                                            </label>
                                                            <select class="email s-email s-wid">
                                                                <option>Bangladesh</option>
                                                                <option>Albania</option>
                                                                <option>Åland Islands</option>
                                                                <option>Afghanistan</option>
                                                                <option>Belgium</option>
                                                            </select>
                                                        </div>
                                                        <div class="tax-select">
                                                            <label>
                                                                * Region / State
                                                            </label>
                                                            <select class="email s-email s-wid">
                                                                <option>Bangladesh</option>
                                                                <option>Albania</option>
                                                                <option>Åland Islands</option>
                                                                <option>Afghanistan</option>
                                                                <option>Belgium</option>
                                                            </select>
                                                        </div>
                                                        <div class="tax-select">
                                                            <label>
                                                                * Zip/Postal Code
                                                            </label>
                                                            <input type="text">
                                                        </div>
                                                        <button class="cart-btn-2" type="submit">Get A Quote</button>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                        <!--                                         
                                        <div class="col-lg-4 col-md-6">
                                            <div class="discount-code-wrapper">
                                                <div class="title-wrap">
                                                    <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                                                </div>
                                                <div class="discount-code">
                                                    <p>Enter your coupon code if you have one.</p>
                                                    <form>
                                                        <input type="text" required="" name="name">
                                                        <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> -->

                                        <div class="col-lg-4 col-md-12">
                                            <div class="grand-totall">
                                                <div class="title-wrap">
                                                    <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                                </div>
                                                <h5>Total products <span>$260.00</span></h5>
                                                <div class="total-shipping">
                                                    <h5>Total shipping</h5>
                                                    <ul>
                                                        <li><input type="checkbox"> Standard <span>$20.00</span></li>
                                                        <li><input type="checkbox"> Express <span>$30.00</span></li>
                                                    </ul>
                                                </div>
                                                <h4 class="grand-totall-title">Grand Total <span>$260.00</span></h4>
                                                <a href="#">Proceed to Checkout</a>
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


        <!-- Mirrored from demo.hasthemes.com/parlo/parlo/cart-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2024 06:17:38 GMT -->

        </html>

    <?php
    }
    ?>

<?php
} else {
    header("Location:login-register.php");
}
?>