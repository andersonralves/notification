<?php

require_once __DIR__ . '/ext_lib/autoload.php';

$novoEmail = new Notification\Email();
$novoEmail->sendMail('subject', 'body', 'email-reply', 'name-reply', 'email-to', 'name-to');





