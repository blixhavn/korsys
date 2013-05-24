<?

function get_filetype($link) {
	$parts = explode(".", $link);
	return $parts[count($parts) - 1];
}

function any_songfiles($song) {
	foreach($song as $songfile) {
		if($songfile['voice'] == '0' || $songfile['voice'] == $_SESSION['voice'])
			return true;
	}
	return false;
}
?>
