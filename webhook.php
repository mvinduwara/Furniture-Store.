<?php
require __DIR__ . '/vendor/autoload.php';
$stripe_secret_key = "sk_test_51POCJL2Nk5TrDRMKauVeWILmasqokWGaSVbfwatJhaVeXNIeHtL8StifzShLFbnh7C6ljbCqa0oKLKvanRK8owLI00ERQpc88Y";
\Stripe\Stripe::setApiKey($stripe_secret_key);

$endpoint_secret = 'whsec_...'; // Your webhook secret

// Retrieve the request's body and parse it as JSON
$payload = @file_get_contents('php://input');
$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
$event = null;

try {
    $event = \Stripe\Webhook::constructEvent(
        $payload, $sig_header, $endpoint_secret
    );
} catch(\UnexpectedValueException $e) {
    // Invalid payload
    error_log('Unexpected webhook payload: ' . $e->getMessage());
    http_response_code(400);
    exit();
} catch(\Stripe\Exception\SignatureVerificationException $e) {
    // Invalid signature
    error_log('Invalid webhook signature: ' . $e->getMessage());
    http_response_code(400);
    exit();
}

// Handle the event
if ($event['type'] == 'checkout.session.completed') {
    $session = $event['data']['object'];
    $customer_id = $session['customer'];
    $amount_total = $session['amount_total'];

    try {
        // Create an Invoice Item
        \Stripe\InvoiceItem::create([
            'customer' => $customer_id,
            'amount' => $amount_total, // Amount in cents
            'currency' => 'usd',
            'description' => 'Product Purchase',
        ]);

        // Create an Invoice
        $invoice = \Stripe\Invoice::create([
            'customer' => $customer_id,
            'auto_advance' => true, // Automatically finalize the invoice
        ]);

        // Optionally, you can store the invoice ID in your database for later reference
    } catch (\Exception $e) {
        error_log('Error creating invoice: ' . $e->getMessage());
        http_response_code(500);
        exit();
    }
}

http_response_code(200);
?>