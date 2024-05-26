<?php
require "../content/connection.php";
session_start();

$user_email_address = $_POST["user_email"];
$user_password = $_POST["user_password"];
$rememberme = $_POST["rememberme"];

$user_resultset = Database::search("SELECT * FROM `user` WHERE `user_email`='" . $user_email_address . "' AND `user_password`='" . $user_password . "'");
$user_result_count = $user_resultset->num_rows;

if ($user_result_count == 1) {
    echo ("success");
    $user_result_date = $user_resultset->fetch_assoc();
    $_SESSION["user"] = $user_result_date;

    if ($rememberme == "true") {
        setcookie("user_email", $user_email_address, time() + (60 * 60 * 24 * 365));
        setcookie("user_password", $user_password, time() + (60 * 60 * 24 * 365));
    } else {
        setcookie("user_email", "", -1);
        setcookie("user_password", "", -1);
    }
} else {

    echo ("Invalid user please create an account first!");
}
