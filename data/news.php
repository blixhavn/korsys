<?php
$query = "SELECT news.*, users.first_name, users.last_name FROM news JOIN users ON news.from_id = users.user_id ORDER BY submitted DESC LIMIT 10";
$result = $db->query($query);

while ($row = $result->fetch_assoc()) {
	$row = str_replace("\r", "<br>", $row);
	$news[] = $row;
}
$smarter->assign('news', $news);
?>
