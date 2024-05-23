<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Parlo | Login</title>
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

    <!--navigation-section-start-->
    <div class="wrapper">
        <div class="breadcrumb-area pt-35 pb-35 bg-gray">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">login / register </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--navigation-section-end-->

        <div class="login-register-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-toggle="tab" href="#lg1">
                                    <h4> login </h4>
                                </a>
                                <a data-toggle="tab" href="#lg2">
                                    <h4> register </h4>
                                </a>
                            </div>

                            <!-- login-form start -->
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <!-- form-start -->
                                            <form action="#" method="post">
                                                <input type="text" name="user-name" placeholder="Username">
                                                <input type="password" name="user-password" placeholder="Password">
                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                        <input type="checkbox">
                                                        <label>Remember me</label>
                                                        <a href="#">Forgot Password?</a>
                                                    </div>
                                                    <button type="submit" onclick="login();">Login</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- login-form end -->

                                <!-- registration-form-start -->
                                <div id="lg2" class="tab-pane">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <!-- form-start -->
                                            <form action="#" method="post">
                                                <input type="text" name="user-name" placeholder="First Name">
                                                <input type="text" name="user-name" placeholder="Last Name">
                                                <input name="user-email" placeholder="Email" type="email">
                                                <input type="password" name="user-password" placeholder="Password">
                                                <input name="user-Gender" placeholder="Gender" type="text">
                                                <input name="user-phone" placeholder="Phone" type="text">
                                                <div class="button-box">
                                                    <button type="submit">Register</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- registration-form-end -->

                            </div>
                        </div>
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