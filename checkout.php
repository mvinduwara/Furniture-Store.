<?php
require "./content/connection.php";
session_start();

if (isset($_SESSION["user"]) && isset($_POST["delivery"]) && isset($_POST["sub_total"])) {

    $user_id = $_SESSION["user"]["user_id"];
    $delivery = $_POST["delivery"];
    $sub_total = $_POST["sub_total"];
    $quantity = $_POST["quantity"];

?>
    <!doctype html>
    <html lang="zxx">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Parlo | Checkout</title>
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

            <div class="breadcrumb-area pt-35 pb-35 bg-gray">
                <div class="container">
                    <div class="breadcrumb-content text-center">
                        <ul>
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li class="active">Checkout </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- compare main wrapper start -->
            <div class="checkout-main-area pt-70 pb-70">
                <div class="container">
                    <div class="customer-zone mb-20">
                        <p class="cart-page-title">Returning customer? <a class="checkout-click1" href="#">Click here to login</a></p>
                        <div class="checkout-login-info">
                            <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing & Shipping section.</p>
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="sin-checkout-login">
                                            <label>Username or email address <span>*</span></label>
                                            <input type="text" name="user-name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="sin-checkout-login">
                                            <label>Passwords <span>*</span></label>
                                            <input type="password" name="user-password">
                                        </div>
                                    </div>
                                </div>
                                <div class="button-remember-wrap">
                                    <button class="button" type="submit">Login</button>
                                    <div class="checkout-login-toggle-btn">
                                        <input type="checkbox">
                                        <label>Remember me</label>
                                    </div>
                                </div>
                                <div class="lost-password">
                                    <a href="#">Lost your password?</a>
                                </div>
                            </form>
                            <div class="checkout-login-social">
                                <span>Login with:</span>
                                <ul>
                                    <li><a href="#">Facebook</a></li>
                                    <li><a href="#">Twitter</a></li>
                                    <li><a href="#">Google</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="customer-zone mb-20">
                        <p class="cart-page-title">Have a coupon? <a class="checkout-click3" href="#">Click here to enter your code</a></p>
                        <div class="checkout-login-info3">
                            <form action="#">
                                <input type="text" placeholder="Coupon code">
                                <input type="submit" value="Apply Coupon">
                            </form>
                        </div>
                    </div>
                    <?php
                    $user_detail_resulset = Database::search("SELECT * FROM `user` WHERE `user_id` = '" . $user_id . "'");
                    $user_detail_count = $user_detail_resulset->num_rows;


                    for ($i = 0; $i < $user_detail_count; $i++) {
                        $user_detail_data = $user_detail_resulset->fetch_assoc();

                        $user_address_resultset = Database::search("SELECT * FROM `user_address` WHERE `user_id` = '" . $user_id . "'");
                        $user_address_data = $user_address_resultset->fetch_assoc();
                    ?>


                        <div class="checkout-wrap pt-30">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="billing-info-wrap mr-50">
                                        <h3>Billing Details</h3>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="billing-info mb-20">
                                                    <label>First Name <abbr class="required" title="required">*</abbr></label>
                                                    <input type="text" value="<?php echo $user_detail_data["user_firstname"]; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="billing-info mb-20">
                                                    <label>Last Name <abbr class="required" title="required">*</abbr></label>
                                                    <input type="text" value="<?php echo $user_detail_data["user_lastname"]; ?>">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="billing-info mb-20">
                                                    <label>Street Address <abbr class="required" title="required">*</abbr></label>
                                                    <input class="billing-address" placeholder="House number and street name" type="text" value="<?php echo $user_address_data["user_address_number"], '' . $user_address_data["user_address_line01"] . ' ' . $user_address_data["user_address_line02"]; ?>">
                                                    <input placeholder="Apartment, suite, unit etc." type="text" value="<?php echo $user_address_data["user_address_postalcode"];  ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="billing-info mb-20">
                                                    <label>Phone <abbr class="required" title="required">*</abbr></label>
                                                    <input type="text" value="<?php echo $user_detail_data["user_contact"];  ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="billing-info mb-20">
                                                    <label>Email Address <abbr class="required" title="required">*</abbr></label>
                                                    <input type="text" value="<?php echo $user_detail_data["user_email"]; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="additional-info-wrap">
                                            <label>Order notes</label>
                                            <textarea placeholder="Notes about your order, e.g. special notes for delivery. " name="message"></textarea>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-5">

                                    <div class="your-order-area">
                                        <h3>Your order</h3>
                                        <div class="your-order-wrap gray-bg-4">
                                            <div class="your-order-info-wrap">
                                                <div class="your-order-info">
                                                    <ul>
                                                        <li>Product <span>Total</span></li>
                                                    </ul>
                                                </div>
                                                <div class="your-order-middle">
                                                    <ul>
                                                        <li>Product Quantity <span><?php echo $quantity ?> </span></li>
                                                    </ul>
                                                </div>
                                                <div class="your-order-info order-subtotal">
                                                    <ul>
                                                        <li>Subtotal <span>Rs <?php echo $sub_total ?>.00</span></li>
                                                    </ul>
                                                </div>
                                                <div class="your-order-info order-shipping">
                                                    <ul>
                                                        <li>Shipping <p><?php echo $delivery ?> <br></p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="your-order-info order-total">
                                                    <ul>
                                                        <li>Total <span>Rs.<?php echo $sub_total + $delivery ?></span></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="payment-method">
                                                <div class="pay-top sin-payment">
                                                    <input id="payment-method-2" class="input-radio" type="radio" value="cheque" name="payment_method">
                                                    <label for="payment-method-2">Check payments</label>
                                                    <div class="payment-box payment_method_bacs">
                                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <form action="check.php" method="POST">
                                            <input type="hidden" name="delivery" value="<?php echo $delivery ?> ">
                                            <input type="hidden" name="total" value="<?php echo $sub_total + $delivery ?>">
                                            <input type="hidden" name="quantity" value="<?php echo $quantity ?> ">
                                            <button type="submit" class="btn btn-danger">Link Text</button>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>


                </div>
            </div>
            <!-- compare main wrapper end -->

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
    header("location:login-register.php");
}
?>