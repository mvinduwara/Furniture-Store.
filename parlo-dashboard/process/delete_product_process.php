<?php 

require "../../../viva-project/content/connection.php";

$product_id = $_GET["product_id"];

$product_image_resultset = Database::search("SELECT * FROM `product_images` WHERE `product_id` = '" . $product_id . "'");
$product_image_count = $product_image_resultset->num_rows;

$product_resultset = Database::search("SELECT * FROM `product` WHERE `product_id` = '" . $product_id . "'");
$product_count = $product_resultset->num_rows;



if (isset($_GET["product_id"])) {

    if ($product_image_count == 1) {
        Database::iud("DELETE FROM `product_images` WHERE `product_id`='" . $product_id . "'");
    }
}

if (isset($_GET["product_id"])) {
    if ($product_count == 1) {
        Database::iud("DELETE FROM `product` WHERE `product_id`='" . $product_id . "'");
    }

}

echo ("success");

?>