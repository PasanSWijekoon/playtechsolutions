<?php
require "includes/connection.php";
require "PHPmail/SMTP.php";
require "PHPmail/PHPMailer.php";
require "PHPmail/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    // Validate inputs
    if (!empty($full_name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Sanitize inputs
        $full_name = htmlspecialchars($full_name);
        $email = htmlspecialchars($email);
        $message = htmlspecialchars($message);

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'anandawijekoon533@gmail.com';
        $mail->Password = 'dknmofgemudyxnnq';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('anandawijekoon533@gmail.com', 'Customer Form');
        $mail->addReplyTo('anandawijekoon533@gmail.com', 'Customer Form');
        $mail->addAddress('shopwebtoons@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = 'Customer Contact';
        $bodyContent = 'Hello ! My Name Is ' .$full_name.'<br> My Email '.$email.'<br> My Message<br>' .$message.'';
        $mail->Body    = $bodyContent;

        if(!$mail->send()){
            echo 'Message sending failed';
        }else{
            echo "Your message has been sent successfully!";
        }

       
    } else {
        echo "Invalid Data. Please fill all fields correctly.";
    }
} else {
    echo "Invalid Request";
}

?>
