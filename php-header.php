<?php
session_start();								//Start a session
ini_set('display_errors', 'On');

function fred($val)
{
  echo '<pre>';
   print_r( $val );
  echo '</pre>';
}

if(file_exists(dirname(__FILE__)."/config.php")){
	require_once ("config.php");				//Include all defined configurations
}else{											//Or
	require_once ("default_config.php");		//Include default, empty config file
}
require_once ("functions/db_connect.php");		//Include the database connection
require_once ("functions/functions.php");		//Including all functions

cookie_login();									//Log in if we can find a valid cookie
?>
