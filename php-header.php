<?
session_start();								//Start a session

if(file_exists("config.php")){
	require_once ("config.php");				//Include all defined configurations
}else{
	require_once ("default_config.php");		//Include all defined configurations
}
require_once ("functions/db_connect.php");		//Include the database connection
require_once ("functions/functions.php");		//Including all functions

cookie_login();									//Log in if we can find a valid cookie
?>