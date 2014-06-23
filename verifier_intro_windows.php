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
<?php
for($lettercount = START_LETTER_COUNT; $lettercount <= END_LETTER_COUNT; $lettercount ++) {
	
	echo "<div id='main_verifier_" . $lettercount . "' class='main'>";
	echo "<div id='verifier_" . $lettercount . "' class='verifierwindow'>";
	echo "<div class='windowhead'>";
	echo "<p>" . $lettercount . " letter Email validations</p>";
	echo "</div>";
	echo "</div>";
	echo "<div id='verifier_" . $lettercount . "_status'></div>";
	echo "</div>";

}
?>

<div style="clear: both"></div>
	
	</div>


<br />
<br/>




</body>
<script type="text/javascript">

</script>
</html>
