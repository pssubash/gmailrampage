<?php
include_once 'email_validation.php';
ini_set ( 'max_execution_time', - 1 );
ini_set ( 'memory_limit', '512M' );
//ignore_user_abort ( true );
define("VERIFY_LETTER",10);
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
<?php if(isset($_GET['t']) && $_GET['t'] == 'aj') { }else { ?>
<!DOCTYPE html>
<html>
<head>
<title>:: Emaile Verifier</title>


<script type="text/javascript">
function scrollWindow<?php echo VERIFY_LETTER;?>() {
    window.scrollBy(0, document.body.scrollHeight);
}
function initScroll() {
    setInterval("scrollWindow<?php echo VERIFY_LETTER;?>()", 100);
}
</script>

</head>

<body>

<div style="border: 0px solid green;margin-left:350px;padding:10px;">
<?php } ?>
	<?php 
		$dbLink = mysql_connect ( "localhost", "gmailram_admin", "yhs&0%1FlT*k" ) or die ( "Error " . mysqli_connect_error (  ) );
		mysql_select_db ( "gmailram_dm", $dbLink );
		$totalRecords = "SELECT count(id) FROM emailgmail_".VERIFY_LETTER." where status = 0 limit 1000";
		
		$resultSet = mysql_query ( $totalRecords, $dbLink );
		if (! $resultSet) {
			
			die ( 'Invalid query: ' . mysql_error () );
		
		}
		
		$resultSet = mysql_fetch_array ( $resultSet );
		$totalRecords = $resultSet[0];
		$totalPage = ceil ( $resultSet [0] / 1000 );
		
		print "<br/><h4>Total Pages " . number_format ( $totalPage, 0, '.', ',' ) . "</h4><br/>";
		flush ();
		
		$page = 0;
		$offset = 1000;
		$count_valid = 0;
		$countvalid = "SELECT count(id) FROM validemail_".VERIFY_LETTER."";
		$resultSet = mysql_query ( $countvalid, $dbLink );
		if (! $resultSet) {
			print $countvalid;
			die ( 'Invalid query: ' . mysql_error () );
		
		}
		
		$resultSet = mysql_fetch_array ( $resultSet );
		$count_valid = $resultSet[0];
		
		$count_invalid = 0;
		
		$countinvalid = "SELECT count(id) FROM invalidemail_".VERIFY_LETTER;
		$resultSet = mysql_query ( $countinvalid, $dbLink );
		if (! $resultSet) {
			print $count_invalid;
			die ( 'Invalid query: ' . mysql_error () );
		
		}
		$resultSet = mysql_fetch_array ( $resultSet );
		$count_invalid = $resultSet[0];
		
		
		for($i = 0; $i < $totalPage; $i ++) {
			if ($page > 1) {
				$slno = (($page - 1) * ROWS_PER_PAGE) + 1;
			} else {
				$slno = 1;
			}
			$currentPage = $page * $offset;
			$query = "SELECT email FROM emailgmail_".VERIFY_LETTER." where status = 0 LIMIT $currentPage,$offset";
			//print $query;exit;
			$resultSet = mysql_query ( $query, $dbLink );
			while ( $row = mysql_fetch_array ( $resultSet ) ) {
				print "<p style='text-align:left;'>";
				$to = $row ['email'] . "@gmail.com";
				print "<br/><b>($slno)   </b>   Validation Email <b>$to</b> ..............<br/>";
				flush ();
				$result = $validator->ValidateEmailBox ( trim ( $to ) );
				if ($result == 1) {
					$inquery = "INSERT INTO validemail_".VERIFY_LETTER." (email)VALUES('" . $to . "')";
					print "<span ><h2 style='color:green;'>Valid</h2></span>";
					$count_valid++;
				} else {
					$inquery = "INSERT INTO invalidemail_".VERIFY_LETTER." (email)VALUES('" . $to . "')";
					print "<span ><h2 style='color:red;'>Invalid</h2></span>";
					$count_invalid++;
				}
				mysql_query ( "UPDATE emailgmail_".VERIFY_LETTER." SET status = 1 where  email='" . $row ['email'] . "'" );
				mysql_query ( $inquery );
				$slno++;
				flush ();
				//print "UPDATE emailgmail_6 SET status = 1 where  email='".$row['email']."'";
				
				print "<b>".number_format(abs($totalRecords-($count_invalid+$count_valid)),0,'.',',')." Verifications Remaining</b><br/>";
				print "<b><span style='color:green;'> ".number_format($count_valid,0,'.',',')." Valid   ..........................    </span>";
				print "<span style='color:red;'>";
				print number_format($count_invalid,0,'.',',')." InValid </span></b><br/>";
				print "</p>";
				
				if(isset($_GET['t']) && $_GET['t'] == 'aj') {
					//print "</div>";
					exit;
				}else {
					print "<script type='text/javascript'>scrollWindow".VERIFY_LETTER."();</script>";
				}
			
			}
		$page ++;
	}
	print "<br/>All permutations of ".VERIFY_LETTER." characters verified";

	?>

<?php if(isset($_GET['t']) && $_GET['t'] == 'aj') { }else { ?>
</div>
</body>

</html>
<?php } ?>