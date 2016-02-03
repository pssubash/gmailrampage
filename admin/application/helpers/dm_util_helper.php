<?php
function passwordGenerator() {
	$length = 6;
	$alpha = "abcdefghijklmnopqrstuvwxyz";
	$alpha_upper = strtoupper ( $alpha );
	$numeric = "0123456789";
	$special = "!@$#*%{}";
	$chars = $alpha . $alpha_upper . $numeric . $special;
	$pw = '';
	$len = strlen ( $chars );
	for($i = 0; $i < $length; $i ++) {
		$pw .= substr ( $chars, rand ( 0, $len - 1 ), 1 );
	}
	return str_shuffle ( $pw );
}
function userCreateNotification($message, $fullname, $email, $key) {
	$message = str_replace ( "<<<user_email>>>", $email, $message );
	// $acturl = base_url () . "index.php/home/act/e/" . $email . "/a/$key";
	// $message = str_replace ( "<<<activate_url>>>", $acturl, $message );
	// $message = str_replace ( "<<<reg_email>>>", $email, $message );
	// $message = str_replace ( "<<<reg_id>>>", $userid, $message );
	// if($password != null)
	// $message = str_replace ( "<<<password>>>", $password, $message );
	$message = str_replace ( "<<<user_password>>>", $key, $message );
	// $unsuburl = base_url () . "index.php/home/unsub/e/" . $email . "/a/$key";
	// $message = str_replace ( "<<<unsubscribe>>>", $unsuburl, $message );
	return $message;
}
function generateCreateNewSmtpCsvTemplate() {
	$list = array (
			array (
				'smtp_name','smtp_host','smtp_port','smtp_login','smtp_password','smtp_secure','smtp_sender'	
			) 
	);
	$file = "smtpcsvtempalte.csv";
	$fp = fopen ( $file, 'w' );
	
	foreach ( $list as $fields ) {
		fputcsv ( $fp, $fields );
	}
	
	fclose ( $fp );
	header ( 'Content-Description: File Transfer' );
	header ( 'Content-Type: application/octet-stream' );
	header ( 'Content-Disposition: attachment; filename=' . basename ( $file ) );
	header ( 'Expires: 0' );
	header ( 'Cache-Control: must-revalidate' );
	header ( 'Pragma: public' );
	header ( 'Content-Length: ' . filesize ( $file ) );
	ob_clean ();
	flush ();
	readfile ( $file );
	exit ();
}