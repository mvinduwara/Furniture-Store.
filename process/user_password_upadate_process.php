<?php 
require "../content/connection.php";
session_start();

if(isset($_SESSION["user"])){
    $user_id = $_SESSION["user"]["user_id"];

    $user_current_password = $_POST["user_current_password"];
    $user_new_password = $_POST["user_new_password"];
    $user_confirm_new_password = $_POST["user_confirm_new_password"];

    $user_password_resultset =  Database::search("SELECT `user_password` FROM `user` WHERE `user_id` = '".$user_id."' AND `user_password` ='".$user_current_password."'; ");
    $user_password_count = $user_password_resultset->num_rows;

    if ($user_password_count === 1) {

        $user_password_data = $user_password_resultset->fetch_assoc();

        if ($user_current_password === $user_password_data["user_password"]) {

            if ($user_new_password === $user_confirm_new_password) {

                Database::iud("UPDATE `user` SET `user_password` = '" . $user_confirm_new_password . "' WHERE `user_id` = '" . $user_id . "'");
                echo("success");

            } else {
                echo("Please enter your new password correctly");
            }

        } else {
            echo("Please enter your current password correctly");
        }
    } else {
        echo("Please enter your current password correctly");
    }

}else{
    echo("please login");
}

?>