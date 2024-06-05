<?php 
require "../../../viva-project/content/connection.php";

$user_id = $_GET["p"];

$user_resultset = Database::search("SELECT * FROM `user` WHERE `user_id`='".$user_id."' ");

if($user_resultset->num_rows == 1){

    $user_data = $user_resultset->fetch_assoc();
    $status = $user_data["user_status_id"];

    if($status == 1){
        Database::iud("UPDATE `user` SET `user_status_id`='2' WHERE `user_id`='".$user_id."'");
        echo ("deactivated");
    }else if($status == 2){
        Database::iud("UPDATE `user` SET `user_status_id`='1' WHERE `user_id`='".$user_id."'");
        echo ("activated");
    }
}else{
    echo ("Something went wrong. Try again later.");
}

?>