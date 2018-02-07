<?php

define('DBUSER', '');
define('DBPASS', '');
define('DBSERVER', '');
define('DBNAME', '');

############## Make the MySQL connection ###########


$db = new mysqli(DBSERVER, DBUSER, DBPASS, DBNAME);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$db->set_charset('utf8');	// Retrieve text from DB in UTF-8
?>
