<?php
require "../../../viva-project/content/connection.php";

$category_id = $_POST["category_id"];
$brand_id = $_POST["brand_id"];
$model_id = $_POST["model_id"];
$product_name = $_POST["product_name"];
$product_title = $_POST["product_title"];
$product_dimention = $_POST["product_dimention"];
$product_material = $_POST["product_material"];
$product_price = $_POST["product_price"];
$date = new DateTime();
$currentdate = $date->format('Y-m-d' . ' H:i:s');
$product_description = $_POST["product_description"];
$product_designer_name = $_POST["product_designer_name"];
$product_quantity = $_POST["product_quantity"];
$product_deleivery_fee = $_POST["product_deleivery_fee"];
$product_type = $_POST["product_type"];

if (empty($product_name)) {
    echo ("please enter product name");
} else if (empty($product_title)) {
    echo ("please enter product title");
} else if (empty($product_dimention)) {
    echo ("please enter product dimention");
} else if (empty($product_material)) {
    echo ("please enter product material");
} else if (empty($product_price)) {
    echo ("please enter product price");
} else if (empty($product_description)) {
    echo ("please enter product description1");
} else if (empty($product_designer_name)) {
    echo ("please enter product designer name");
} else if (empty($product_quantity)) {
    echo ("please enter product quantity");
} else if (empty($product_deleivery_fee)) {
    echo ("please enter product deleivery fee");
} else if (empty($product_type)) {
    echo ("please enter product type");
} else if (!isset($_FILES["file1"])) {
    echo ("please select image 1");
} else if (!isset($_FILES["file2"])) {
    echo ("please select image 2");
} else if (!isset($_FILES["file3"])) {
    echo ("please select image 3");
} else if (!isset($_FILES["file4"])) {
    echo ("please select image 4");
} else {

    if (isset($_FILES["file1"]) && isset($_FILES["file2"]) && isset($_FILES["file3"]) && isset($_FILES["file4"])) {

        if (isset($_FILES["file1"])) {

            $img1 = $_FILES["file1"];
            $file_type = $img1["type"];
            $allowed_image_extentions = array("image/webp");
            if (in_array($file_type, $allowed_image_extentions)) {
                $new_file_type;

                if ($file_type == "image/webp") {
                    $new_file_type = ".webp";
                }
                if ($new_file_type == ".webp") {
                    $file_name_1 = "../product_img/path1/" . $product_title . "-" . $new_file_type;
                } else {
                    echo ("File type of image 1 is not allowed to upload.");
                }
            } else {
                echo ("File type of image 1 is not allowed to upload.");
            }
        }
        if (isset($_FILES["file2"])) {

            $img2 = $_FILES["file2"];
            $file_type = $img2["type"];
            $allowed_image_extentions = array("image/webp");
            if (in_array($file_type, $allowed_image_extentions)) {
                $new_file_type;

                if ($file_type == "image/webp") {
                    $new_file_type = ".webp";
                }
                if ($new_file_type == ".webp") {
                    $file_name_2 = "../product_img/path2/" . $product_title . "-" . $new_file_type;
                } else {
                    echo ("File type of image 2 is not allowed to upload.");
                }
            } else {
                echo ("File type of image 2 is not allowed to upload.");
            }
        }
        if (isset($_FILES["file3"])) {

            $img3 = $_FILES["file3"];
            $file_type = $img3["type"];
            $allowed_image_extentions = array("image/webp");
            if (in_array($file_type, $allowed_image_extentions)) {
                $new_file_type;

                if ($file_type == "image/webp") {
                    $new_file_type = ".webp";
                }
                if ($new_file_type == ".webp") {
                    $file_name_3 = "../product_img/path3/" . $product_title . "-" . $new_file_type;
                } else {
                    echo ("File type of image 3 is not allowed to upload.");
                }
            } else {
                echo ("File type of image 3 is not allowed to upload.");
            }
        }
        if (isset($_FILES["file4"])) {

            $img4 = $_FILES["file4"];
            $file_type = $img4["type"];
            $allowed_image_extentions = array("image/webp");
            if (in_array($file_type, $allowed_image_extentions)) {
                $new_file_type;

                if ($file_type == "image/webp") {
                    $new_file_type = ".webp";
                }
                if ($new_file_type == ".webp") {
                    $file_name_4 = "../product_img/path4/" . $product_title . "-" . $new_file_type;
                } else {
                    echo ("File type of image 4 is not allowed to upload.");
                }
            } else {
                echo ("File type of image 4 is not allowed to upload.");
            }
        }

        if ($_FILES["file1"]["type"] == "image/webp" ) {
            move_uploaded_file($img1["tmp_name"], $file_name_1);
            move_uploaded_file($img2["tmp_name"], $file_name_2);
            move_uploaded_file($img3["tmp_name"], $file_name_3);
            move_uploaded_file($img4["tmp_name"], $file_name_4);

                Database::iud("INSERT INTO `product` (`product_name`, `product_quantity`, `product_description`, `product_title`, `product_price`, `product_datetime_added`, `product_material`, `product_dimentions`, `product_type`, `product_designer`, `product_category_id`, `product_delivery_fee`, `status_id`,`product_model_has_brand_id`) 
                VALUES ('" . $product_name . "', '" . $product_quantity . "', '" . $product_description . "', '" . $product_title . "', '" . $product_price . "', '".$currentdate."', '" . $product_material . "', '" . $product_dimention . "', '" . $product_type . "', '" . $product_designer_name . "', '" . $category_id . "', '" . $product_deleivery_fee . "','1','1')");

                $product_new_id = Database::$connection->insert_id;

                Database::iud("INSERT INTO `product_images` (`product_image_path01`, `product_image_path02`, `product_image_path03`, `product_image_path04`, `product_id`) 
VALUES ('" . $file_name_1 . "', '" . $file_name_2 . "', '" . $file_name_3 . "', '" . $file_name_4 . "', '" . $product_new_id . "')");

            
        }
    }
}
?>
