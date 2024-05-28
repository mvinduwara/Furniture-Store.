<?php
session_start();
require "../content/connection.php";

if (isset($_SESSION["user"])) {
    $user_id = $_SESSION["user"]["user_id"];

    $user_first_name = $_POST["user_first_name"];
    $user_last_name = $_POST["user_last_name"];
    $user_contact_number = $_POST["user_contact_number"];
    $user_email = $_POST["user_email"];
    $user_Gender = $_POST["user_Gender"];

    $user_detail_resultset = Database::search("SELECT * FROM `user` WHERE `user_id`='" . $user_id . "'");
    $user_detail_count = $user_detail_resultset->num_rows;

    if ($user_detail_count == 1) {

        Database::iud("UPDATE `user` SET `user_firstname`='" . $user_first_name . "',`user_lastname`='" . $user_last_name . "',
        `user_email`='" . $user_email . "',`user_contact`='" . $user_contact_number . "',`user_gender`='" . $user_Gender . "' WHERE `user_id` = '" . $user_id . "' ");

        echo ("success");

    } else {

        Database::iud("INSERT INTO `user`(`user_id`,`user_firstname`,`user_lastname`,`user_email`,`user_contact`,`user_gender`,`) 
        VALUES ('" . $user_id . "','" . $user_first_name . "','" . $user_last_name . "','" . $user_email . "','" . $user_contact_number . "','" . $user_Gender . "')");

        echo ("success");
        
    }

} else {
    echo ("Please Log In or Sign Up");
}

?>
