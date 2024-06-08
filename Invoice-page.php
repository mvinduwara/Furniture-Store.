<?php

require "./content/connection.php";
session_start();

if (isset($_SESSION["user"])) {

    $user = $_SESSION["user"];

    if (isset($_GET["order_ID"])) {

        $orderID = $_GET["order_ID"];

        $rs = Database::search("SELECT * FROM purchsed_history 
                                    INNER JOIN product ON product.product_id=purchsed_history.product_id 
                                    INNER JOIN product_images ON product.product_id=product_images.product_id 
                                    INNER JOIN user ON user.user_id=purchsed_history.user_id
                                    INNER JOIN user_address ON user_address.user_id=user.user_id
                                    INNER JOIN city ON city.city_id=user_address.city_id
                                    WHERE user.user_id ='" . $user["user_id"] . "' AND purchsed_history.order_id ='" . $orderID . "';");
        $num = $rs->num_rows;

        if ($num > 0) {
            $results = [];
            while ($row = $rs->fetch_assoc()) {
                $results[] = $row;
            }

            $d = $results[0];
?>

            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Parlo | Invoice</title>
                <!-- Bootstrap CSS -->
                <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
            </head>

            <body style="font-family: Arial, sans-serif;">


                <div style="background-color: #f8f9fa; padding: 20px; text-align: center;">
                    <img src="resources/img/logo.png" alt="Company Logo" style="height: 20px;">
                </div>

                <div class="container">
                    <div class="row row-sm">
                        <div class="col-md-12 col-xl-12">
                            <div class="main-content-body-invoice">
                                <!-- Rest of your content here -->
                                <div class="row row-sm">
                                    <div class="col-md-12 col-xl-12">
                                        <div class=" main-content-body-invoice">
                                            <div class="card card-invoice">
                                                <div class="card-body">

                                                    <div class="invoice-header">
                                                        <h1 class="invoice-title" style="font-family: 'Courier New', Courier, monospace;font-weight: bold;">Invoice</h1>
                                                        <div class="billed-from">
                                                            <h6>Parlo, Inc<?php    ?></h6>
                                                            <p>201 Something St., Something Town, YT 242, Country 6546<br>
                                                                Tel No: 0712739342<br>
                                                                Email: parloemail@companyname.com</p>
                                                        </div>
                                                    </div>

                                                    <div class="row mg-t-20">

                                                        <div class="col-md">
                                                            <label class="tx-gray-600 fw-600" style="font-family: 'Courier New', Courier, monospace;font-weight: bold;">Billed To</label>
                                                            <div class="billed-to">
                                                                <h6><?php echo $d["user_firstname"]; ?> <?php echo $d["user_firstname"]; ?></h6>
                                                                <p><?php echo $d["user_address_number"]; ?>,<?php echo $d["user_address_line01"]; ?>,<?php echo $d["user_address_line02"]; ?>,<?php echo $d["user_address_postalcode"]; ?><br>
                                                                    <?php echo $d["city_name"]; ?><br>
                                                                    <?php echo $d["user_contact"]; ?><br>
                                                                    <?php echo $d["user_email"]; ?></p>
                                                            </div>
                                                        </div>

                                                        <div class="col-md" style="text-align: right;">
                                                            <label class="tx-gray-600" style="font-family: 'Courier New', Courier, monospace;font-weight: bold;">Invoice Information</label>
                                                            <p class="invoice-info-row"><span>Invoice No:</span> <span><?php echo $orderID; ?></span></p>
                                                            <p class="invoice-info-row"><span>Issue Date:</span> <span><?php echo $d["purchased_history_date"]; ?></span></p>
                                                        </div>

                                                    </div>
                                                    <div class="table-responsive mg-t-40">
                                                        <table class="table table-invoice border text-md-nowrap mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th class="wd-20p">Product Id</th>
                                                                    <th class="c">Product Image</th>
                                                                    <th class="tx-center">Product Name</th>
                                                                    <th class="tx-right">Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <?php
                                                                foreach ($results as $item) {
                                                                ?>
                                                                    <tr>
                                                                        <td><?php echo $item["product_id"]; ?></td>
                                                                        <td class="tx-12 p-2">
                                                                            <img src="product_img/path1/<?php echo $item["product_image_path01"] ?>" width="100%" height="100px" />
                                                                        </td>
                                                                        <td class="tx-center"><?php echo $item["product_name"] ?></td>
                                                                        <td class="tx-right"><?php echo $item["product_price"] ?></td>
                                                                    </tr>
                                                                <?php
                                                                }
                                                                ?>

                                                                <tr>
                                                                    <td class="tx-right tx-uppercase tx-bold tx-inverse">Total</td>
                                                                    <td class="tx-right" colspan="2">
                                                                        <h4 class="tx-primary tx-bold"><?php echo $d['purchased_history_amount']?></h4>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <a href="javascript:void(0);" class="btn btn-danger float-end mt-3 ms-2" onclick="javascript:window.print();">
                                                        <i class="mdi mdi-printer me-1"></i>Print
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-danger float-end mt-3 ms-2" onclick="pagedirecting();">
                                                        <i class="mdi mdi-printer me-1"></i>Cancel
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- COL-END -->
                                </div>
                            </div>
                        </div><!-- COL-END -->
                    </div>
                </div>

                <div style="background-color: #f8f9fa; padding: 20px; text-align: center;">
                    <p style="color: #6f42c1;">Contact us at: youremail@company.com | Phone: 123-456-7890</p>
                </div>

                <!-- script-files -->
                <script src="assets/js/script.js"></script>

                <!-- Bootstrap JS -->
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            </body>

            </html>
<?php
        }
    } else {
        header("location: cart.php");
    }
} else {
    header("location: login-register.php");
}
?>