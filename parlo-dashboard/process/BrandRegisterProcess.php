<?php 

require "../../../viva-project/content/connection.php";

$add_brand = $_POST["add_brand"];

//echo($cat);

if (empty($add_brand)) {
    echo ("Enter Category Name");
} else if (strlen($add_brand) > 20) {
    echo ("Category Name Should Be Less Than 20 Characters");
} else {

    $brand_resultset = Database::search("SELECT * FROM product_brand WHERE product_brand_type = '" . $add_brand . "'");
    $brand_count = $brand_resultset->num_rows;

    if ($brand_count > 0) {
        echo ("brand Name Already Exists");
    } else {
        Database::iud("INSERT INTO product_brand (product_brand_type) VALUES ('" . $add_brand . "')");
        echo ("Success");
    }
}

?>