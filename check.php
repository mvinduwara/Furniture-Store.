<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["user"]["user_firstname"])) {
        $username = $_SESSION["user"]["user_lastname"];

        $product_quantity;
        $product_price;
        
        if (isset($_SESSION["order"])) {
            $product_quantity = $_SESSION["order"]["quantity"];
            $product_price = $_SESSION["order"]["total_price"];
        } else {
            $product_quantity = $_POST['quantity'];
            $product_price = $_POST['total'];
        }

        require __DIR__ . '/vendor/autoload.php';

        $stripe_secret_key = "sk_test_51PLoHVGxG440qEZg74pFz4N49WIzdm8sTI61y7ETIV5MRmAZhBFGHcyggGQGyu9bI1716HpjShlBK7J6zF0P2ZbP00RdmruroJ";

        \Stripe\Stripe::setApiKey($stripe_secret_key);


        // $product_delivery = $_POST['delivery'];


        try {

            $checkout_session = \Stripe\Checkout\Session::create([
                "mode" => "payment",
                "success_url" => "http://localhost/clozet/success.php",
                "cancel_url" => "http://localhost/clozet/cancel.php",
                "payment_method_types" => ['card'],

                "line_items" => [
                    [
                        "price_data" => [
                            "currency" => "LKR",
                            "unit_amount" => $product_price,
                            "product_data" => [
                                "name" => $product_quantity,
                            ],
                        ],
                        "quantity" => 1,
                    ]
                ]
            ]);
            http_response_code(303);
            header('Location: ' . $checkout_session->url);
        } catch (\Exception $e) {
            http_response_code(500);
            echo "Error: " . $e->getMessage();
        }
    } else {
    ?>
        <div class="d-flex justify-content-center align-items-center mb-5 mt-5">
            <h4 class="text-right"><b>Please Sign In to your Account first to buy Products...!</b></h4>
        </div>
        <div class="d-flex justify-content-center align-items-center mb-5 mt-5">
            <h5><a href="signin.php">Sign In Here...</a></h5>
        </div>
    <?php
    }
    ?>
</body>

</html>