<?php

namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exceptions;
use PHPMailer\PHPMailer\SMTP;

class Email 
{
    private $mail = \stdClass::class;

    public function __construct() 
    {
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $this->mail->isSMTP();                                          //Send using SMTP
        $this->mail->Host       = 'host';                     //Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->mail->Username   = 'username';                     //SMTP username
        $this->mail->Password   = 'password';                               //SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $this->mail->Port       = 587;    
        $this->mail->isHTML(true);
        $this->mail->CharSet = 'utf-8';
        $this->mail->setLanguage('br');
        $this->mail->setFrom('email-from', 'name-from');
    }

    public function sendMail(string $subject, string $body, string $replyEmail, string $replyName, string $addressEmail, string $addressName)
    {
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;

        $this->mail->addReplyTo($replyEmail, $replyName);
        $this->mail->addAddress($addressEmail, $addressName);

        try {
            $this->mail->send();
        } catch (Exception $e) {
            echo "Error sending the e-mail: {$this->mail->ErrorInfo} {$e->getMessage()}";
        }
    }
}