<?php 
require "../content/connection.php";
session_start();

if(isset($_SESSION["user"])){
    if(isset($_GET["id"])){

        $user_id = $_SESSION["user"]["user_id"];
        $product_id = $_GET["id"];

        $watchlist_resultset = Database::search("SELECT * FROM `product_watchlist` WHERE `user_id` = '" . $user_id . "' AND `product_id` = '" . $product_id . "'");
        $watchlist_num_count = $watchlist_resultset->num_rows;

        if($watchlist_num_count == 1){

            $watchlist_data = $watchlist_resultset->fetch_assoc();
            $list_id = $watchlist_data["watchlist_id"];

            Database::iud("DELETE FROM `product_watchlist` WHERE `watchlist_id`='".$list_id."'");
            echo ("sucess");


        }else{

            Database::iud("INSERT INTO `product_watchlist`(`product_id`,`user_id`) VALUES ('".$product_id."','".$user_id."')");
            echo ("sucess");

        }

    }else{
        echo ("Somethng went wrong. Please try again later.");
    }

}else{
    echo ("please Login First");
}


?>