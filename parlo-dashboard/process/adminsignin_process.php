<?php 
require "../../content/connection.php";

require "../resources/mails/Exception.php";
require "../resources/mails/PHPMailer.php";
require "../resources/mails/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST["admin_email"])){
    $admin_email = $_POST["admin_email"];

    $admin_resultset = Database::search("SELECT * FROM `admin` WHERE `admin_email`='".$admin_email."' ");
    $admin_result_count = $admin_resultset->num_rows;

    if($admin_result_count == 1){

        $code = uniqid();

        Database::iud("UPDATE `admin` SET `admin_verification_code`='".$code."' WHERE `admin_email`='".$admin_email."' ");

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'manilka.codefiline@gmail.com';
        $mail->Password = 'elxf pwwz gbkr ielw';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('manilka.codefiline@gmail.com', 'Admin Verification');
        $mail->addReplyTo('manilka.codefiline@gmail.com', 'Admin Verification');
        $mail->addAddress($admin_email);
        $mail->isHTML(true);
        $mail->Subject = 'eShop Admin Login Verification Code';
        $bodyContent = '<h1 style="color:blue;">Your verification code is '.$code.'</h1>';
        $mail->Body    = $bodyContent;

        if (!$mail->send()) {
            echo 'Verification code sending failed';
        } else {
            echo 'Success';
        }

    }else{

        echo("invalid admin email");

    }
}



?>