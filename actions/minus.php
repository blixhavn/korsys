<?
require_once("../php-header.php");

if(isLoggedIn()){
	
	$query = sprintf("INSERT INTO minus (commentary, event_id, user_id) VALUES ('%s', '%s', '%s');",
			pg_escape_string($_POST['minusmelding']),
			pg_escape_string($_POST['event_id']),
			$_SESSION['user_id']);	
	pg_query($query);
	
	
	//Send email til minus-ansvarlig
	$event_query = sprintf("SELECT title, event_start FROM events WHERE event_id = %s", pg_escape_string($_POST['event_id']));
	$event = pg_fetch_assoc(pg_query($event_query));
	$message = "Hei,

En minusmelding er mottatt fra ".$_SESSION['first_name']." for ".$event['title'].", ".datetime_to_norstring($event['event_start']).":

Kommentar:
".$_POST['minusmelding'];


	
	mail(MINUS_EMAIL, "Minusmelding: ".$event['title'], $message, "From: ".$_SESSION['first_name']." ".$_SESSION['last_name']." <".$_SESSION['email'].">");
	
	header('location: ../index.php?show=events&status=minus_sent');
} else{
	header("Location: ./../");
}
?>
