<?php 
require "../../../viva-project/content/connection.php";

$user_id = $_GET["user_id"];

// echo($user_id);

$user_resultset = Database::search("SELECT * FROM `user` WHERE `user_id` = '" . $user_id . "'");
$user_count = $user_resultset->num_rows;

$user_address_resultset = Database::search("SELECT * FROM `user_address` WHERE `user_id` = '" . $user_id . "'");
$user_address_count = $user_address_resultset->num_rows;

$user_image_resultset = Database::search("SELECT * FROM `user_profile_image` WHERE `user_id` = '" . $user_id . "'");
$user_image_count = $user_image_resultset->num_rows;

$user_cart = Database::search("SELECT * FROM `product_cart` WHERE `user_id` = '" . $user_id . "'");
$user_cart_count = $user_cart->num_rows;

$user_watchlist = Database::search("SELECT * FROM `product_watchlist` WHERE `user_id` = '" . $user_id . "'");
$user_watchlist_count = $user_watchlist->num_rows; 


if (isset($_GET["user_id"])) {

    if ($user_image_count == 1) {
        Database::iud("DELETE FROM `user_profile_image` WHERE `user_id`='" . $user_id . "'");
    }
}

if (isset($_GET["user_id"])) {

    if ($user_address_count == 1) {
        Database::iud("DELETE FROM `user_address` WHERE `user_id`='" . $user_id . "'");
    }
}

if (isset($_GET["user_id"])) {

    if ($user_cart_count == 1) {
        Database::iud("DELETE FROM `product_cart` WHERE `user_id`='" . $user_id . "'");
    }
}

if (isset($_GET["user_id"])) {

    if ($user_watchlist_count == 1) {
        Database::iud("DELETE FROM `product_watchlist` WHERE `user_id`='" . $user_id . "'");
    }
}



if (isset($_GET["user_id"])) {

    if ($user_count == 1) {
        Database::iud("DELETE FROM `user` WHERE `user_id`='" . $user_id . "'");
    }
}

echo("success");

?>