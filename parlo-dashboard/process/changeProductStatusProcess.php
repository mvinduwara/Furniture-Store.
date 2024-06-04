<?php 
require "../../content/connection.php";

$product_id = $_GET["p"];

$product_resultset = Database::search("SELECT * FROM `product` WHERE `product_id`='".$product_id."' ");

if($product_resultset->num_rows == 1){

    $product_data = $product_resultset->fetch_assoc();
    $status = $product_data["status_id"];

    if($status == 1){
        Database::iud("UPDATE `product` SET `status_id`='2' WHERE `product_id`='".$product_id."'");
        echo ("deactivated");
    }else if($status == 2){
        Database::iud("UPDATE `product` SET `status_id`='1' WHERE `product_id`='".$product_id."'");
        echo ("activated");
    }
}else{
    echo ("Something went wrong. Try again later.");
}





?>