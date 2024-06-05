<?php
require "../content/connection.php";

$user_first_name = $_POST["user_first_name"];
$user_last_name = $_POST["user_last_name"];
$user_email_address = $_POST["user_email_address"];
$user_password = $_POST["user_password"];
$user_gender = $_POST["user_gender"];
$user_contact = $_POST["user_contact"];
$user_birthdate = $_POST["user_birthdate"];

$user_resultset =  Database::search("SELECT * FROM `user` WHERE `user_email`='" . $user_email_address . "' OR `user_contact`='" . $user_contact . "' ");
$userCount = $user_resultset->num_rows;

if ($userCount > 0) {
    echo ("user already exists");
} else {

    Database::iud("INSERT INTO `user`(`user_firstname`,`user_lastname`,`user_email`,`user_password`,`user_contact`,`user_gender`,`user_birthdate`,`user_joined_date`,`user_status_id`) 
    VALUES ('" . $user_first_name . "','" . $user_last_name . "','" . $user_email_address . "','" . $user_password . "','" . $user_contact . "','" . $user_gender . "','" . $user_birthdate . "',NOW(),'1')");

    echo ("success");
}
