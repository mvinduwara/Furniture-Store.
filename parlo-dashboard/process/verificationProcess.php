<?php 
session_start();
require "../../../viva-project/content/connection.php";

if(isset($_GET["v"])){

    $verification_code = $_GET["v"];

    $admin_resultset = Database::search("SELECT * FROM `admin` WHERE `admin_verification_code`='".$verification_code."'");
    $admin_resultset_count = $admin_resultset->num_rows;

    if($admin_resultset_count == 1){

        $admin_data = $admin_resultset->fetch_assoc();
        $_SESSION["admin"] = $admin_data;
        
        echo ("success");

    }else{
        echo ("invalid verification code.");
    }

}else{
    echo ("Please enter your verification");
}


?>