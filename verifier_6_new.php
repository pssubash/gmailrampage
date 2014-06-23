<?php
include_once 'email_validation.php';
ini_set ( 'max_execution_time', - 1 );
ini_set ( 'memory_limit', '512M' );
//ignore_user_abort ( true );
$validator = new email_validation_class ();
if (! function_exists ( "GetMXRR" )) {
	$_NAMESERVERS = array ('8.8.8.8', '8.8.4.4', '4.2.2.1', '4.2.2.2' );
	include ("getmxrr.php");
}
$validator->timeout = 10;

$validator->data_timeout = 0;

$validator->localuser = "verify";

$validator->localhost = "emailaddressverifier.com";

$validator->debug = 1;
$validator->html_debug = 1;
?>
<!DOCTYPE html>
<html>
<head>
<title>:: Emaile Verifier</title>
<?php if(isset($_GET['t']) && $_GET['t'] == 'aj') { }else { ?>
<script type="text/javascript">
function scrollWindow6() {
    window.scrollBy(0, document.body.scrollHeight);
}
function initScroll() {
    setInterval("scrollWindow6()", 100);
}
</script>
<?php } ?>
</head>

<body>
<div style="border: 1px solid green;margin-left:350px;padding:10px;">
	<?php 
		$dbLink = mysql_connect ( "localhost", "gmailram_admin", "yhs&0%1FlT*k" ) or die ( "Error " . mysqli_error ( $dbLink ) );
		mysql_select_db ( "gmailram_dm", $dbLink );
		$totalRecords = "SELECT count(id) FROM emailgmail_6 where status = 0";
		
		$resultSet = mysql_query ( $totalRecords, $dbLink );
		if (! $resultSet) {
			
			die ( 'Invalid query: ' . mysql_error () );
		
		}
		
		$resultSet = mysql_fetch_array ( $resultSet );
		$totalRecords = $resultSet[0];
		$totalPage = ceil ( $resultSet [0] / 1000 );
		
		print "<br/><h4>Total Pages " . number_format ( $totalPage, 0, '.', ',' ) . "</h4><br/>";
		flush ();
	?>
</div>
</body>

</html>