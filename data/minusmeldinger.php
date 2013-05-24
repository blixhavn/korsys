<?
// Hent fremtidige minusmeldinger
$query = sprintf ("SELECT minus.*, events.event_start, events.title, users.first_name FROM minus JOIN users ON minus.user_id = users.user_id JOIN events ON minus.event_id = events.event_id WHERE events.event_end >= '%s' ORDER BY events.event_start", date("Y-m-d H:i:s"));
$result = pg_query($query);

while($row = pg_fetch_assoc($result)){
	if(is_minus_valid(strtotime($row['submitted']), strtotime($row['event_start']))) {
		$valid = "valid";
	} else {
		$valid = "";
	}
	$row['valid'] = $valid;
	$minus[$row['event_id']][] = $row;
}

// Hent tidligere minusmeldinger
$query = sprintf ("SELECT minus.*, events.event_start, events.title, users.first_name FROM minus JOIN users ON minus.user_id = users.user_id JOIN events ON minus.event_id = events.event_id WHERE events.event_end < '%s' ORDER BY events.event_start DESC", date("Y-m-d H:i:s"));
$result = pg_query($query);

while($row = pg_fetch_assoc($result)){
	if(is_minus_valid(strtotime($row['submitted']), strtotime($row['event_start']))) {
		$valid = "valid";
	} else {
		$valid = "";
	}
	$row['valid'] = $valid;
	$tidligere[$row['event_id']][] = $row;
}

$smarter->assign('minus', $minus);
$smarter->assign('tidligere', $tidligere);

?>