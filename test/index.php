<?php

require_once __DIR__ . '/../ext_lib/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$host = 'host'; 
$user = 'user'; 
$pass = 'pass'; 
$smtpSecure = 'smtpSecure'; 
$port = 'port';
$setFromEmail = 'setFromEmail'; 
$setFromName = 'setFromName';

$novoEmail = new Notification\Email(SMTP::DEBUG_SERVER, $host, $user, $pass, $smtpSecure, $port, $setFromEmail, $setFromName);
$novoEmail->sendEmail("Subject", "Content", "reply@email.com", "Replay Name", "address@email.com", "Address Name");