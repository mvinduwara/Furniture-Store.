<?php
require "../content/connection.php";

$id = $_POST["id"];

$product_resultset = Database::search("SELECT * FROM `product`
INNER JOIN `product_images` ON `product_images`.`product_id`=`product`.`product_id`
 WHERE `product`.`product_id`='" . $id . "'");

$product_result_count = $product_resultset->num_rows;

if ($product_result_count == 1) {
    $product_data = $product_resultset->fetch_assoc();
    echo json_encode($product_data);
} else {
    echo ("Error");
}
