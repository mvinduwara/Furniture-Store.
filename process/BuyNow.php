<?php
session_start();

require "../content/connection.php";

if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user']['user_id'];

    // Remove or comment out this line
    // $_SESSION['order']='';

    $netTotal = null;

    $id = $_POST['id'];
    $quantity = $_POST['quantity'];
    $delivery_fee = $_POST['delivery_fee'];
    $total_price = $_POST['total_price'];

    $rs = Database::search("SELECT * FROM `product`
                            INNER JOIN `product_images` ON `product_images`.`product_id` = `product`.`product_id`
                            WHERE `product`.`product_id` = '" . $id . "'");

    if ($rs->num_rows == '1') {
        $d = $rs->fetch_assoc();

        $total = $d["product_price"] * $d["product_quantity"];
        $netTotal += $total;

        $_SESSION['order'] = array();

        $_SESSION['order'][] = array(
            "product_id" => $d["product_id"],
            "productName" => $d["product_name"],
            "price" => $d["product_price"]
        );
    }

    if (isset($_SESSION['order'])) {
        if (isset($_SESSION['user'])) {
            echo "success";
        } else {
            echo "Failed user.";
        }
    } else {
        echo "Failed order.";
    }
}
