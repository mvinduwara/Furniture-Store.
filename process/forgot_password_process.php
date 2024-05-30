<?php 
require "../content/connection.php";

require "../resources/mails/PHPMailer.php";
require "../resources/mails/SMTP.php";
require "../resources/mails/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_GET["email"])){
    $user_email = $_GET["email"];

    $user_resultset = Database::search("SELECT * FROM `user` WHERE `user_email` = '" . $user_email . "'");
    $user_result_count  = $user_resultset->num_rows;

    if($user_result_count == 1){
        $code = uniqid();

        Database::iud("UPDATE `user` SET `user_verification_code` = '" . $code . "' WHERE `user_email` = '" . $user_email . "'");

        $mail = new PHPMailer();

        // Set up SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'manilka.codefiline@gmail.com';
        $mail->Password = 'ihbm duww gwrr uswf';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Set up email content
        $mail->setFrom('manilka.codefiline@gmail.com', 'Reset Password');
        $mail->addReplyTo('manilka.codefiline@gmail.com', 'Reset Password');
        $mail->addAddress($user_email);
        $mail->isHTML(true);
        $mail->Subject = 'parlo Forgot Password Verification Code';
        $bodyContent = '<h1 style="color:green;">Your verification code is ' . $code . '</h1>';

        $mail->Body = $bodyContent;

        if (!$mail->send()) {
            echo ("Oops! Something went wrong. Please try again later!");
        }else{
            echo("success");
        }

    }else{
        echo ("Invalid Email Address.");
    }

}else{
    echo("please enter your email");
}

?>