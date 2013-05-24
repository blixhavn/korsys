<?

//Get events
$event_query = sprintf("SELECT * FROM events WHERE event_end>'%s' ORDER BY event_start", date("Y-m-d H:i:s"));
$event_result = pg_query($event_query);

while ($row = pg_fetch_assoc($event_result)) {
	$events[] = $row;
}


//Get minus by event
$minus_query = sprintf("SELECT minus.event_id, users.first_name FROM users JOIN minus ON users.user_id = minus.user_id JOIN events ON minus.event_id = events.event_id WHERE events.event_end > '%s' ORDER BY minus.submitted", date("Y-m-d H:i:s"));
$minus_result = pg_query($minus_query);

while ($row = pg_fetch_assoc($minus_result)) {
	$minus[$row['event_id']][] = $row['first_name'];
}

//Variable assignement

$smarter->assign('events', $events);
$smarter->assign('minus', $minus);

?>