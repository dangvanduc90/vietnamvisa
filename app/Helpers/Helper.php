<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!function_exists('DummyFunction')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function DummyFunction()
    {

    }
}

if (!function_exists('send_mail')) {
    function send_mail($email, $title, $subject, $content)
    {
        $mail = new PHPMailer(true);
        try
        {
            $mail->CharSet = 'UTF-8';                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'nm.dung.1991@gmail.com';                     // SMTP username
            $mail->Password   = 'hmhnfmkwrggxhxhi';                               // SMTP password
            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to
            $mail->smtpConnect(
                array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true
                    )
                )
            );
            //Recipients
            $mail->setFrom('nm.dung.1991@gmail.com', 'OSHC GLOBAL');
            $mail->addAddress($email);              // Name is optional
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $content;
            $mail->send();
        }catch (Exception $e)
        {}
    }
}
