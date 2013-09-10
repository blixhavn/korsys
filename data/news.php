<?
$query = "SELECT news.*, users.first_name, users.last_name FROM news JOIN users ON news.from_id = users.user_id ORDER BY submitted DESC LIMIT 10";
$result = pg_query($query);

while ($row = pg_fetch_assoc($result)) {
	$row = str_replace("\r", "<br>", $row);
	$news[] = $row;
}
$smarter->assign('news', $news);
?>
