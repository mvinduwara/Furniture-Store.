<?php
require "../content/connection.php";
session_start();

if (isset($_SESSION["user"])) {
    if (isset($_GET["id"]) && isset($_GET["quantity"])) {

        $product_id = $_GET["id"];
        $product_quantity = $_GET["quantity"];
        $user_id = $_SESSION["user"]["user_id"];

        $cart_resultset = Database::search("SELECT * FROM `product_cart` WHERE `product_id`='" . $product_id . "' AND `user_id`='" . $user_id . "' ");
        $cart_num_count = $cart_resultset->num_rows;


        $product_resultset = Database::search("SELECT * FROM `product` WHERE `product_id`='" . $product_id . "'");
        $product_data = $product_resultset->fetch_assoc();

        $product_qty = $product_data["product_quantity"];
        if($cart_num_count == 1){

            $cart_data = $cart_resultset->fetch_assoc();
            $current_qty = $cart_data["product_cart_quantity"];
            $new_qty =  $product_quantity ;
    
            if($product_qty <= $new_qty){
    
                Database::iud("UPDATE `product_cart` SET `product_cart_quantity`='".$new_qty."' WHERE `product_id`='".$product_id."' AND `user_id`='".$user_id."'");
                echo ("Update Cart");
    
            }else{
                echo ("Invalid Quantity");
            }

        }else{

        Database::iud("INSERT INTO `product_cart`(`product_cart_quantity`,`product_id`,`user_id`) 
        VALUES ('".$product_qty."','".$product_id."','".$user_id."')");
        echo ("Product added to the Cart");

    }
    } else {
        echo ("Something Went Wrong");
    }
} else {
    echo ("Please Log In or Sign Up");
}
