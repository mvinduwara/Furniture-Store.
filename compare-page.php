<?php
require "./content/connection.php";

if (isset($_GET["id"]) && isset($_GET["model"])) {
    $product_id = $_GET["id"];
    $product_model_id = $_GET["model"];

?>

    <!doctype html>
    <html class="no-js" lang="zxx">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Parlo</title>
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
                                            <?php
                                            $product_resultset_01 = Database::search("SELECT * FROM `product` INNER JOIN `product_images` ON `product`.`product_id`=`product_images`.`product_id` 
                                        WHERE `product`.`product_id`='" . $product_id . "' AND `product`.`product_model_has_brand_id` = '" . $product_model_id . "' ");

                                            $product_resultset_02 = Database::search("SELECT * FROM `product` INNER JOIN `product_images` ON `product`.`product_id`=`product_images`.`product_id` 
                                          WHERE `product`.`product_model_has_brand_id` = '" . $product_model_id . "' ORDER BY `product`.`product_model_has_brand_id` DESC");


                                            $product_resultset_data1  = $product_resultset_01->fetch_assoc();
                                            $product_resultset_data2  = $product_resultset_02->fetch_assoc();

                                            ?>

                                            <tr>
                                                <td class="first-column">Product</td>
                                                <td class="product-image-title">
                                                    <a href="product-details.php?id=<?php echo $product_resultset_data1["product_id"]; ?>" class="image">
                                                        <img class="img-fluid" src="product_img/path1/<?php echo $product_resultset_data1["product_image_path01"]; ?>" alt="Compare Product">
                                                    </a>
                                                    <a href="#" class="category"><?php echo $product_resultset_data1["product_name"]; ?></a>
                                                    <a href="single-product-sale.html" class="title"><?php echo $product_resultset_data1["product_title"]; ?></a>
                                                </td>

                                                <td class="product-image-title">
                                                    <a href="product-details.php?id=<?php echo $product_resultset_data2["product_id"]; ?>" class="image">
                                                        <img class="img-fluid" src="product_img/path1/<?php echo $product_resultset_data2["product_image_path01"]; ?>" alt="Compare Product">
                                                    </a>
                                                    <a href="#" class="category"><?php echo $product_resultset_data2["product_name"]; ?></a>
                                                    <a href="single-product-group.html" class="title"><?php echo $product_resultset_data2["product_title"]; ?></a>
</a>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="first-column">Description</td>

                                                <td class="pro-desc">
                                                    <p><?php echo $product_resultset_data1["product_description"]; ?></p>
                                                </td>

                                                <td class="pro-desc">
                                                    <p><?php echo $product_resultset_data2["product_description"]; ?></p>
                                                </td>                                           
                                            </tr>

                                            <tr>
                                                <td class="first-column">Price</td>
                                                <td class="pro-price">RS <?php echo $product_resultset_data1["product_price"]; ?>.00</td>
                                                <td class="pro-price">RS <?php echo $product_resultset_data2["product_price"]; ?>.00</td>
                                            </tr>

                                            <tr>
                                                <td class="first-column">Color</td>
                                                <td class="pro-color">Black</td>
                                                <td class="pro-color">Red</td>
                                            </tr>

                                            <tr>
                                                <td class="first-column">Material</td>
                                                <td class="pro-color"><?php echo $product_resultset_data1["product_material"]; ?></td>
                                                <td class="pro-color"><?php echo $product_resultset_data2["product_material"]; ?></td>                                               
                                            </tr>

                                            

                                            <tr>
                                                <td class="first-column">Dimentions</td>
                                                <td class="pro-color"><?php echo $product_resultset_data1["product_dimentions"]; ?></td>
                                                <td class="pro-color"><?php echo $product_resultset_data2["product_dimentions"]; ?></td>
                                                <!-- <td><a href="cart.html" class="check-btn">Add to Cart</a></td>
                                                <td><a href="cart.html" class="check-btn disabled">Add to Cart</a></td> --> 
                                            </tr>

                                            <tr>
                                                <td class="first-column">Type</td>
                                                <td class="pro-color"><?php echo $product_resultset_data1["product_type"]; ?></td>
                                                <td class="pro-color"><?php echo $product_resultset_data2["product_type"]; ?></td>
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

<?php
}
?>