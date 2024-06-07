<?php

require "../../../viva-project/content/connection.php";

$product_id = $_GET["product_id"];

$product_image_resultset = Database::search("SELECT * FROM `product_images` WHERE `product_id` = '" . $product_id . "'");
$product_image_count = $product_image_resultset->num_rows;

$product_resultset = Database::search("SELECT * FROM `product` WHERE `product_id` = '" . $product_id . "'");
$product_count = $product_resultset->num_rows;

$user_cart = Database::search("SELECT * FROM `product_cart` WHERE `product_id` = '" . $product_id . "'");
$user_cart_count = $user_cart->num_rows;

$user_watchlist = Database::search("SELECT * FROM `product_watchlist` WHERE `product_id` = '" . $product_id . "'");
$user_watchlist_count = $user_watchlist->num_rows;



if (isset($_GET["product_id"])) {

    if ($product_image_count == 1) {
        Database::iud("DELETE FROM `product_images` WHERE `product_id`='" . $product_id . "'");
    }
}

if (isset($_GET["product_id"])) {

    if ($user_cart_count == 1) {
        Database::iud("DELETE FROM `product_cart` WHERE `product_id`='" . $product_id . "'");
    }
}

if (isset($_GET["product_id"])) {

    if ($user_watchlist_count == 1) {
        Database::iud("DELETE FROM `product_watchlist` WHERE `product_id`='" . $product_id . "'");
    }
}

if (isset($_GET["product_id"])) {
    if ($product_count == 1) {
        Database::iud("DELETE FROM `product` WHERE `product_id`='" . $product_id . "'");
    }
}

echo ("success");
