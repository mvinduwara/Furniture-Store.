<?php

require './process/orderprocess.php';
require __DIR__ . '/vendor/autoload.php';

$stripe_secret_key_checkout = "sk_test_51POCJL2Nk5TrDRMKauVeWILmasqokWGaSVbfwatJhaVeXNIeHtL8StifzShLFbnh7C6ljbCqa0oKLKvanRK8owLI00ERQpc88Y";
$stripe_secret_key_invoice = "sk_test_51POCJL2Nk5TrDRMKauVeWILmasqokWGaSVbfwatJhaVeXNIeHtL8StifzShLFbnh7C6ljbCqa0oKLKvanRK8owLI00ERQpc88Y";

\Stripe\Stripe::setApiKey($stripe_secret_key_checkout);

session_start(); // Start the session 

if (isset($_SESSION['order']) || $_SERVER['REQUEST_METHOD'] === 'POST') {

    $orderID = uniqid();

    if (isset($_SESSION['order'])) {
        $product_name = $_SESSION['order']['productName'];
        $product_price = $_SESSION['order']['price'];
    }

    if (isset($_POST['quantity']) && isset($_POST['total'])) {
        $product_quantity = $_POST['quantity'];
        $product_price = $_POST['total'];
        $product_name = 'product_name';
    }

    try {
        \Stripe\Stripe::setApiKey($stripe_secret_key_invoice);

        $checkout_session = \Stripe\Checkout\Session::create([
            "mode" => "payment",
            "success_url" => "http://localhost/viva-project/invoice-page.php?order_ID=" . $orderID,
            "cancel_url" => "http://localhost/clozet/cancel.php",
            "payment_method_types" => ['card'],
            "line_items" => [
                [
                    "price_data" => [
                        "currency" => "LKR",
                        "unit_amount" => $product_price,
                        "product_data" => [
                            "name" => $product_name,
                        ],
                    ],
                    "quantity" => 100, // Assuming this is correct
                ]
            ]
        ]);
        http_response_code(303);
        createOrder($orderID, $product_price);
        header('Location: ' . $checkout_session->url);
        exit; // Add exit after header redirect to prevent further execution
    } catch (\Exception $e) {
        // Log error to file or database
        http_response_code(500);
        error_log('Error creating checkout session: ' . $e->getMessage());
        // echo "Error processing payment. Please try again later.";
    }
}
