<?php
require_once("../php-header.php");

if(isLoggedIn() && $_SESSION['auth_code']>=15){

	$title = 		$_POST['title'];
	$extro = 		$_POST['extro'];
	$email = 		$_POST['email'];
	$description = 	$_POST['description'];
	$date = 		$_POST['date'];
	$start = 		$_POST['start'];
	$end = 			$_POST['end'];
	$location =		$_POST['location'];
	
	add_event($title, $extro, $email,$description, $date, $start, $end, $location);
	
	header("Location: ./../?show=events");
} else{
	header("Location: ./../");
}
?>
