<?php
require "../../viva-project/content/connection.php";
session_start();

if (isset($_SESSION["admin"])) {

?>

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
        <title>parlo</title>

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

    <body class="ltr main-body app sidebar-mini">

        <!--- GLOBAL LOADER -->
        <div id="global-loader">
            <img src="build/assets/img/svgicons/loader.svg" class="loader-img" alt="loader">
        </div>
        <!--- END GLOBAL LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div>
                <!-- MAIN-HEADER -->
                <?php require "./includes/header.php";  ?>
                <!-- END MAIN-HEADER -->

                <!-- MAIN-SIDEBAR -->
                <?php require "./includes/side.php";  ?>
                <!-- END MAIN-SIDEBAR -->

            </div>

            <!-- MAIN-CONTENT -->
            <div class="main-content app-content">
                <div class="main-container container-fluid">

                    <!-- ROW -->
                    <div class="row row-sm mt-3">
                        <div class="col-lg-12  col-md-12 col-sm-12">
                            <div class="card  box-shadow-0 ">
                                <div class="card-header">
                                    <h4 class="card-title mb-1">product Add</h4>
                                    <p class="mb-2">Enter details and images to add products</p>
                                </div>
                                <div class="card-body pt-0">
                                    <form>
                                        <div class="">
                                            <div class="row">

                                                <div class="form-group col-4">
                                                    <label class="form-label">Select Category</label>
                                                    <select class="form-control select2-no-search" data-bs-placeholder="" id="category_id">
                                                        <?php
                                                        $product_category_resultset = Database::search("SELECT * FROM `product_category`");
                                                        $product_count = $product_category_resultset->num_rows;

                                                        for ($i = 0; $i < $product_count; $i++) {
                                                            $product_category_data = $product_category_resultset->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $product_category_data["product_category_id"];  ?>"><?php echo $product_category_data["product_category_name"]; ?></option>

                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="form-group col-4">
                                                    <label class="form-label">Select brand</label>
                                                    <select class="form-control select2-no-search" data-bs-placeholder="" id="brand_id">
                                                        <?php
                                                        $product_detail_resultset = Database::search("SELECT * FROM `product_brand`");
                                                        $product_brand_count = $product_detail_resultset->num_rows;

                                                        for ($i = 0; $i < $product_brand_count; $i++) {
                                                            $product_brand_data = $product_detail_resultset->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $product_brand_data["product_brand_id"];  ?>"><?php echo $product_brand_data["product_brand_type"]; ?></option>
                                                        <?php
                                                        }

                                                        ?>

                                                    </select>
                                                </div>

                                                <div class="form-group col-4">
                                                    <label class="form-label">Select model</label>
                                                    <select class="form-control select2-no-search" data-bs-placeholder="" id="model_id">
                                                        <?php
                                                        $product_model_resultset = Database::search("SELECT * FROM `product_model`");
                                                        $product_model_count = $product_model_resultset->num_rows;

                                                        for ($i = 0; $i < $product_model_count; $i++) {
                                                            $product_model_data = $product_model_resultset->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $product_model_data["product_model_id"];  ?>"><?php echo $product_model_data["product_model_type"];  ?></option>


                                                        <?php
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="exampleInputPassword1">product name</label>
                                                    <input type="text" class="form-control" placeholder="product_name" id="product_name">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="exampleInputPassword1">product title</label>
                                                    <input type="text" class="form-control" placeholder="product_tile" id="product_title">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="exampleInputPassword1">product quantity</label>
                                                    <input type="text" class="form-control" placeholder="product_quantity" id="product_quantity">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="exampleInputPassword1">product designer name</label>
                                                    <input type="text" class="form-control" placeholder="product_designer" id="product_designer_name">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="exampleInputPassword1">product dimention</label>
                                                    <input type="text" class="form-control" placeholder="product_dimention" id="product_dimention">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="exampleInputPassword1">product Type</label>
                                                    <input type="text" class="form-control" placeholder="product_type" id="product_type">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="exampleInputPassword1">product material</label>
                                                    <input type="text" class="form-control" placeholder="product_material" id="product_material">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label for="exampleInputPassword1">product price</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">$</span>
                                                        <input aria-label="Amount (to the nearest dollar)" class="form-control rounded-0" type="text" id="product_price">
                                                        <span class="input-group-text">.00</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="exampleInputPassword1">product delivery fee</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">$</span>
                                                        <input aria-label="Amount (to the nearest dollar)" class="form-control rounded-0" type="text" id="product_deleivery_fee">
                                                        <span class="input-group-text">.00</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="exampleInputPassword1">product adding date</label>
                                                    <div class="input-group">
                                                        <div class="input-group-text">
                                                            <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                                        </div>
                                                        <input class="form-control" placeholder="MM/DD/YYYY" type="date" id="product_adding_date">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group has-danger ">
                                                <label for="form-control">Enter product description</label>
                                                <textarea class="form-control" placeholder="Textarea (invalid state)" required="" rows="3" id="product_description"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <div class="col-12">

                                                    <div class="row">
                                                        <div class="col-3 mb-1">
                                                            <label for="example-fileinput" class="form-label">Image 1</label>
                                                            <input type="file" id="file1" onclick="subimageupload();" class="form-control">
                                                        </div>
                                                        <div class="col-3">
                                                            <label for="example-fileinput" class="form-label">Image 2</label>
                                                            <input type="file" id="file2" onclick="subimageupload2();" class="form-control">
                                                        </div>
                                                        <div class="col-3">
                                                            <label for="example-fileinput" class="form-label">Image 3</label>
                                                            <input type="file" id="file3" onclick="subimageupload3();" class="form-control">
                                                        </div>
                                                        <div class="col-3">
                                                            <label for="example-fileinput" class="form-label">Image 3</label>
                                                            <input type="file" id="file4" onclick="subimageupload4();" class="form-control">
                                                        </div>
                                                    </div>


                                                    <div class="row">

                                                        <div class=" col-12 col-lg-12">
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <img src="resources/img/No-Image.jpg" class="img-fluid rounded-4" style="width: 250px; height: 150px;" id="l0" />
                                                                </div>

                                                                <div class="col-3">
                                                                    <img src="resources/img/No-Image.jpg" class="img-fluid rounded-4" style="width: 250px; height: 150px;" id="j0" />
                                                                </div>

                                                                <div class="col-3">
                                                                    <img src="resources/img/No-Image.jpg" class="img-fluid rounded-4" style="width: 250px; height: 150px;" id="y0" />
                                                                </div>

                                                                <div class="col-3">
                                                                    <img src="resources/img/No-Image.jpg" class="img-fluid rounded-4" style="width: 250px; height: 150px;" id="t0" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>


                                                </div>
                                            </div>


                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3 mb-0" onclick="addproduct()">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END ROW -->

                </div>
            </div>
            <!-- END MAIN-CONTENT -->



            <!-- MAIN-FOOTER -->
            <div class="main-footer">
                <div class="container-fluid pd-t-0 ht-100p">
                    <span> Copyright © <span id="year"></span><span>All rights reserved.</span>
                </div>
            </div>
            <!-- MAIN-FOOTER -->

        </div>
        <!-- END PAGE-->


        <!-- SCRIPTS -->
        <script src="js/script.js"></script>

        <!-- BACK TO TOP -->
        <a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

        <!-- JQUERY MIN JS -->
        <script src="build/assets/plugins/jquery/jquery.min.js"></script>

        <!-- BOOTSTRAP BUNDLE JS -->
        <script src="build/assets/plugins/bootstrap/js/popper.min.js"></script>
        <script src="build/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

        <!-- MOMENT JS -->
        <script src="build/assets/plugins/moment/moment.js"></script>

        <!-- EVA-ICONS JS -->
        <script src="build/assets/plugins/eva-icons/eva-icons.min.js"></script>

        <!-- PERFECT-SCROLLBAR JS  -->
        <script src="build/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="build/assets/plugins/perfect-scrollbar/p-scroll.js"></script>

        <!-- SIDEBAR JS -->
        <script src="build/assets/plugins/sidebar/sidebar.js"></script>
        <script src="build/assets/plugins/sidebar/sidebar-custom.js"></script>

        <!-- SIDEMENU JS -->
        <script src="build/assets/plugins/side-menu/sidemenu.js"></script>

        <!-- INTERNAL DATEPICKER JS -->
        <script src="build/assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>

        <!-- INTERNAL JQUERY.MASKEDINPUT JS -->
        <script src="build/assets/plugins/jquery.maskedinput/jquery.maskedinput.js"></script>

        <!-- INTERNAL SPECTRUM-COLORPICKER JS -->
        <script src="build/assets/plugins/spectrum-colorpicker/spectrum.js"></script>

        <!--  INTERNAL SELECT2 JS -->
        <script src="build/assets/plugins/select2/js/select2.min.js"></script>

        <!-- INTERNAL ION-RANGESLIDER JS -->
        <script src="build/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

        <!-- INTERNAL JQUERY-AMAZEUI DATETIMEPICKER JS -->
        <script src="build/assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>

        <!-- INTERNAL JQUERY-SIMPLE DATETIMEPICKER JS -->
        <script src="build/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>

        <!-- INTERNAL PICKER JS -->
        <script src="build/assets/plugins/pickerjs/picker.min.js"></script>

        <!-- INTERNAL COLORPICKER JS -->
        <script src="build/assets/plugins/colorpicker/pickr.es5.min.js"></script>
        <link rel="modulepreload" href="build/assets/colorpicker.2877cf2e.js" />
        <script type="module" src="build/assets/colorpicker.2877cf2e.js"></script>

        <!-- BOOTSTRAP-DATEPICKER JS -->
        <script src="build/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>

        <!-- INTERNAL FORM-ELEMENTS JS -->
        <link rel="modulepreload" href="build/assets/form-elements.e1397257.js" />
        <script type="module" src="build/assets/form-elements.e1397257.js"></script>


        <!-- STICKY JS -->
        <script src="build/assets/sticky.js"></script>

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

        <!-- SWITCHER JS -->
        <link rel="modulepreload" href="build/assets/switcher.88cd5d65.js" />
        <script type="module" src="build/assets/switcher.88cd5d65.js"></script>

        <!-- END SCRIPTS -->

    </body>


    </html>

<?php
} else {
    header("Location: signin.php");
}
?>