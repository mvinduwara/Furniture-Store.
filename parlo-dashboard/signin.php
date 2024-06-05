<!DOCTYPE html>
<html lang="en" dir="ltr">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Valex - Larvel Admin Dashboard Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="admin dashboard, admin dashboard laravel, admin panel template, blade template, blade template laravel, bootstrap template, dashboard laravel, laravel admin, laravel admin dashboard, laravel admin panel, laravel admin template, laravel bootstrap admin template, laravel bootstrap template, laravel template">

    <!-- FAVICON -->
    <link rel="icon" href="build/assets/img/brand/favicon.png" type="image/x-icon">

    <!-- TITLE -->
    <title> parlo </title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="build/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- ICONS CSS -->
    <link href="build/assets/iconfonts/icons.css" rel="stylesheet">

    <!-- ANIMATE CSS -->
    <link href="build/assets/iconfonts/animate.css" rel="stylesheet">

    <!-- APP SCSS & APP CSS -->
    <link rel="preload" as="style" href="build/assets/app.373b329f.css" />
    <link rel="preload" as="style" href="build/assets/app.dc980a30.css" />
    <link rel="stylesheet" href="build/assets/app.373b329f.css" />
    <link rel="stylesheet" href="build/assets/app.dc980a30.css" />


</head>

<body class="login-img">


    <div class="ltr error-page1 main-body bg-light text-dark error-3">

        <!-- PAGE -->

        <div class="page">

            <div class="container-fluid">
                <div class="row no-gutter">

                    <!-- The image half -->
                    <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                        <div class="row wd-100p mx-auto text-center">
                            <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                                <img src="build/assets/img/pngs/8.png" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                            </div>
                        </div>
                    </div>

                    <!-- The content half -->
                    <div class="col-md-6 col-lg-6 col-xl-5 bg-white py-4">
                        <div class="login d-flex align-items-center py-2">
                            <!-- Demo content-->
                            <div class="container p-0">
                                <div class="row">
                                    <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                        <div class="card-sigin">

                                            <div class="mb-5 d-flex">
                                                <a href="index.html"><img src="resources/img/logo.png" class="sign-favicon-a ht-40" alt="logo">
                                                    <img src="resources/img/logo.png" class="sign-favicon-b ht-40" alt="logo">
                                                </a>
                                            </div>

                                            <div class="card-sigin">
                                                <div class="main-signup-header">
                                                    <h2 class="text-danger">Welcome back!</h2>
                                                    <h5 class="fw-semibold mb-4">Please sign in to continue.</h5>
                                                    <form>

                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input class="form-control" placeholder="Enter your email" type="email" id="admin_email">
                                                        </div>

                                                        <a class="btn btn-danger btn-block" onclick="adminsignin();">Verify</a>
                                                    </form>
                                                </div>
                                            </div>

                                            <!-- modal-start -->
                                            <div class="modal" id="modaldemo1">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content modal-content-demo">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title">Admnin Verification</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <input class="form-control" placeholder="Enter your code" type="text" id="admin_verification_code">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn ripple btn-danger" type="button" onclick="admin_verify();">Verify</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- modal-end -->


                                        </div>
                                    </div>
                                </div>
                            </div><!-- End -->
                        </div>
                    </div><!-- End -->
                </div>
            </div>

        </div>

        <!-- END PAGE-->
    </div>

    <!-- SCRIPTS -->
    <script src="js/script.js"></script>

    <!-- JQUERY JS -->
    <script src="build/assets/plugins/jquery/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="build/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="build/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- MOMENT JS -->
    <script src="build/assets/plugins/moment/moment.js"></script>

    <!-- PERFECT-SCROLLBAR JS -->
    <script src="build/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <!-- EVA-ICONS JS -->
    <script src="build/assets/plugins/eva-icons/eva-icons.min.js"></script>


    <!-- THEMECOLOR JS -->
    <link rel="modulepreload" href="build/assets/themecolor.90b8af41.js" />
    <link rel="modulepreload" href="build/assets/switcher-styles.4356da03.js" />
    <link rel="modulepreload" href="build/assets/apexcharts.common.556c9c64.js" />
    <script type="module" src="build/assets/themecolor.90b8af41.js"></script>

    <!-- APP JS -->
    <link rel="modulepreload" href="build/assets/app.2478bfa4.js" />
    <link rel="modulepreload" href="build/assets/switcher-styles.4356da03.js" />
    <link rel="modulepreload" href="build/assets/apexcharts.common.556c9c64.js" />
    <script type="module" src="build/assets/app.2478bfa4.js"></script>

    <!-- END SCRIPTS -->

</body>

<!-- Mirrored from laravelui.spruko.com/valex/signin by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 May 2024 16:20:00 GMT -->

</html>