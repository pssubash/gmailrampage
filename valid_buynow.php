<?php
require_once 'verifier_functions.php';

$str = "<table width='85%' class='buyvalidemails'>";
$str .= "<tr>";
$str .= "<th>Permutaion</th>";
$str .= "<th>Total Permutaions</th>";
$str .= "<th>Total Invalid</th>";
$str .= "<th>Total Valid</th>";
$str .= "<th>Cost per email address</th>";
$str .= "<th>Total Cost</th>";

$str .= "<th>Downloaded So far</th>";
$str .= "<th>Order</th>";
$str .= "</tr>";
$vtotalcount = 0;
$vtotalcost = 0;

$incount = 0;
$totalPermutaion = 0;
$totalPermutaionAll = 0;
$itotalcount =0;
for($lettercount = START_LETTER_COUNT; $lettercount <= END_LETTER_COUNT; $lettercount ++) {
	$vcount = getValidEmailsCount ( $lettercount );
	$totalPermutaion = getTotalPermutaion($lettercount);
	$totalPermutaionAll += $totalPermutaion;
	$vtotalcount += $vcount;
	$vcost = getValidEmailCost ();
	$vtotalcost += $vcost;
	$incount = getInvalidEmailsCount($lettercount);
	$itotalcount += $incount;
	$str .= "<tr>";
	$str .= "<td>" . $lettercount . " Character </td>";
	$str .= "<td>" . number_format($totalPermutaion) . "</td>";
	$str .= "<td>" .  number_format($incount)  . "</td>";
	$str .= "<td>" . number_format($vcount) . "</td>";
	$str .= "<td>$" . number_format($vcost,3,'.',',') . "</td>";
	$str .= "<td>$" . number_format($vcount*$vcost,3,'.',',') . "</td>";
	$str .="<td>".getDownloadCounter($lettercount."P")."</td>";
	
	$str .= "<td> <a href='javascript:void(0);'  class='class_buynow' id='buynow_".$vcount."_".$lettercount."_".$vcost."' border='0' name='I1' alt='Make payments with PayPal - it\'s fast, free and secure!' width='137' height='57'>ORDER BY PAYPAL</a>
							<img alt='' border='0' src='https://www.paypal.com/en_US/i/scr/pixel.gif' width='1' height='1'></td>";
	
	
	$str .= "</tr>";
}
$vcost = getValidEmailCost ();
$str .= "<tr class='totalvalues'>";
$str .= "<td><strong>Total</strong></td>";
$str .= "<td>" . number_format($totalPermutaionAll) . "</td>";
$str .= "<td>" . number_format($itotalcount) . "</td>";
$str .= "<td>" . number_format($vtotalcount) . "</td>";

$str .= "<td>$" . number_format($vcost,3,'.',',') . "</td>";
$str .= "<td>$" . number_format($vcost*$vtotalcount,3,'.',',') . "</td>";
$str .="<td>".getDownloadCounter("PA")."</td>";

$str .= "<td><a href='javascript:void(0);' class='class_buynow'  id='buynow_".$vtotalcount."_All Letter_".$vcost."'  border='0' name='I1' alt='Make payments with PayPal - it\'s fast, free and secure!' width='137' height='57'>ORDER BY PAYPAL</a>
							<img alt='' border='0' src='https://www.paypal.com/en_US/i/scr/pixel.gif' width='1' height='1'></td>";



$str .= "</tr>";

$str .= "</table>";
print $str;