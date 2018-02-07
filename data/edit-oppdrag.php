<?php
$query = sprintf("SELECT * FROM oppdrag WHERE oppdrag_id = '%s'", $db->escape_string($_GET['id']));
$oppdrag = $db->query($query)->fetch_assoc();

$smarter->assign('oppdrag', $oppdrag);
?>
