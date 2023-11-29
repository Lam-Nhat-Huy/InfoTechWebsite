<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './library/phpmailer/vendor/autoload.php';

class ContactModel extends  Database {

public $errors = [];

function handleFormSubmission()
{

    if (empty($_POST['sender_name'])) {
        $errors['sender_name'] = 'Please enter your name.';
    }

    if (empty($_POST['sender_email']) || !filter_var($_POST['sender_email'], FILTER_VALIDATE_EMAIL)) {
        $errors['sender_email'] = 'Please enter a valid email address.';
    }

    if (empty($_POST['subject'])) {
        $errors['subject'] = 'Please enter the subject.';
    }

    if (empty($_POST['body'])) {
        $errors['body'] = 'Please enter the email body.';
    }

    if (empty($errors)) {
        $to = 'huylnpc05258@fpt.edu.vn';
        $subject = $_POST['subject'];
        $body = $_POST['body'];
        $senderName = $_POST['sender_name'];
        $senderEmail = $_POST['sender_email'];
        $this->sendEmail($to, $subject, $body, $senderName, $senderEmail);
    }
}

function sendEmail($to, $subject, $body, $senderName, $senderEmail)
{
    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'lamnhathuy0393418721@gmail.com';
        $mail->Password   = 'iyiacxflqhxkvvqs';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom($senderEmail, $senderName);
        $mail->addAddress($to);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
        echo "<script>alert('Email sent successfully')</script>";
    } catch (Exception $e) {
        echo "Error: {$mail->ErrorInfo}";
    }
}
}