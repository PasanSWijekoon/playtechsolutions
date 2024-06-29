<?php

require "includes/connection.php";
require "PHPmail/SMTP.php";
require "PHPmail/PHPMailer.php";
require "PHPmail/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_GET["e"])) {
    $email = $_GET["e"];
    
    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
    $n = $rs->num_rows;

    if ($n == 1) {
        $code = uniqid();

        Database::iud("UPDATE `user` SET `verification_code`='" . $code . "' WHERE `email`='" . $email . "'");

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'anandawijekoon533@gmail.com';
        $mail->Password = 'dknmofgemudyxnnq';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('anandawijekoon533@gmail.com', 'Reset Password');
        $mail->addReplyTo('anandawijekoon533@gmail.com', 'Reset Password');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Play Tech Solutions Forgot Password Verification Code';

        // Load HTML content from the file
        $htmlContent = file_get_contents('PHPmail/email_template.html');
        // Replace placeholder with the actual code
        $bodyContent = str_replace('{{code}}', $code, $htmlContent);

        $mail->Body = $bodyContent;

        if (!$mail->send()) {
            echo 'Verification code sending failed';
        } else {
            echo 'Success';
        }
    } else {
        echo 'Invalid Email address';
    }
}

?>
