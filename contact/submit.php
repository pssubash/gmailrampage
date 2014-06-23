<?php

/* config start */
require_once 'contact-settings.php';

/* config end */

require "phpmailer/class.phpmailer.php";

session_name ( "fancyform" );
session_start ();

foreach ( $_POST as $k => $v ) {
	if (ini_get ( 'magic_quotes_gpc' ))
		$_POST [$k] = stripslashes ( $_POST [$k] );
	
	$_POST [$k] = htmlspecialchars ( strip_tags ( $_POST [$k] ) );
}

$err = array ();

if (! checkLen ( 'name' ))
	$err [] = 'The name field is too short or empty!';

if (! checkLen ( 'email' ))
	$err [] = 'The email field is too short or empty!';
else if (! checkEmail ( $_POST ['email'] ))
	$err [] = 'Your email is not valid!';

if (! checkLen ( 'subject' ))
	$err [] = 'You have not selected a subject!';

if (! checkLen ( 'message' ))
	$err [] = 'The message field is too short or empty!';

$msg = 'Name:	' . $_POST ['name'] . '<br />
Email:	' . $_POST ['email'] . '<br />
IP:	' . $_SERVER ['REMOTE_ADDR'] . '<br /><br />
Message:<br /><br/>

' . nl2br ( $_POST ['message'] ) . '

';

$mail = new PHPMailer ();
$mail->IsMail ();

$mail->AddReplyTo ( $_POST ['email'], $_POST ['name'] );
$mail->AddAddress ( $emailAddress );
$mail->SetFrom ( $_POST ['email'], $_POST ['name'] );
$mail->Subject = "A new " . mb_strtolower ( $_POST ['subject'] ) . " from " . $_POST ['name'] . " | contact form feedback";
$mail->MsgHTML ( $msg );

$mail->Send ();

/*
 * Sending copy to the customer
 */
$receiverSubject = "RECEIVED - " . mb_strtolower ( $_POST ['subject'] ) . " from " . $_POST ['name'] . " | contact form feedback";
$mail = new PHPMailer ();
$mail->IsMail ();

$mail->AddReplyTo ( $emailAddress );
$mail->AddAddress ( $_POST ['email'], $_POST ['name'] );
$mail->SetFrom ( $emailAddress );
$mail->Subject = $receiverSubject;

$receiverMsgPart1 = <<<EOD
We have received your question and will reply to you shortly.<br/>

Do you want to have such a nice CONTACT-US form on your website ?<br/><br/>

Buy Here ==>> <<affiliateurl>>

<br/><br/>
EOD;
$receiverMsgPart1 = str_replace ( "<<affiliateurl>>", $affiliateurl, $receiverMsgPart1 );
$mail->MsgHTML ( $receiverMsgPart1 . $msg );

$mail->Send ();
$current = file_get_contents ( $storeFilename );
// Append a new person to the file
$person = $_POST ['email'] . "\n";
// Write the contents back to the file
file_put_contents ( $storeFilename, $person, FILE_APPEND | LOCK_EX );
unset ( $_SESSION ['post'] );

if ($_POST ['ajax']) {
	echo '1';
} else {
	$_SESSION ['sent'] = 1;
	
	if ($_SERVER ['HTTP_REFERER'])
		header ( 'Location: ' . $_SERVER ['HTTP_REFERER'] );
	exit ();
}
function checkLen($str, $len = 2) {
	return isset ( $_POST [$str] ) && mb_strlen ( strip_tags ( $_POST [$str] ), "utf-8" ) > $len;
}
function checkEmail($str) {
	return preg_match ( "/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $str );
}

?>
