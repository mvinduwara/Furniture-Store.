<?php 
require "../content/connection.php";

if(isset($_GET["id"])){
    $product_cart_id = $_GET["id"];

    Database::iud("DELETE FROM `product_cart` WHERE `product_id`='".$product_cart_id."' ");

    echo ("Product has been removed");

}else{
    echo ("something went wrong");
}

?>