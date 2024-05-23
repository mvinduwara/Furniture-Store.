<?php
require "../content/connection.php";

$user_first_name = $_POST["user_first_name"];
$user_last_name = $_POST["user_last_name"];
$user_email_address = $_POST["user_email_address"];
$user_password = $_POST["user_password"];
$user_gender = $_POST["user_gender"];
$user_contact = $_POST["user_contact"];

// if (empty($user_first_name)) {
//     echo ("please enter your first name");
// } else if (strlen($user_first_name) > 20) {
//     echo ("please enter less than 20 characters for first name!");
// } elseif (empty($user_last_name)) {
//     echo ("please enter your last name!");
// } else if (strlen($user_last_name) > 20) {
//     echo ("please enter less than 20 characters for last name!");
// } else if (empty($user_email_address)) {
//     echo ("please enter your valid email!");
// } else if (strlen($user_email_address) > 100) {
//     echo ("please enter less than 100 characters for email!");
// } else if (!filter_var($user_email_address, FILTER_VALIDATE_EMAIL)) {
//     echo ("invalid email address!");
// } else if (empty($user_password)) {
//     echo ("please enter a password!");
// } else if (strlen($user_password) < 5 || strlen($user_password) > 20) {
//     echo ("password length must bettween 5 to 20 characters!");
// }else if(empty($user_gender)){
//     echo ("please enter your gender");
// } else if (empty($user_contact)) {
//     echo ("please enter your mobile number!");
// } else if (!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/", $user_contact)) {
//     echo ("invalid Mobile Number.");
// } else if (strlen($user_contact) != 10) {
//     echo ("mobile number must be contain 10 characters!");
// }else{



$user_resultset =  Database::search("SELECT * FROM `user` WHERE `user_email`='" . $user_email_address . "' OR `user_contact`='" . $user_contact . "' ");
$userCount = $user_resultset->num_rows;

if ($userCount > 0) {
    echo ("user already exists");
} else {

    Database::iud("INSERT INTO `user`(`user_firstname`,`user_lastname`,`user_email`,`user_password`,`user_contact`,`user_gender`,`user_joined_date`,`user_status_id`) 
    VALUES ('" . $user_first_name . "','" . $user_last_name . "','" . $user_email_address . "','" . $user_password . "','" . $user_contact . "','" . $user_gender . "',NOW(),'1')");

    echo ("success");

}



