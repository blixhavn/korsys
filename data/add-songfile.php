<?php
$query= sprintf("SELECT title FROM songs WHERE song_id = '%s'", mysql_escape_string($_GET['id']));
$result = $db->query($query);
$row = $result->fetch_row();
$songtitle = $row[0];


$smarter->assign('songtitle', $songtitle);
?>
