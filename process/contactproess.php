<?php
require "../resources/mails/PHPMailer.php";
require "../resources/mails/SMTP.php";
require "../resources/mails/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_name = $_POST["user_name"];
    $user_email = $_POST["user_email"];
    $user_subject = $_POST["user_subject"];
    $user_message = $_POST["user_message"];

    if (empty($user_name)) {
        echo ("Please enter your name.");
    } else if (empty($user_email)) {
        echo ("Please enter your email address.");
    } else if (strlen($user_email) > 100) {
        echo ("please enter less than 100 characters for email!");
    } else if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        echo ("invalid email address!");
    } else if (empty($user_subject)) {
        echo ("Please enter your subject.");
    } else if (empty($user_message)) {
        echo ("Please enter your message.");
    } else {

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
        $mail->setFrom($user_email);
        $mail->addReplyTo($user_email);
        $mail->addAddress('manilka.codefiline@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission from ' . $user_email . ' ';
        $bodyContent = '<h4>Name  = ' .  $user_name . ' </h4> <br> <h3>  ' .  $user_message . '  </h3>';

        $mail->Body = $bodyContent;



        if (!$mail->send()) {
            echo ("Oops! Something went wrong. Please try again later!");
        } else {
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
    }
}
