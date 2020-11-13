<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';


function sendMail($to)
{
    $mail = new PHPMailer(true);

    $alert = '';


    try {
        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = 'tonijorda1997@gmail.com'; // Gmail address which you want to use as SMTP server
        require '../../Password/password.php';
        $mail->Password = $pass; // Gmail address Password
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = '587';
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );


        $mail->setFrom('tonijorda1997@gmail.com'); // Gmail address which you used as SMTP server
        $mail->addAddress($to); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

        $mail->isHTML(true);
        $mail->Subject = 'Message Received (Contact Page)';
        require 'templates/newsletter.php';
        $mail->Body = $html;


        $mail->send();


        $alert = '<div class="alert-success">
                    <span>Message Sent! Thank you for contacting us.</span>
                    </div>';
    } catch (Exception $e) {
        $alert = '<div class="alert-error">
                    <span>' . $e->getMessage() . '</span>
                  </div>';
    }

    //echo $alert;


}
