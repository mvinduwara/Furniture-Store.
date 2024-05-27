<?php
require "./content/connection.php";
session_start();

if (isset($_SESSION["user"])) {
    $user_id = $_SESSION["user"]["user_id"];

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
                                            <a href="#download" data-toggle="tab"><i class="fa fa-cloud-download"></i> Download</a>
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
                                                        <p>Hello, <strong>Alex Tuntuni</strong> (If Not <strong>Tuntuni !</strong><a href="login-register.html" class="logout"> Logout</a>)</p>
                                                    </div>

                                                    <p class="mb-0">From your account dashboard. you can easily check & view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p>
                                                </div>
                                            </div>
                                            <!-- Single Tab Content End -->
                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h3>Orders</h3>
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
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Aug 22, 2018</td>
                                                                    <td>Pending</td>
                                                                    <td>$3000</td>
                                                                    <td><a href="cart.html" class="check-btn sqr-btn ">View</a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>July 22, 2018</td>
                                                                    <td>Approved</td>
                                                                    <td>$200</td>
                                                                    <td><a href="cart.html" class="check-btn sqr-btn ">View</a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>June 12, 2017</td>
                                                                    <td>On Hold</td>
                                                                    <td>$990</td>
                                                                    <td><a href="cart.html" class="check-btn sqr-btn ">View</a></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade" id="download" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h3>Downloads</h3>
                                                    <div class="myaccount-table table-responsive text-center">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th>Product</th>
                                                                    <th>Date</th>
                                                                    <th>Expire</th>
                                                                    <th>Download</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Haven - Free Real Estate PSD Template</td>
                                                                    <td>Aug 22, 2018</td>
                                                                    <td>Yes</td>
                                                                    <td><a href="#" class="check-btn sqr-btn "><i class="fa fa-cloud-download"></i> Download File</a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>HasTech - Profolio Business Template</td>
                                                                    <td>Sep 12, 2018</td>
                                                                    <td>Never</td>
                                                                    <td><a href="#" class="check-btn sqr-btn "><i class="fa fa-cloud-download"></i> Download File</a></td>
                                                                </tr>
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
                                                                        <button class="check-btn sqr-btn" onclick="userAddressUpdate();">Save Changes</button>
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
                                                                            <label for="Gender" class="required">Gender</label>
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
                                                                            <label for="joined_date" class="required" required>Birth Date</label>
                                                                            <input type="date" id="joined_date" value="<?php echo $user_data["user_birthdate"] ?>" readonly />
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
                                                                    <button class="check-btn sqr-btn " onclick="changeuserdetails()">Save Changes</button>
                                                                </div>

                                                                <!-- password-chamge -->
                                                                <fieldset>
                                                                    <legend>Password change</legend>
                                                                    <div class="single-input-item">
                                                                        <label for="current-pwd" class="required">Current Password</label>
                                                                        <input type="password" id="current-pwd" />
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="single-input-item">
                                                                                <label for="new-pwd" class="required">New Password</label>
                                                                                <input type="password" id="new-pwd" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="single-input-item">
                                                                                <label for="confirm-pwd" class="required">Confirm Password</label>
                                                                                <input type="password" id="confirm-pwd" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                                <div class="single-input-item" >
                                                                    <button class="check-btn sqr-btn"  onclick="changepassword();">Change Password</button>
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