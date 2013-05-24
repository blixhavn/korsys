<?php
require_once("../php-header.php");

if(isLoggedIn() && $_SESSION['auth_code']>=15){

	$event_id =		$_POST['event_id'];
	$title = 		$_POST['title'];
	$extro = 		$_POST['extro'];
	$email = 		$_POST['email'];
	$description = 	$_POST['description'];
	$date = 		$_POST['date'];
	$start = 		$_POST['start'];
	$end = 			$_POST['end'];
	$location =		$_POST['location'];
	$google_eid =	$_POST['google_eid'];
	
	update_event($event_id, $title, $extro, $email, $description, $date, $start, $end, $location, $google_eid);
	
	header("Location: ./../?show=events");
} else{
	header("Location: ./../");
}

?>
