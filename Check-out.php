<?php
require "./content/connection.php";

$quantity = $_GET["qtr"];
$Product_Name = $_GET["pn"];
$product_ID = $_GET["product_ID"];
$product_price = $_GET["pc"];
$delivery_fee = $_GET["df"];


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

                <div class="checkout-wrap pt-30">
                    <div class="row">


                        <div class="col-lg-6 offset-3">

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
                                                <li>Product Name <span><?php echo $Product_Name  ?> </span></li>
                                            </ul>
                                        </div>
                                        <div class="your-order-middle">
                                            <ul>
                                                <li>Product Quantity <span><?php echo $quantity  ?> </span></li>
                                            </ul>
                                        </div>
                                        <div class="your-order-info order-shipping">
                                            <ul>
                                                <li>Shipping <p><?php echo $delivery_fee  ?> <br></p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="your-order-info order-subtotal">
                                            <ul>
                                                <li>Subtotal <span>Rs <?php echo $product_price  ?>.00</span></li>
                                            </ul>
                                        </div>

                                        <div class="your-order-info order-total">
                                            <ul>
                                                <li>Total <span>Rs.<?php echo $product_price * $quantity + $delivery_fee  ?>.00</span></li>
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
                                <div>
                                    <button onclick="BuyNow('<?php echo $product_ID ?>','<?php echo $Product_Name ?>','<?php echo  $product_price ?>','<?php echo  $quantity ?>','<?php echo  $delivery_fee ?>','<?php echo $product_price * $quantity + $delivery_fee ?>');" type="submit" class="btn btn-danger">Buy Now</button>
                                </div>





                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                    </div>
                    <fieldset class="p-5">
                        <legend>Log In</legend>

                        <div class="single-input-item">
                            <label for="verification_code" class="required">Email</label>
                            <input type="email" id="modalEmail" />
                        </div>
                        <div class="single-input-item">
                            <label for="verification_code" class="required">Password</label>
                            <input type="password" id="modalPassword" />
                        </div>
                        <div class="single-input-item d-flex align-items-center w-100">
                            <input type="checkbox" id="remember_me_modal" value="">
                            <label for="verification_code" class="required">Remember Me</label>
                        </div>
                        <div class="single-input-item">
                            <p id="responseAlert"></p>
                        </div>
                    </fieldset>
                    <div class="single-input-item p-5">
                        <button class="check-btn  btn btn-danger" type="button" onclick="ModalLogIn();">Log In</button>
                        <button id="modalSignUp" class="check-btn sqr-btn btn btn-danger" type="button">Don't Have an Account ? Sign Up</button>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                    </div>
                    <fieldset class="p-5">
                        <legend>Sign Up</legend>

                        <div class="single-input-item">
                            <input type="text" id="user_first_name_modal" placeholder="First Name" required/>
                        </div>
                        <div class="single-input-item mt-1">
                            <input type="text" id="user_last_name_modal" placeholder="Last Name"  required/>
                        </div>
                        <div class="single-input-item mt-1">
                            <input type="email" id="user_email_modal" placeholder="Email"  required/>
                        </div>
                        <div class="single-input-item mt-1">
                            <input type="password" id="user_password_modal" placeholder="Password"  required/>
                        </div>
                        <div class="single-input-item mt-1">
                            <input type="text" id="user_Gender_modal" placeholder="Male/Female"  required/>
                        </div>
                        <div class="single-input-item mt-1">
                            <input type="date" id="user_birthdate_modal" placeholder="Register Data"  required/>
                        </div>
                        <div class="single-input-item mt-1">
                            <input type="text" id="user_phone_modal" placeholder="Phone Number"  required/>
                        </div>
                        <div class="single-input-item mt-1">
                            <p id="responseAlertSignUp"></p>
                        </div>
                    </fieldset>
                    <div class="single-input-item p-5">
                        <button class="check-btn sqr-btn btn btn-danger" type="button" onclick="ModalSignUp();">Sign Up</button>
                        <button id="modalLogIn" class="check-btn sqr-btn btn btn-danger" type="button">Already Have an Account ? Log In</button>

                    </div>
                </div>
            </div>
        </div>

        <!-- compare main wrapper end -->

        <!-- footer-start -->
        <?php require "./content/footer.php"; ?>
        <!-- footer-end-->
    </div>


    <!-- All JS is here
============================================ -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            document.getElementById('modalSignUp').addEventListener('click', function() {
                $('#exampleModal').modal('hide');
                $('#exampleModal2').modal('show');
            })
            document.getElementById('modalLogIn').addEventListener('click', function() {
                $('#exampleModal2').modal('hide');
                $('#exampleModal').modal('show');
            })

        });
    </script>

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