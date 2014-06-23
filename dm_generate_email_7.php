<?php
require_once 'settings.php';
require_once 'remote.php';
//print connection_aborted();
function shutdown() {
	// This is our shutdown function, in 
	// here we can do any last operations
	// before the script is complete.
	

	echo 'Script executed with success', PHP_EOL;
}

//register_shutdown_function('shutdown');
//shutdown();
//echo "Stop";exit;
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$mailBody = "<html>";
$mailBody .= "<body>";
$mailBody .= "<table border='1'>";
$mailBody .= "<tr>";
$mailBody .= "<th >";
$mailBody .= "permutations ( \"abcdefghijklmnopqrstuvwxyz1234567890.\", 7)";
$mailBody .= "</th>";
$mailBody .= "</tr>";
$mailBody .= "<tr>";
$mailBody .= "<td>";
$mailBody .= "Script Started....";
$mailBody .= "</td>";
$mailBody .= "</tr>";
$mailBody .= "</table>";
$mailBody .= "</body>";


ob_start ();
ini_set ( 'max_execution_time', - 1 );
ini_set ( 'memory_limit', '512M' );
ignore_user_abort ( true );
function permutations($letters, $num) {
	$totalEmailCount = 0;
	$dbLink = mysqli_connect ( REMOTE_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME ) or die ( "Error " . mysqli_error ( $dbLink ) );
	$last = str_repeat ( $letters [0], $num );
	if ($letters [0] != '.' && $letters[strlen($letters[0])- 1] != '.') {
		$totalEmailCount ++;
		$stmt = mysqli_prepare ( $dbLink, "INSERT INTO emailgmail_7 (email) VALUES (?)" );
		mysqli_stmt_bind_param ( $stmt, 's', $emailid );
		$emailid = $last;
		mysqli_stmt_execute ( $stmt );
	}
	
	$result = array ();
	/*$alphas = range ( 'a', 'z' );
	for($i = 0; $i < count ( $alphas ); $i ++) {
		$alphas [$i] = str_repeat ( $alphas [$i], $num );
	}*/
	
	while ( $last != str_repeat ( lastchar ( $letters ), $num ) ) {
		//$stmt->bind_param();
		

		//$result[] = $last; 
		$last = char_add ( $letters, $last, $num - 1 );
		if ($last [0] != '.' && $last [strlen ( $last ) - 1] != '.' && $last [0] != '_' && $last [strlen ( $last ) - 1] != '_') {
			$totalEmailCount ++;
			mysqli_stmt_bind_param ( $stmt, 's', $emailid );
			$emailid = $last;
			mysqli_stmt_execute ( $stmt );
		}
		if ( GENERTE_ALERT_COUNT    ==  $totalEmailCount) {
			$totalEmailCount = 0;
			$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
			

			$mailBody = "<html>";
			$mailBody .= "<body>";
			$mailBody .= "<table border='1'>";
			$mailBody .= "<tr>";
			$mailBody .= "<th >";
			$mailBody .= "permutations ( \"abcdefghijklmnopqrstuvwxyz1234567890.\", 7)";
			$mailBody .= "</th>";
			$mailBody .= "</tr>";
			$mailBody .= "<tr>";
			$mailBody .= "<td>";
			$mailBody .= "$totalEmailCount Records Inserted.";
			$mailBody .= "</td>";
			$mailBody .= "</tr>";
			$mailBody .= "</table>";
			$mailBody .= "</body>";
			$totalEmailCount = 0;
			mail(ALERT_EMAIL, str_replace("<<<letter>>>", "7", ALERT_EMAIL_SUBJECT), $mailBody);
			
			
		}
	}
	mysqli_stmt_close ( $stmt );
	mysqli_close ( $dbLink );
	//$result[] = $last; 
	

	unset ( $result );

}
function char_add($digits, $string, $char) {
	if ($string {$char} != lastchar ( $digits )) {
		$string {$char} = $digits {STRPOS ( $digits, $string {$char} ) + 1};
		return $string;
	} else {
		$string = changeall ( $string, $digits {0}, $char );
		return char_add ( $digits, $string, $char - 1 );
	}
}
function lastchar($string) {
	return $string {strlen ( $string ) - 1};
}
function changeall($string, $char, $start = 0, $end = 0) {
	if ($end == 0)
		$end = STRLEN ( $string ) - 1;
	for($i = $start; $i <= $end; $i ++) {
		$string {$i} = $char;
	}
	return $string;
}

$array = permutations ( "abcdefghijklmnopqrstuvwxyz1234567890.", 7 ); // Set your permutaion here

$mailBody = "<html>";
$mailBody .= "<body>";
$mailBody .= "<table border='1'>";
$mailBody .= "<tr>";
$mailBody .= "<th >";
$mailBody .= "permutations ( \"abcdefghijklmnopqrstuvwxyz1234567890.\", 7)";
$mailBody .= "</th>";
$mailBody .= "</tr>";
$mailBody .= "<tr>";
$mailBody .= "<td>";
$mailBody .= "Script Completed....";
$mailBody .= "</td>";
$mailBody .= "</tr>";
$mailBody .= "</table>";
$mailBody .= "</body>";


/*for($i=0 ; $i < COUNT($array) ; $i++) { 
        echo  "$i." . $array[$i] . "<br>"; 
} */
 