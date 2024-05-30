<?php
require "../content/connection.php";

$email = $_POST["email"];
$verification_code = $_POST["verification_code"];
$new_password = $_POST["new_password"];
$current_password = $_POST["current_password"];

$user_resultset = Database::search("SELECT * FROM `user` WHERE `user_email` = '" . $email . "' AND `user_verification_code`='".$verification_code."'");
$user_resultset_count = $user_resultset->num_rows;

if ($user_resultset_count == 1) {
    Database::iud("UPDATE `user` SET `user_password` = '" . $new_password . "' WHERE `user_email` = '" . $email . "'");
    echo("success");
}else{
    echo("Invalid user");
}


?>