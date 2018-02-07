<?php


$HOST = "";		// Database host

$DBUSER = "";			// Database user

$PASS = "";			// Database password

$DB = "";				// Database name


############## Make the pgsql connection ###########

$conn = mysql_connect("host=".$HOST."  user=".$DBUSER." password=".$PASS." dbname=".$DB) or  die('Could not connect !<br />Please contact the site\'s administrator.');

mysql_set_charset('utf8', $conn);	// Retrieve text from DB in UTF-8
?>
