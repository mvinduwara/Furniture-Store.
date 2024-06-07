<?php 

require "../../../viva-project/content/connection.php";

$add_model = $_POST["add_model"];

//echo($cat);

if (empty($add_model)) {
    echo ("Enter Model Name");
} else if (strlen($add_model) > 20) {
    echo ("Model Name Should Be Less Than 20 Characters");
} else {

    $model_resultset = Database::search("SELECT * FROM product_model WHERE product_model_type = '" . $add_model . "'");
    $model_count = $model_resultset->num_rows;

    if ($model_count > 0) {
        echo ("model Name Already Exists");
    } else {
        Database::iud("INSERT INTO product_model (product_model_type) VALUES ('" . $add_model . "')");
        echo ("Success");
    }
}

?>