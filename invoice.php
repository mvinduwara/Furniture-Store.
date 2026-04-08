<?php 
require __DIR__ . '/vendor/autoload.php'; 
$stripe_secret_key = "sk_test_51POCJL2Nk5TrDRMKauVeWILmasqokWGaSVbfwatJhaVeXNIeHtL8StifzShLFbnh7C6ljbCqa0oKLKvanRK8owLI00ERQpc88Y"; 
\Stripe\Stripe::setApiKey($stripe_secret_key); 

if (isset($_GET['session_id'])) { 
    $checkout_session_id = $_GET['session_id']; 
    try { 
        $checkout_session = \Stripe\Checkout\Session::retrieve($checkout_session_id); 

        // Retrieve the total amount from the checkout session
        $amount_total = $checkout_session->amount_total;

        echo "<h1>Invoice Details</h1>"; 
        echo "<p>Checkout Session ID: " . $checkout_session_id . "</p>"; 
        echo "<p>Total Amount: $" . number_format($amount_total / 100, 2) . "</p>"; 
        echo "<p>Customer: " . $checkout_session->customer_details['name'] . "</p>"; 
        echo "<p>Email: " . $checkout_session->customer_details['email'] . "</p>"; 
    } catch (\Exception $e) { 
        error_log('Error retrieving checkout session: ' . $e->getMessage());
        echo "Error retrieving invoice details. Please try again later.";
    } 
} else { 
    echo "Checkout Session ID not found in query string"; 
} 
?>