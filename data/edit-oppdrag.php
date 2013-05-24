<?
$query = sprintf("SELECT * FROM oppdrag WHERE oppdrag_id = '%s'", pg_escape_string($_GET['id']));
$oppdrag = pg_fetch_assoc(pg_query($query));

$smarter->assign('oppdrag', $oppdrag);
?>