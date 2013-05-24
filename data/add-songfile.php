<?
$query= sprintf("SELECT title FROM songs WHERE song_id = '%s'", pg_escape_string($_GET['id']));
$result = pg_query($query);
$row = pg_fetch_row($result);
$songtitle = $row[0];


$smarter->assign('songtitle', $songtitle);
?>