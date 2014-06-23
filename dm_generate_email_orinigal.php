<?php
ob_start ();
ini_set ( 'max_execution_time', - 1 );
ini_set ( 'memory_limit', '512M' );
ignore_user_abort ( true );
function permutations($letters, $num) {
	$dbLink = mysqli_connect ( "localhost", "gmailram_admin", "yhs&0%1FlT*k", "gmailram_dm" ) or die ( "Error " . mysqli_error ( $dbLink ) );
	$last = str_repeat ( $letters [0], $num );
	if ($letters [0] != '.') {
		$stmt = mysqli_prepare ( $dbLink, "INSERT INTO emailgmail_6 (email) VALUES (?)" );
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
		if ($last [0] != '.'|| $last[strlen($last)-1] != '.') {
			mysqli_stmt_bind_param ( $stmt, 's', $emailid );
			$emailid = $last;
			mysqli_stmt_execute ( $stmt );
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

$array = permutations ( "underpricedhost", 15 );
echo "FINISHED";
/*for($i=0 ; $i < COUNT($array) ; $i++) { 
        echo  "$i." . $array[$i] . "<br>"; 
} */
 