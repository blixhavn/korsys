<?php


$HOST = "";		// Database host

$DBUSER = "";			// Database user

$PASS = "";			// Database password

$DB = "";				// Database name


############## Make the pgsql connection ###########

$conn = pg_connect("host=".$HOST."  user=".$DBUSER." password=".$PASS." dbname=".$DB) or  die('Could not connect !<br />Please contact the site\'s administrator.');

pg_set_client_encoding($conn, "UNICODE");	// Retrieve text from DB in UTF-8
?>
