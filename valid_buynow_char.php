<?php
require_once 'verifier_functions.php';
$startletter = 6;
		$endletter = 8;
$str = "<table width='85%' class='buyvalidemails'>";
	$str .= "<tr>";
	$str .= "<th>Permutaion</th>";
	$str .= "<th>Total Permutaions</th>";
	$str .= "<th>Total Invalid</th>";
	$str .= "<th>Total Valid</th>";
	$str .= "<th>Cost per email address</th>";
	$str .= "<th>Total Cost</th>";
	$str .= "<th>Order</th>";
	$str .= "<th>Downloaded So far</th>";
	
	$str .= "</tr>";
	$vtotalcount = 0;
	$vtotalcost = 0;
	$itotalcount = 0;
	$totalPermutaionAll = 0;
	$charArray = array ();
	foreach ( range ( 'a', 'z' ) as $letter ) {
		$charArray [] = $letter;
	}
	foreach ( range ( 0, 9 ) as $letter ) {
		$charArray [] = $letter;
	}
	
	for($search = 0; $search < count ( $charArray ); $search ++) {
		$vcost = 0;
		$vcount = 0;
		$incount = 0;
		$totalPermutaion = 0;
		for($lettercount = START_LETTER_COUNT; $lettercount <= END_LETTER_COUNT; $lettercount ++) {
			
			$vcount += getValidEmailsCount ( $lettercount, $charArray [$search] );
			$incount += getInvalidEmailsCount ( $lettercount, $charArray [$search] );
			$totalPermutaion += getTotalPermutaion ( $lettercount, $charArray [$search] );
		}
		$totalPermutaionAll += $totalPermutaion;
		$vcost = getValidEmailCost ();
		$vtotalcount += $vcount;
		$vtotalcost += $vcost;
		$itotalcount += $incount;
		$str .= "<tr>";
		$str .= "<td>" . $charArray [$search] . " Character </td>";
		$str .= "<td>" . number_format($totalPermutaion) . "</td>";
		$str .= "<td>" . number_format($incount) . "</td>";
		$str .= "<td>" . number_format($vcount) . "</td>";
		$str .= "<td>$" . number_format($vcost,3,'.',',') . "</td>";
		$str .= "<td>$" . number_format ( $vcost*$vcount, 3, '.', ',' ) . "</td>";
		$str .= "<td><input type='image'  class='class_buynow_char'  id='buynow_".$vcount."_".$lettercount."_".$vcost."_".$charArray [$search]."' src='http://dangerousmailer.com/images/paypal_buy.gif' border='0' name='I1' alt='Make payments with PayPal - it\'s fast, free and secure!' width='137' height='57'>
								<img alt='' border='0' src='https://www.paypal.com/en_US/i/scr/pixel.gif' width='1' height='1'></td>";
		$str .="<td>".getDownloadCounter($charArray [$search]."C")."</td>";
		
		$str .= "</tr>";
	}
	$vcost = getValidEmailCost ();
	$str .= "<tr class='totalvalues'>";
	$str .= "<td ><strong>Total</strong></td>";
	$str .= "<td>" . number_format($totalPermutaionAll) . "</td>";
	$str .= "<td>" . number_format($itotalcount) . "</td>";
	$str .= "<td>" . number_format($vtotalcount) . "</td>";
	$str .= "<td>$" .  number_format($vcost,2,'.',',') . "</td>";
	$str .= "<td>$" . number_format($vtotalcount*$vcost,3,'.',',') . "</td>";
	$str .= "<td><input type='image' src='http://dangerousmailer.com/images/paypal_buy.gif' class='class_buynow'  id='buynow_".$vtotalcount."_All Letter_".$vtotalcost."' border='0' name='I1' alt='Make payments with PayPal - it\'s fast, free and secure!' width='137' height='57'>
							<img alt='' border='0' src='https://www.paypal.com/en_US/i/scr/pixel.gif' width='1' height='1'></td>";
	$str .="<td>".getDownloadCounter("CA")."</td>";
	
	$str .= "</tr>";
	
	$str .= "</table>";
	print $str;
	