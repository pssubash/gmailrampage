<?php
require_once 'remote.php';
$dbLink = mysqli_connect ( REMOTE_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME ) or die ( "Error " . mysqli_error ( $dbLink ) );
mysqli_query($dbLink,"CALL update_offer_counter()");