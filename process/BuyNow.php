<?php

session_start();

$id = $_POST['id'];
$productName = $_POST['productName'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$delivery_fee = $_POST['delivery_fee'];
$total_price = $_POST['total_price'];

$data = array(
    'id' => $id,
    'productName' => $productName,
    'price' => $price,
    'quantity' => $quantity,
    'delivery_fee' => $delivery_fee,
    'total_price' => $total_price
);

$_SESSION['order'] = $data;

if (isset($_SESSION['order'])) {
    if (isset($_SESSION['user'])) {
        echo "success";
    } else {
        echo "Failed user.";
    }
} else {
    echo "Failed order.";
}
