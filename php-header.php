<?php
// Start a session
session_start();


if(file_exists(dirname(__FILE__)."/config.php")){
  // Include all defined configurations
	require_once (dirname(__FILE__)."/config.php");
}else{
  // Include default, empty config file
	require_once (dirname(__FILE__)."/default_config.php");
}

// Set default timezone
date_default_timezone_set(TIMEZONE);

//Include all functions
require_once (dirname(__FILE__)."/functions/functions.php");

//Log in if we can find a valid cookie
cookie_login();

?>
