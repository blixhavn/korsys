<?

$query = sprintf("SELECT songs.song_id, songs.title, songs.auth_code AS song_auth_code, songfiles.songfile_id, songfiles.showing_name, songfiles.link, songfiles.voice, songfiles.auth_code AS songfile_auth_code FROM songs LEFT JOIN songfiles ON songs.song_id = songfiles.parent_id ORDER BY songs.title");
$result = pg_query($query);

while($row = pg_fetch_assoc($result)) {
	$songs[$row['song_id']][] = $row;
}

$smarter->assign('songs', $songs);

?>
