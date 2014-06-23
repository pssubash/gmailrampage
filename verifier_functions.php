<?php
require_once 'settings.php';
require_once 'remote.php';
define("START_LETTER_COUNT",6);
define("END_LETTER_COUNT",20);
function databaseConnect() {
	$dbLink = mysql_connect ( REMOTE_HOST, DB_USERNAME, DB_PASSWORD ) or die ( "Error " . mysqli_error ( $dbLink ) );
	mysql_select_db ( DB_NAME, $dbLink );
	return $dbLink;
}

function getValidEmailsCount($num,$search=false) {
	$dbLink = databaseConnect();
	if($search === false) {
		$totalRecords = "SELECT count(id) FROM validemail_" . $num;
	}else {
		$totalRecords = "SELECT count(id) FROM validemail_" . $num." where email like '".$search."%'";
		//print $totalRecords."<br/><br/>";
	}
	
	$resultSet = mysql_query ( $totalRecords, $dbLink );
	$resultSet = mysql_fetch_array ( $resultSet );
	$totalValid = $resultSet [0];
	@mysql_close ($dbLink);
	return $totalValid;
}

function getInvalidEmailsCount($num,$search=false) {
	$dbLink = databaseConnect();
	if($search === false) {
		$totalRecords = "SELECT count(id) FROM invalidemail_" . $num;
	}else {
		$totalRecords = "SELECT count(id) FROM invalidemail_" . $num." where email like '".$search."%'";
		//print "<br/>".$totalRecords."<br/>";
	}
	
	$resultSet = mysql_query ( $totalRecords, $dbLink );
	$resultSet = mysql_fetch_array ( $resultSet );
	$totalValid = $resultSet [0];
	@mysql_close ($dbLink);
	return $totalValid;
}
function getValidEmailCost () {
	/*$dbLink = databaseConnect();
	$totalRecords = "SELECT set_costvalidemails FROM settings WHERE set_id=1";
	$resultSet = mysql_query ( $totalRecords, $dbLink );
	$resultSet = mysql_fetch_array ( $resultSet );
	$totalValid = $resultSet [0];
	@mysql_close ($dbLink);
	return $totalValid;*/
	return COST_PER_VALID_EMAIL;
}

function getTotalPermutaion ($num,$search = false) {
	$dbLink = databaseConnect();
	if($search === false) {
		$totalRecords = "SELECT count(id) FROM emailgmail_" . $num;
	}else {
		$totalRecords = "SELECT count(id) FROM emailgmail_" . $num." where email like '".$search."%'";
	}
	
	$resultSet = mysql_query ( $totalRecords, $dbLink );
	$resultSet = mysql_fetch_array ( $resultSet );
	$totalValid = $resultSet [0];
	@mysql_close ($dbLink);
	return $totalValid;
}

function getDownloadCounter($type) {
	$dbLink = databaseConnect();
	$q = "SELECT dc_count FROM downloadcounter where dc_type = '".$type."'";
	//print $q;
	$resultSet = mysql_query ( $q, $dbLink );
	$resultSet = mysql_fetch_array ( $resultSet );
	@mysql_close ($dbLink);
	if($resultSet == false) {
		return 0;
	}else {
		return $resultSet['dc_count'];
	}
	
}

function getOfferDownloadCounter() {
	$dbLink = databaseConnect();
	$q = "SELECT opt_value FROM options_int where opt_key = 'offer_download'";
	//print $q;
	$resultSet = mysql_query ( $q, $dbLink );
	$resultSet = mysql_fetch_array ( $resultSet );
	@mysql_close ($dbLink);
	if($resultSet == false) {
		return 0;
	}else {
		return $resultSet['opt_value'];
	}

}
