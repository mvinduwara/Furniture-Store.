<?php
require "../../../viva-project/content/connection.php";

$product_id = $_POST["product_id"];
$product_name = $_POST["product_name"];
$product_title = $_POST["product_title"];
$product_dimentions = $_POST["product_dimentions"];
$product_material = $_POST["product_material"];
$product_quantity = $_POST["product_quantity"];
$product_price = $_POST["product_price"];
$product_date = $_POST["product_date"];
$product_designer = $_POST["product_designer"];
$product_description = $_POST["product_description"];

$detail_resultset = Database::search("SELECT * FROM `product` WHERE `product_id` = '" . $product_id . "' ");
$detail_resultset_count = $detail_resultset->num_rows;
if ($detail_resultset_count == 1) {

    if (!isset($_FILES["product_image1"]) && !isset($_FILES["product_image2"]) && !isset($_FILES["product_image3"]) && !isset($_FILES["product_image4"])) {

        Database::iud("UPDATE `product` SET `product_name`='" . $product_name . "',`product_quantity`='" . $product_quantity . "',`product_description`='" . $product_description . "',`product_title`='" . $product_title . "',`product_price`='" . $product_price . "',`product_material`='" . $product_material . "',
`product_designer`='" . $product_designer . "' WHERE `product_id`='" . $product_id . "'");

        echo ("success");

    }

    //image 1
    if (isset($_FILES["product_image1"])) {

        $img1 = $_FILES["product_image1"];
        $file_type = $img1["type"];
        $allowed_image_extentions = array("image/webp");
        if (in_array($file_type, $allowed_image_extentions)) {
            $new_file_type;

            if ($file_type == "image/webp") {
                $new_file_type = ".webp";
            }
            if ($new_file_type == ".webp") {
                $file_name_1 = "..//product_img//path1//" . $product_title . "-" . uniqid() . $new_file_type;
                move_uploaded_file($img1["tmp_name"], $file_name_1);
                Database::iud("UPDATE `product_images` SET `product_image_path01` = '" . $file_name_1 . "' WHERE `product_id` = '" . $product_id . "' ");


                Database::iud("UPDATE `product` SET `product_name`='" . $product_name . "',`product_quantity`='" . $product_quantity . "',`product_description`='" . $product_description . "',`product_title`='" . $product_title . "',`product_price`='" . $product_price . "',`product_material`='" . $product_material . "',
        `product_designer`='" . $product_designer . "' WHERE `product_id`='" . $product_id . "'");

                echo ("success");

            }else {
                echo ("File type of image 1 does not allowed to upload . ");
            }
        } else {
            echo ("File type of image 1 does not allowed to upload . ");
        }
    }

    //image 2
    if (isset($_FILES["product_image2"])) {

        $img2 = $_FILES["product_image2"];
        $file_type = $img2["type"];
        $allowed_image_extentions = array("image/webp");

        if (in_array($file_type, $allowed_image_extentions)) {
            $new_file_type;

            if ($file_type == "image/webp") {
                $new_file_type = ".webp";
            }
            if ($new_file_type == ".webp") {
                $file_name_2 = "..//product_img//path2//." . $product_title . "-" . uniqid() . $new_file_type;
                move_uploaded_file($img2["tmp_name"], $file_name_2);
                Database::iud("UPDATE `product_images` SET `product_image_path02` = '" . $file_name_2 . "' WHERE `product_id` = '" . $product_id . "' ");

                Database::iud("UPDATE `product` SET `product_name`='" . $product_name . "',`product_quantity`='" . $product_quantity . "',`product_description`='" . $product_description . "',`product_title`='" . $product_title . "',`product_price`='" . $product_price . "',`product_material`='" . $product_material . "',
                `product_designer`='" . $product_designer . "' WHERE `product_id`='" . $product_id . "'");

                echo ("success");
            } else {
                echo ("File type of image 2 does not allowed to upload . ");
            }
        } else {
            echo ("File type of image 2 does not allowed to upload . ");
        }
    }

    //image3
    if (isset($_FILES["product_image3"])) {

        $img3 = $_FILES["product_image3"];
        $file_type = $img3["type"];
        $allowed_image_extentions = array("image/webp");

        if (in_array($file_type, $allowed_image_extentions)) {
            $new_file_type;

            if ($file_type == "image/webp") {
                $new_file_type = ".webp";
            }
            if ($new_file_type == ".webp") {
                $file_name_3 = "..//product_img//path3//" . $product_title . "-" . uniqid() . $new_file_type;
                move_uploaded_file($img3["tmp_name"], $file_name_3);
                Database::iud("UPDATE `product_images` SET `product_image_path03` = '" . $file_name_3 . "' WHERE `product_id` = '" . $product_id . "' ");

                Database::iud("UPDATE `product` SET `product_name`='" . $product_name . "',`product_quantity`='" . $product_quantity . "',`product_description`='" . $product_description . "',`product_title`='" . $product_title . "',`product_price`='" . $product_price . "',`product_material`='" . $product_material . "',
                `product_designer`='" . $product_designer . "' WHERE `product_id`='" . $product_id . "'");

                echo ("success");
            } else {
                echo ("File type of image 3 does not allowed to upload . ");
            }
        } else {
            echo ("File type of image 3 does not allowed to upload . ");
        }
    }

    //image4
    if (isset($_FILES["product_image4"])) {

        $img3 = $_FILES["product_image4"];
        $file_type = $img4["type"];
        $allowed_image_extentions = array("image/webp");

        if (in_array($file_type, $allowed_image_extentions)) {
            $new_file_type;

            if ($file_type == "image/webp") {
                $new_file_type = ".webp";
            }
            if ($new_file_type == ".webp") {
                $file_name_4 = "..//product_img//path4//" . $product_title . "-" . uniqid() . $new_file_type;
                move_uploaded_file($img4["tmp_name"], $file_name_4);
                Database::iud("UPDATE `product_images` SET `product_image_path04` = '" . $file_name_4 . "' WHERE `product_id` = '" . $product_id . "' ");


                Database::iud("UPDATE `product` SET `product_name`='" . $product_name . "',`product_quantity`='" . $product_quantity . "',`product_description`='" . $product_description . "',`product_title`='" . $product_title . "',`product_price`='" . $product_price . "',`product_material`='" . $product_material . "',
        `product_designer`='" . $product_designer . "' WHERE `product_id`='" . $product_id . "'");

                echo ("success");
            } else {
                echo ("File type of image 4 does not allowed to upload . ");
            }
        } else {
            echo ("File type of image 4 does not allowed to upload . ");
        }
    }
    
} else {
    echo ("No product to update");
}
