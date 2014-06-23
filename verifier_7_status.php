<?php
$dbLink = mysql_connect ( "localhost", "gmailram_admin", "yhs&0%1FlT*k" ) or die ( "Error " . mysqli_error ( $dbLink ) );
mysql_select_db ( "gmailram_dm", $dbLink );

$totalRecords = "SELECT count(id) FROM emailgmail_7";
$resultSet = mysql_query ( $totalRecords, $dbLink );
$resultSet = mysql_fetch_array ( $resultSet );
$totalPermutions = $resultSet[0];

$totalRecords = "SELECT count(id) FROM emailgmail_7 where status = 1";
$resultSet = mysql_query ( $totalRecords, $dbLink );
$resultSet = mysql_fetch_array ( $resultSet );
$totalVerificationCompleted= $resultSet[0];

$totalRecords = "SELECT count(id) FROM emailgmail_7 where status = 0";
$resultSet = mysql_query ( $totalRecords, $dbLink );
$resultSet = mysql_fetch_array ( $resultSet );
$totalVerificationPending= $resultSet[0];

$totalRecords = "SELECT count(id) FROM validemail_7";
$resultSet = mysql_query ( $totalRecords, $dbLink );
$resultSet = mysql_fetch_array ( $resultSet );
$totalValid= $resultSet[0];

$totalRecords = "SELECT count(id) FROM invalidemail_7";
$resultSet = mysql_query ( $totalRecords, $dbLink );
$resultSet = mysql_fetch_array ( $resultSet );
$totalInvalid= $resultSet[0];

echo "<br/>Total Permutaions of 7 character @gmail.com - ".$totalPermutions;
echo "<br/>Number of 7 character @gmail.com which have undergone verification -  ".$totalVerificationCompleted;
echo "<br/>Number of 7 character @gmail.com which needs to undergo verification -".$totalVerificationPending;
echo "<br/>Valid Email Addresses found - ".$totalValid;
echo "<br/>InValid Email Addresses found - ".$totalInvalid;
@mysql_close ($dbLink);
