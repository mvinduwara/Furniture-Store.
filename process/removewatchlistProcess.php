<?php 

require "../content/connection.php";

if(isset($_GET["id"])){
    $product_watchlist_id = $_GET["id"];

    Database::iud("DELETE FROM `product_watchlist` WHERE `product_id`='".$product_watchlist_id."' ");

    echo ("Product has been removed");

}else{
    echo ("something went wrong");
}




?>