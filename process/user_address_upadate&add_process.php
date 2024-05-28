<?php
require "../content/connection.php";
session_start();

$user_address_number = $_POST["Address_number"];
$user_address_line01 = $_POST["Address_line01"];
$user_address_line02 = $_POST["Address_line02"];
$user_postalcode = $_POST["postal_code"];
$user_id = $_POST["user_id"];

// echo("address number: " . $user_address_number . " address line 01: " . $user_address_line01 . " address line 02: " . $user_address_line02 . " postal code: " . $user_postalcode . " user id: " . $user_id);

$user_address_resultset = Database::search("SELECT * FROM `user_address` WHERE `user_id`= '" . $user_id . "' ");
$user_address_count = $user_address_resultset->num_rows;

if ($user_address_count == 1) {

    Database::iud("UPDATE `user_address` SET `user_address_number`='" . $user_address_number . "',`user_address_line01`='" . $user_address_line01 . "'
    ,`user_address_line02`='" . $user_address_line02 . "',`user_address_postalcode`='" . $user_postalcode . "'  WHERE `user_id` = '" . $user_id . "' ");

    echo ("success");
} else {

    Database::iud("INSERT INTO `user_address`(`user_address_number`,`user_address_line01`,`user_address_line02`,`user_address_postalcode`,`user_id`) 
    VALUES ('" . $user_address_number . "','" . $user_address_line01 . "','" . $user_address_line02 . "','" . $user_postalcode . "','".$user_id."') ");

    echo ("success");
}
