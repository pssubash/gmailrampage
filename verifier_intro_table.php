<?php
require_once 'verifier_functions.php';
?>
<!DOCTYPE html>
<html>
<head>
<script src="js/jquery-1.4.1.min.js" type="text/javascript"></script>
<script src="js/verifier_intro.js" type="text/javascript"></script>
<style>
#container {
	width: 1200px;
	height: 800px;
	/*border :1px solid red;*/
	margin: 10px;
	padding: 10px;
}

.verifierwindow {
	width: 500px;
	height: 200px;
	border: 1px solid green;
	float: left;
	overflow: auto;
	margin: 10px;
	padding: 10px;
}

.windowhead {
	width: 500px;
	height: 40px;
	background-color: #000000;
	color: white;
	font-weight: bold;
	padding: 2px;
}

.windowhead p {
	padding-left: 120px;
}

.main { /*border :2px solid yellow;*/
	width: 550px;
	height: 400px;
	float: left;
}

table,th,td {
	border: 1px solid black;
}

.buyvalidemails {
	border: 1px solid #E5EFF8;
	border-collapse: collapse;
}

.buyvalidemails th {
	background-color: green;
	color: white;
	border-left: 1px solid #E5EFF8;
	border-top: 1px solid #E5EFF8;
}

.buyvalidemails td {
	border-left: 1px solid #E5EFF8;
	border-top: 1px solid #E5EFF8; . totalvalues { background-color :
	#B45F04;
	color: white;
	font-weight: bold;
	font-size: 14px;
}

.totalvalues td {
	background-color: #B45F04;
}
</style>
</head>
<body>
<div id="container">


<div style="clear: both"></div>
	<?php
	$startletter = START_LETTER_COUNT;
	$endletter = END_LETTER_COUNT;
	
	?>
	<div id="valid_buynow">
	
	<?php
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
	
	$incount = 0;
	$totalPermutaion = 0;
	$totalPermutaionAll = 0;
	$itotalcount = 0;
	for($lettercount = START_LETTER_COUNT; $lettercount <= END_LETTER_COUNT; $lettercount ++) {
		$vcount = getValidEmailsCount ( $lettercount );
		$totalPermutaion = getTotalPermutaion ( $lettercount );
		$totalPermutaionAll += $totalPermutaion;
		$vtotalcount += $vcount;
		$vcost = getValidEmailCost ();
		$vtotalcost += $vcost;
		$incount = getInvalidEmailsCount ( $lettercount );
		$itotalcount += $incount;
		$str .= "<tr>";
		$str .= "<td>" . $lettercount . " Character </td>";
		$str .= "<td>" . number_format ( $totalPermutaion, 2 ) . "</td>";
		$str .= "<td>" . number_format ( $incount, 2 ) . "</td>";
		$str .= "<td>" . number_format ( $vcount, 2 ) . "</td>";
		$str .= "<td>$" . $vcost . "</td>";
		$str .= "<td>$" . number_format ( $vcount * $vcost, 2, '.', ',' ) . "</td>";
		$str .= "<td><input type='image' src='http://dangerousmailer.com/images/paypal_buy.gif' class='class_buynow' id='buynow_" . $vcount . "_" . $lettercount . "_" . $vcost . "' border='0' name='I1' alt='Make payments with PayPal - it\'s fast, free and secure!' width='137' height='57'>
							<img alt='' border='0' src='https://www.paypal.com/en_US/i/scr/pixel.gif' width='1' height='1'></td>";
		$str .="<td>".getDownloadCounter($lettercount."P")."</td>";
		$str .= "</tr>";
	}
	$vcost = getValidEmailCost ();
	$str .= "<tr class='totalvalues'>";
	$str .= "<td><strong>Total</strong></td>";
	$str .= "<td>" . number_format ( $totalPermutaionAll, 2 ) . "</td>";
	$str .= "<td>" . number_format ( $itotalcount, 2 ) . "</td>";
	$str .= "<td>" . number_format ( $vtotalcount, 2 ) . "</td>";
	
	$str .= "<td>$" . number_format ( $vcost, 3, '.', ',' ) . "</td>";
	$str .= "<td>$" . number_format ( $vcost * $vtotalcount, 2, '.', ',' ) . "</td>";
	$str .= "<td><input type='image' class='class_buynow'  id='buynow_" . $vtotalcount . "_All Letter_" . $vtotalcost . "' src='http://dangerousmailer.com/images/paypal_buy.gif' border='0' name='I1' alt='Make payments with PayPal - it\'s fast, free and secure!' width='137' height='57'>
							<img alt='' border='0' src='https://www.paypal.com/en_US/i/scr/pixel.gif' width='1' height='1'></td>";
	$str .="<td>".getDownloadCounter("PA")."</td>";
	$str .= "</tr>";
	
	$str .= "</table>";
	print $str;
	?>
	</div>


<br />
<br/>
<?php if (OFFER_PRICE > 0) { ?>
<p style="color:green;font-size:22px;">
ALL CHARACTERS | 
OFFER PRICE - <?php echo '$'.OFFER_PRICE?>   <input type='image' src='http://dangerousmailer.com/images/paypal_buy.gif' class='offer_buy_now'  id='jdsfjdfh'  name='I1' alt="Make payments with PayPal - its fast, free and secure!" width='137' height='57' style="border:none;"/>
							<img alt='' border='0' src='https://www.paypal.com/en_US/i/scr/pixel.gif' width='1' height='1'> 
							<span id='span_offer_count'><?php echo getOfferDownloadCounter ();?></span>
							</p>


<?php }?>
<br />
<br />
<div id="valid_buynow_character">
	
	<?php
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
		$str .= "<td>" . number_format ( $totalPermutaion) . "</td>";
		$str .= "<td>" . number_format ( $incount ) . "</td>";
		$str .= "<td>" . number_format ( $vcount) . "</td>";
		$str .= "<td>$" . number_format ( $vcost, 3, '.', ',' ) . "</td>";
		$str .= "<td>$" . number_format ( $vcost * $vcount, 3, '.', ',' ) . "</td>";
		$str .= "<td><input type='image'  class='class_buynow_char'  id='buynow_" . $vcount . "_" . $lettercount . "_" . $vcost . "_" . $charArray [$search] . "' src='http://dangerousmailer.com/images/paypal_buy.gif' border='0' name='I1' alt='Make payments with PayPal - it\'s fast, free and secure!' width='137' height='57'>
								<img alt='' border='0' src='https://www.paypal.com/en_US/i/scr/pixel.gif' width='1' height='1'></td>";
		$str .="<td>".getDownloadCounter($charArray [$search]."C")."</td>";
		$str .= "</tr>";
	}
	$vcost = getValidEmailCost ();
	$str .= "<tr class='totalvalues'>";
	$str .= "<td ><strong>Total</strong></td>";
	$str .= "<td>" . number_format ( $totalPermutaionAll) . "</td>";
	$str .= "<td>" . number_format ( $itotalcount ) . "</td>";
	$str .= "<td>" . number_format ( $vtotalcount ) . "</td>";
	$str .= "<td>$" . number_format ( $vcost, 2, '.', ',' ) . "</td>";
	$str .= "<td>$" . number_format ( $vtotalcount * $vcost, 3, '.', ',' ) . "</td>";
	$str .= "<td><input type='image' src='http://dangerousmailer.com/images/paypal_buy.gif' class='class_buynow'  id='buynow_" . $vtotalcount . "_All Letter_" . $vtotalcost . "' border='0' name='I1' alt='Make payments with PayPal - it\'s fast, free and secure!' width='137' height='57'>
							<img alt='' border='0' src='https://www.paypal.com/en_US/i/scr/pixel.gif' width='1' height='1'></td>";
	$str .="<td>".getDownloadCounter("CA")."</td>";
	$str .= "</tr>";
	
	$str .= "</table>";
	$str .= "</table>";
	print $str;
	?>
	</div>
	<br/>
<?php if (OFFER_PRICE > 0) { ?>
<p style="color:green;font-size:22px;">
ALL CHARACTERS | 
OFFER PRICE - <?php echo '$'.OFFER_PRICE?>   <input type='image' src='http://dangerousmailer.com/images/paypal_buy.gif' class='offer_buy_now'  id='jdsfjdfh'  name='I1' alt="Make payments with PayPal - its fast, free and secure!" width='137' height='57' style="border:none;"/>
							<img alt='' border='0' src='https://www.paypal.com/en_US/i/scr/pixel.gif' width='1' height='1'> 
							<span id='span_offer_count'><?php echo getOfferDownloadCounter();?></span>
							</p>
</div>

<?php }?>
<input type="hidden" name="hid_offer_price" id="hid_offer_price" value="<?php echo OFFER_PRICE;?>"/>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post"
	target="_blank" dir="ltr" name="frm_paypal" id="frm_paypal"><input
	type="hidden" name="cmd" value="_xclick"> <input type="hidden"
	name="business" value="<?php
	echo PAYPAL_EMAIL;
	?>"> <input type="hidden" name="undefined_quantity" value="1"> <input
	type="hidden" name="item_name" id="item_name"
	value="DANGEROUS MAILER CLONED VERSION $25 ONE TIME PAYMENT"> <input
	type="hidden" name="amount" id="amount" value="25.00"> <input
	type="hidden" name="page_style" value="Primary"> <input type="hidden"
	name="no_shipping" value="0"> <input type="hidden" name="return"
	value="http://www.gmailrampage.com/-----paymentcomplete-----.htm"> <input
	type="hidden" name="currency_code" value="USD"> <input type="hidden"
	name="lc" value="US"> <input type="hidden" name="bn"
	value="PP-BuyNowBF"></form>


</body>
<script type="text/javascript">

</script>
</html>
