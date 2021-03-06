<?

function add_event($title, $extro, $email,$description, $date, $start, $end, $location) {
	
	//echo $title.", ".$extro.", ".$email.", desc: ".$description.", dato: ".$date.", start: ".$start.", end: ".$end.", sted: ".$location;
	
	
	global $google_cal;
	
	
		$startstring = $date." ".$start.":00";
	$endstring = $date." ".$end.":00";

	$databasedesc = str_replace("\n","<br />",$description);
	$description = str_replace("<br />","\n",$description);


	// Create google calendar event
	$event = new Google_Event();
	$event->setSummary(stripslashes($title));
	$event->setLocation(stripslashes($location));
	$g_start = new Google_EventDateTime();
	$g_start->setDateTime($date."T".$start.":00");
	$g_start->setTimeZone("Europe/Oslo");
	$event->setStart($g_start);
	$g_end = new Google_EventDateTime();
	$g_end->setDateTime($date."T".$end.":00");
	$g_end->setTimeZone("Europe/Oslo");
	$event->setEnd($g_end);
	$createdEvent = $google_cal->events->insert(GCAL_CAL_ID, $event);
	
	//Insert event into DB
	$query = sprintf ("INSERT INTO events (title, description, event_start, event_end, event_auth_code, location, google_eid) VALUES ('%s','%s','%s','%s','%s','%s','%s') RETURNING event_id",

		pg_escape_string($title),
		pg_escape_string($databasedesc),
		$startstring,
		$endstring,
		$extro ? -10 : 0,
		pg_escape_string($location),
		$createdEvent['id']
	);
	$row = pg_fetch_assoc(pg_query($query));
	$event_id = $row['event_id'];



	// Create email
	$message = "Hei,

En ny hendelse er satt opp på semesterplanen:

Tittel: ".stripslashes($title)."
Sted: ".stripslashes($location)."
Dato: ".datetime_to_date_stor($date)."
Start: ".$start."
Slutt: ".$end."

Kommentar:
".stripslashes($description)."

DU KOMMER!!!

Hilsen
".$_SESSION['first_name'];


	if($email){
		mail(EMAIL, "Ny hendelse: ".$title, $message, "From: ".$_SESSION['email']);
	}
	return $event_id;
}

function update_event($event_id, $title, $extro, $email, $description, $date, $start, $end, $location, $google_eid) {

	global $google_cal;
	
	$startstring = $date." ".$start.":00";
	$endstring = $date." ".$end.":00";

	$databasedesc = str_replace("\n","<br />",$description);
	$description = str_replace("<br />","\n",$description);

	//If the time is changed, notify people listed as minus
	$query = sprintf("SELECT event_start FROM events WHERE event_id = %s", pg_escape_string($event_id));
	$event = pg_fetch_assoc(pg_query($query));
	if($event['event_start'] != $startstring){
		$query = sprintf("SELECT email FROM users JOIN minus ON users.user_id = minus.user_id WHERE minus.event_id = '%s'", pg_escape_string($event_id));
		$result = pg_query($query);
		if(pg_num_rows($result) > 0) {
			while($row = pg_fetch_assoc($result)) {
				$minusemails .= $row['email'].", ";
			}
			$minusemails = substr($minusemails, 0, -2);
			$minusmessage = "Hei,
			
	En hendelse du er i minus på har endret tidspunkt. Sjekk om du fremdeles ikke kan.
			
	Tittel: ".stripslashes($title)."
	Sted: ".stripslashes($location)."
	Dato: ".datetime_to_date_stor($date)."
	Start: ".$start."
	Slutt: ".$end."

	Hilsen
	".$_SESSION['first_name'];
			
			mail($minusemails, "Minushendelse endret: ".$title, $minusmessage, "From: ".$_SESSION['email']);
		}
	}

	// Update google calendar event
	$event = new Google_Event($google_cal->events->get(GCAL_CAL_ID, $google_eid));
	$event->setSummary(stripslashes($title));
	$event->setLocation(stripslashes($location));
	$g_start = new Google_EventDateTime();
	$g_start->setDateTime($date."T".$start.":00");
	$g_start->setTimeZone("Europe/Oslo");
	$event->setStart($g_start);
	$g_end = new Google_EventDateTime();
	$g_end->setDateTime($date."T".$end.":00");
	$g_end->setTimeZone("Europe/Oslo");
	$event->setEnd($g_end);
	$updatedEvent = $google_cal->events->update(GCAL_CAL_ID, $google_eid, $event);
	
	//Update event in DB
	$query = sprintf ("UPDATE events SET
		title = '%s',
		description = '%s',
		event_start = '%s',
		event_end = '%s',
		event_auth_code = '%s',
		location = '%s'
		WHERE event_id = %s",
		
		pg_escape_string($title),
		pg_escape_string($databasedesc),
		$startstring,
		$endstring,
		$extro ? -10 : 0,
		pg_escape_string($location),
		pg_escape_string($event_id)
	);
	pg_query($query);



	// Create email
	$message = "Hei,

En hendelse på semesterplanen er endret:

Tittel: ".stripslashes($title)."
Sted: ".stripslashes($location)."
Dato: ".datetime_to_date_stor($date)."
Start: ".$start."
Slutt: ".$end."

Kommentar:
".stripslashes($description)."

Hilsen
".$_SESSION['first_name'];


	if($email){
		mail(EMAIL, "Hendelse endret: ".$title, $message, "From: ".$_SESSION['email']);
	}
}

function delete_event($event_id) {
	global $google_cal;
	
	$query = sprintf("SELECT google_eid FROM events WHERE event_id = '%s'", pg_escape_string($event_id));
	$row = pg_fetch_assoc(pg_query($query));
	$google_eid = $row['google_eid'];
	$google_cal->events->delete(GCAL_CAL_ID, $google_eid);
	
	//Delete from database
	$query = sprintf("DELETE FROM events WHERE event_id = '%s'", pg_escape_string($event_id));
	pg_query($query);
}
?>
