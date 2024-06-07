<?php

require "../../../viva-project/content/connection.php";

$category = $_POST["add_category"];

if (empty($category)) {
    echo ("Enter Category Name");
} else if (strlen($category) > 20) {
    echo ("Category Name Should Be Less Than 20 Characters");
} else {

    $category_resultset = Database::search("SELECT * FROM product_category WHERE product_category_name = '" . $category . "'");
    $category_count = $category_resultset->num_rows;

    if ($category_count > 0) {
        echo ("category Name Already Exists");
    } else {
        Database::iud("INSERT INTO product_category (product_category_name) VALUES ('" . $category . "')");
        echo ("Success");
    }
}


?>