<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Parlo - eCommerce Bootstrap 4 Template</title>
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
                        <li class="active">compare page </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--navigation-section-end-->

        <!-- compare main wrapper start -->
        <div class="compare-page-wrapper pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Compare Page Content Start -->
                        <div class="compare-page-content-wrap">
                            <div class="compare-table table-responsive">
                                <table class="table table-bordered mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="first-column">Product</td>
                                            <td class="product-image-title">
                                                <a href="single-product.html" class="image">
                                                    <img class="img-fluid" src="assets/img/product/product-1.jpg" alt="Compare Product">
                                                </a>
                                                <a href="#" class="category">Chair</a>
                                                <a href="single-product-sale.html" class="title">Demo Product Name</a>
                                            </td>
                                            <td class="product-image-title">
                                                <a href="single-product.html" class="image">
                                                    <img class="img-fluid" src="assets/img/product/product-2.jpg" alt="Compare Product">
                                                </a>
                                                <a href="#" class="category">Lamp </a>
                                                <a href="single-product-group.html" class="title">Demo Product Name</a>
                                            </td>
                                            <td class="product-image-title">
                                                <a href="single-product.html" class="image">
                                                    <img class="img-fluid" src="assets/img/product/product-3.jpg" alt="Compare Product">
                                                </a>
                                                <a href="#" class="category">Chair</a>
                                                <a href="single-product.html" class="title">Demo Product Name</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="first-column">Description</td>
                                            <td class="pro-desc">
                                                <p>Samsome Note Book Pro 5 is an the best Laptop on this budgeted. You can satisfied
                                                    after usign this laptop. It’s performance is awesome.</p>
                                            </td>
                                            <td class="pro-desc">
                                                <p>Samsome Note Book Pro 5 is an the best Laptop on this budgeted. You can satisfied
                                                    after usign this laptop. It’s performance is awesome.</p>
                                            </td>
                                            <td class="pro-desc">
                                                <p>Samsome Note Book Pro 5 is an the best Laptop on this budgeted. You can satisfied
                                                    after usign this laptop. It’s performance is awesome.</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="first-column">Price</td>
                                            <td class="pro-price">$295</td>
                                            <td class="pro-price">$275</td>
                                            <td class="pro-price">$395</td>
                                        </tr>
                                        <tr>
                                            <td class="first-column">Color</td>
                                            <td class="pro-color">Black</td>
                                            <td class="pro-color">Red</td>
                                            <td class="pro-color">Blue</td>
                                        </tr>
                                        <tr>
                                            <td class="first-column">Stock</td>
                                            <td class="pro-stock">In Stock</td>
                                            <td class="pro-stock">Stock Out</td>
                                            <td class="pro-stock">In Stock</td>
                                        </tr>
                                        <tr>
                                            <td class="first-column">Add to cart</td>
                                            <td><a href="cart.html" class="check-btn">Add to Cart</a></td>
                                            <td><a href="cart.html" class="check-btn disabled">Add to Cart</a></td>
                                            <td><a href="cart.html" class="check-btn">Add to Cart</a></td>
                                        </tr>
                                        <tr>
                                            <td class="first-column">Rating</td>
                                            <td class="pro-ratting">
                                                <i class="sli sli-star"></i>
                                                <i class="sli sli-star"></i>
                                                <i class="sli sli-star"></i>
                                                <i class="sli sli-star"></i>
                                                <i class="sli sli-star"></i>
                                            </td>
                                            <td class="pro-ratting">
                                                <i class="sli sli-star"></i>
                                                <i class="sli sli-star"></i>
                                                <i class="sli sli-star"></i>
                                                <i class="sli sli-star"></i>
                                                <i class="sli sli-star"></i>
                                            </td>
                                            <td class="pro-ratting">
                                                <i class="sli sli-star"></i>
                                                <i class="sli sli-star"></i>
                                                <i class="sli sli-star"></i>
                                                <i class="sli sli-star"></i>
                                                <i class="sli sli-star"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="first-column">Remove</td>
                                            <td class="pro-remove">
                                                <button><i class="sli sli-trash"></i></button>
                                            </td>
                                            <td class="pro-remove">
                                                <button><i class="sli sli-trash"></i></button>
                                            </td>
                                            <td class="pro-remove">
                                                <button><i class="sli sli-trash"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Compare Page Content End -->
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