<?php
require "../content/connection.php";

$review_text = $_POST["review_text"];
$review_name = $_POST["review_name"];
$review_email = $_POST["review_email"];
$product_id = $_POST["product_id"];

// echo("review_text: " . $review_text . " review_name: " . $review_name . " review_email: " . $review_email);
    Database::iud("INSERT INTO `product_review` (`product_review_description`, `product_review_email`, `product_review_name`,`product_id`)
    VALUES ('" . $review_text . "', '" . $review_email . "', '" . $review_name . "','" . $product_id . "')");

    echo ("Success");
