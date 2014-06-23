<?php
require_once 'settings.php';
require_once 'Email.php';

$em = new Email($emailConfig);

$em->to("pssubashps@gmail.com");
$em->from("pssubashps@gmail.com");
$em->subject("CI EMail");
$em->message("test email");
var_dump($em->send());
print $em->print_debugger();