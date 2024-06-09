<?php

require "./content/connection.php";

function createOrder($orderID, $product_price)
{
    $order_ID = $orderID;
    // $product_price = '1200.00';
    $product_price = floatval($product_price);

    $date = new DateTime();
    $formattedDate = $date->format('Y-m-d H:i:s');

    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {

            $item_id = intval($item['product_id']);

            Database::iud("INSERT INTO purchsed_history (order_id, purchased_history_amount, purchased_history_date, product_id, user_id)
            VALUES ('" . $order_ID . "', '" . $product_price . "', '" . $formattedDate . "', '" . $item_id . "', '" . $_SESSION['user']['user_id'] . "')");
        }
    }else if (isset($_SESSION['order'])) {

            Database::iud("INSERT INTO purchsed_history (order_id, purchased_history_amount, purchased_history_date, product_id, user_id)
            VALUES ('" . $order_ID . "', '" . $product_price . "', '" . $formattedDate . "', '" . $_SESSION['order']['product_id']. "', '" . $_SESSION['user']['user_id'] . "')");
        
    }

    unset($_SESSION['cart']);
    unset($_SESSION['order']);
}
