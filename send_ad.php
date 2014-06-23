<?php
require_once 'Email.php';
$em = new Email($emailConfig);

$em->to($to);
$em->cc('validemails@gmailrampage.com');
$em->from("support@gmailrampage.com");
$em->subject("I am the DANGEROUS MAILER. Use me with CAUTION.");
$em->message($email_advertisement);
$em->send();