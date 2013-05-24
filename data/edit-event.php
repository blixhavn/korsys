<?
$query = sprintf("SELECT * FROM events WHERE event_id = '%s'", pg_escape_string($_GET['id']));
$event = pg_fetch_assoc(pg_query($query));

$smarter->assign('event_id', $event['event_id']);
$smarter->assign('title', $event['title']);
$smarter->assign('location', $event['location']);
$smarter->assign('description', str_replace("<br />", "\n", $event['description']));
$smarter->assign('google_eid', $event['google_eid']);

$date = date("Y-m-d", strtotime($event['event_start']));
$smarter->assign('date', $date);

$start = substr(date("H:i:s", strtotime($event['event_start'])), 0, -3);
$smarter->assign('start', $start);

$end = substr(date("H:i:s", strtotime($event['event_end'])), 0, -3);
$smarter->assign('end', $end);

$event['event_auth_code'] == -10 ? $extro = true :$extro = false;
$smarter->assign('extro', $extro);

?>