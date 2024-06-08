<?php

require "./content/connection.php";

function createOrder($orderID, $product_price)
{
    $order_ID = $orderID;
    // $product_price = '1200.00';
    $product_price = floatval($product_price);

    $date = new DateTime();
    $formattedDate = $date->format('Y-m-d H:i:s');

    if (isset($_SESSION['order']) && is_array($_SESSION['order'])) {
        foreach ($_SESSION['order'] as $item) {

            $item_id=intval($item['id']);

            Database::iud("INSERT INTO purchsed_history (order_id, purchased_history_amount, purchased_history_date, product_id, user_id)
            VALUES ('" . $order_ID . "', '" . $product_price . "', '" . $formattedDate . "', '".$item_id."', '" . $_SESSION['user']['user_id'] . "')");
        }
    } else {
        // Handling the case when $_SESSION['order'] is not an array
        Database::iud("INSERT INTO purchsed_history (order_id, purchased_history_amount, purchased_history_date, product_id, user_id)
            VALUES ('" . $order_ID . "', '" . $product_price . "', '" . $formattedDate . "', '10', '" . $_SESSION['user']['user_id'] . "')");
    }

    unset($_SESSION['order']);
}
