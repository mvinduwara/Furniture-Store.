<?php
require "./content/connection.php";
session_start();

if (isset($_SESSION["user"])) {
    $user_id = $_SESSION["user"]["user_id"];
    $user_firstname = $_SESSION["user"]["user_firstname"];
    $user_lastname = $_SESSION["user"]["user_lastname"];

    $user_resultset = Database::search("SELECT * FROM `user` WHERE `user_id` = '" . $user_id . "'");
    $user_count = $user_resultset->num_rows;

?>

    <!doctype html>
    <html class="no-js" lang="zxx">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Parlo | My account</title>
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
                            <li class="active">My account </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--navigation-section-end-->

            <!-- my account wrapper start -->
            <div class="my-account-wrapper pt-100 pb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- My Account Page Start -->
                            <div class="myaccount-page-wrapper">
                                <!-- My Account Tab Menu Start -->
                                <div class="row">
                                    <div class="col-lg-3 col-md-4">
                                        <div class="myaccount-tab-menu nav" role="tablist">
                                            <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>
                                                Dashboard</a>
                                            <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>
                                            <a href="#download" data-toggle="tab"><i class="fa fa-cloud-download"></i> Invoice</a>
                                            <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i> Payment
                                                Method</a>
                                            <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i> address</a>
                                            <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Account Details</a>
                                            <a onclick="signout();"><i class="fa fa-sign-out"></i> Logout</a>
                                        </div>
                                    </div>
                                    <!-- My Account Tab Menu End -->
                                    <!-- My Account Tab Content Start -->
                                    <div class="col-lg-9 col-md-8">
                                        <div class="tab-content" id="myaccountContent">
                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h3>Dashboard</h3>
                                                    <div class="welcome">
                                                        <p>Hello, <strong><?php echo $user_firstname . ' ' . $user_lastname ?></strong></p>
                                                    </div>

                                                    <p class="mb-0">From your account dashboard. you can easily check & view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p>
                                                </div>
                                            </div>
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h3>Purchased History</h3>
                                                    <div class="myaccount-table table-responsive text-center">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th>Order</th>
                                                                    <th>Date</th>
                                                                    <th>Status</th>
                                                                    <th>Total</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <?php
                                                                $user_puchesed_history = Database::search("SELECT * FROM `purchsed_history` WHERE `user_id` = '" . $user_id . "'");
                                                                $user_puchesed_history_count = $user_puchesed_history->num_rows;

                                                                if ($user_puchesed_history_count > 0) {
                                                                    for ($i = 0; $i < $user_puchesed_history_count; $i++) {
                                                                        $y = $i + 1;
                                                                        $user_puchesed_history_data = $user_puchesed_history->fetch_assoc();
                                                                ?>

                                                                        <tr>
                                                                            <td><?php echo $y  ?></td>
                                                                            <td><?php echo $user_puchesed_history_data["order_id"]  ?></td>
                                                                            <td><?php echo $user_puchesed_history_data["purchased_history_date"]  ?></td>
                                                                            <td><?php echo $user_puchesed_history_data["purchased_history_amount"]  ?></td>
                                                                            <td><?php echo $user_puchesed_history_data["product_id"]  ?></td>
                                                                        </tr>

                                                                    <?php
                                                                    }
                                                                } else {
                                                                    // If no data is available
                                                                    ?>
                                                                    <tr>
                                                                        <td colspan="5">
                                                                            <p>No Invoice yet</p>
                                                                        </td>
                                                                    </tr>
                                                                <?php
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade" id="download" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h3>Invoice History</h3>
                                                    <div class="myaccount-table table-responsive text-center">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th>Order Id</th>
                                                                    <th>Date</th>
                                                                    <th>quantity</th>
                                                                    <th>Amount</th>
                                                                    <th>product Id</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $user_invoice_resulset = Database::search("SELECT * FROM `invoice` WHERE `user_id` = '" . $user_id . "'");
                                                                $user_invoice_count = $user_invoice_resulset->num_rows;

                                                                if ($user_invoice_count > 0) {
                                                                    // If data is available
                                                                    for ($i = 0; $i < $user_invoice_count; $i++) {
                                                                        $user_invoice_data = $user_invoice_resulset->fetch_assoc();
                                                                ?>
                                                                        <tr>
                                                                            <td><?php echo $user_invoice_data["order_id"]  ?></td>
                                                                            <td><?php echo $user_invoice_data["date"] ?></td>
                                                                            <td><?php echo $user_invoice_data["product_quantity"]   ?></td>
                                                                            <td><?php echo $user_invoice_data["tatal_amount"]  ?></td>
                                                                            <td><?php echo $user_invoice_data["product_id"]  ?></td>
                                                                        </tr>
                                                                    <?php
                                                                    }
                                                                } else {
                                                                    // If no data is available
                                                                    ?>
                                                                    <tr>
                                                                        <td colspan="4">
                                                                            <p>No Invoice yet</p>
                                                                        </td>
                                                                    </tr>
                                                                <?php
                                                                }
                                                                ?>
                                                            </tbody>

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Tab Content End -->

                                            <!-- payment Tab Content Start -->
                                            <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h3>Payment Method</h3>
                                                    <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                                                </div>
                                            </div>
                                            <!-- payment Tab Content End -->

                                            <?php
                                            $user_address_resultset = Database::search("SELECT * FROM `user_address` INNER JOIN `city` ON `user_address`.`city_id`=`city`.`city_id` WHERE `user_id` = '" . $user_id . "'");
                                            $user_address_count = $user_address_resultset->num_rows;

                                            for ($i = 0; $i < $user_address_count; $i++) {
                                                $user_address_data = $user_address_resultset->fetch_assoc();

                                                if ($user_address_count == 0) {
                                            ?>

                                                    <!-- address Tab Content Start -->
                                                    <div class="tab-pane fade" id="address-edit" role="tabpanel">

                                                        <div class="myaccount-content">
                                                            <address>
                                                                <p><strong>Enter Your Address</strong></p>
                                                            </address>
                                                        </div>

                                                        <div class="myaccount-content">
                                                            <h3>Edit your address Details</h3>

                                                            <div class="col-12">
                                                                <p id="responseAlert"></p>
                                                            </div>

                                                            <div class="account-details-form">
                                                                <form action="">
                                                                    <div class="row">

                                                                        <div class="col-lg-6">
                                                                            <div class="single-input-item">
                                                                                <label for="Address_number" class="required">Address number</label>
                                                                                <input type="text" id="Address_number"> />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <div class="single-input-item">
                                                                                <label for="Address_line01" class="required">Address line 01</label>
                                                                                <input type="text" id="Address_line01" />
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="single-input-item">
                                                                        <label for="Address_line02" class="required">Address Line 02</label>
                                                                        <input type="text" id="Address_line02" />
                                                                    </div>

                                                                    <div class="single-input-item">
                                                                        <label for="postal_code" class="required">Country Code</label>
                                                                        <input type="text" id="postal_code" />
                                                                    </div>

                                                                    <div class="single-input-item">
                                                                        <button class="check-btn sqr-btn" onclick="userAddressUpdate();">Save Changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Address Tab Content End -->

                                                <?php
                                                } else {
                                                ?>


                                                    <!-- address Tab Content Start -->
                                                    <div class="tab-pane fade" id="address-edit" role="tabpanel">

                                                        <div class="myaccount-content">
                                                            <address>
                                                                <p><strong>Alex Tuntuni</strong></p>
                                                                <p><?php echo $user_address_data['user_address_number']; ?><br>
                                                                    <?php echo $user_address_data['user_address_line01']; ?><br>
                                                                    <?php echo $user_address_data['user_address_line02']; ?></p>
                                                                <p>City: <?php echo $user_address_data['city_name']; ?> <span><?php echo $user_address_data['user_address_postalcode']; ?> </span></p>
                                                            </address>
                                                        </div>

                                                        <div class="myaccount-content">
                                                            <h3>Edit your address Details</h3>

                                                            <div class="col-12">
                                                                <p id="responseAlert"></p>
                                                            </div>

                                                            <div class="account-details-form">
                                                                <form action="">
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="single-input-item">
                                                                                <label for="Address_number" class="required">Address number</label>
                                                                                <input type="text" id="Address_number" value="<?php echo $user_address_data['user_address_number']; ?>" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <div class="single-input-item">
                                                                                <label for="Address_line01" class="required">Address line 01</label>
                                                                                <input type="text" id="Address_line01" value="<?php echo $user_address_data['user_address_line01']; ?>" />
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="single-input-item">
                                                                        <label for="Address_line02" class="required">Address Line 02</label>
                                                                        <input type="text" id="Address_line02" value="<?php echo $user_address_data['user_address_line02']; ?>" />
                                                                    </div>

                                                                    <div class="single-input-item">
                                                                        <label for="postal_code" class="required">Country Code</label>
                                                                        <input type="text" id="postal_code" value="<?php echo $user_address_data['user_address_postalcode']; ?>" />
                                                                    </div>

                                                                    <div class="single-input-item">
                                                                        <button class="check-btn sqr-btn" type="button" onclick="userAddressUpdate(<?php echo $user_address_data['user_id']; ?>);">Save Changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Address Tab Content End -->



                                                <?php
                                                }
                                                ?>


                                            <?php
                                            }
                                            ?>

                                            <?php
                                            for ($i = 0; $i < $user_count; $i++) {
                                                $user_data = $user_resultset->fetch_assoc();

                                            ?>
                                                <!-- account detail Tab Content Start -->
                                                <div class="tab-pane fade" id="account-info" role="tabpanel">
                                                    <div class="myaccount-content">
                                                        <h3>Account Details</h3>

                                                        <div class="col-12">
                                                            <p id="responseAlert2"></p>
                                                        </div>

                                                        <div class="account-details-form">
                                                            <form action="#">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="single-input-item">
                                                                            <label for="first_name" class="required">First Name</label>
                                                                            <input type="text" id="first_name" value="<?php echo $user_data["user_firstname"] ?>" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <div class="single-input-item">
                                                                            <label for="last_name" class="required">Last Name</label>
                                                                            <input type="text" id="last_name" value="<?php echo $user_data["user_lastname"] ?>" />
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="single-input-item">
                                                                            <label for="contact_number" class="required">Contact Number</label>
                                                                            <input type="text" id="contact_number" value="<?php echo $user_data["user_contact"] ?>" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <div class="single-input-item">
                                                                            <label for="email" class="required">Email Address</label>
                                                                            <input type="text" id="email" value="<?php echo $user_data["user_email"] ?>" />
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="single-input-item">
                                                                            <label for="Gender" class="required">Gender(male/female)</label>
                                                                            <input type="text" id="Gender" value="<?php echo $user_data["user_gender"] ?>" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <div class="single-input-item">
                                                                            <label for="joined_date" class="required">joined Date</label>
                                                                            <input type="date" id="joined_date" value="<?php echo $user_data["user_joined_date"] ?>" readonly />
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="single-input-item">
                                                                            <label for="birth_date" class="required" required>Birth Date</label>
                                                                            <input type="date" id="birth_date" value="<?php echo $user_data["user_birthdate"] ?>" readonly />
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="single-input-item">
                                                                    <label for="display-name" class="required">Display Name</label>
                                                                    <input type="text" id="display-name" value="<?php echo $user_data["user_firstname"] . " " . $user_data["user_lastname"] ?>" readonly />
                                                                </div>

                                                                <div class="single-input-item">
                                                                    <label for="password" class="required">Current password</label>
                                                                    <input type="text" id="password" value="<?php echo $user_data["user_password"] ?>" readonly />
                                                                </div>

                                                                <div class="single-input-item">
                                                                    <button class="check-btn sqr-btn" type="button" onclick="changeuserdetails()">Save Changes</button>
                                                                </div>

                                                                <!-- password-chamge -->
                                                                <fieldset>
                                                                    <legend>Password change</legend>

                                                                    <div class="col-12">
                                                                        <p id="responseAlert3"></p>
                                                                    </div>

                                                                    <div class="single-input-item">
                                                                        <label for="current_pwd" class="required">Current Password</label>
                                                                        <input type="password" id="current_pwd" />
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="single-input-item">
                                                                                <label for="new_pwd" class="required">New Password</label>
                                                                                <input type="password" id="new_pwd" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="single-input-item">
                                                                                <label for="confirm_pwd" class="required">Confirm Password</label>
                                                                                <input type="password" id="confirm_pwd" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                                <div class="single-input-item">
                                                                    <button class="check-btn sqr-btn" type="button" onclick="changepassword();">Change Password</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- account detail Tab Content End -->

                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <!-- My Account Tab Content End -->
                                </div>
                            </div>
                            <!-- My Account Page End -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- my account wrapper end -->

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