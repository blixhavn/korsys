<?

function cookie_login() {
	if(isset($_COOKIE['pirweb']) && !isset($_SESSION['user_id'])) {
		$query = sprintf("SELECT * FROM cookies WHERE cookie_key = '%s'", pg_escape_string($_COOKIE['pirweb']));
		$result = pg_query($query);
		
		if (pg_num_rows($result) == 1)	{
			$cookie_match = pg_fetch_assoc($result);
			if(true) {
			
				$query = sprintf("SELECT * FROM users WHERE username = '%s'", pg_escape_string($cookie_match['username']));
				$result = pg_query($query);	

				if (pg_num_rows($result) == 1){	
				
					$row = pg_fetch_assoc($result);
					
					$_SESSION['user_id'] = $row['user_id'];			
					$_SESSION['username'] = $row['username'];					
					$_SESSION['first_name'] = $row['first_name'];
					$_SESSION['auth_code'] = $row['auth_code'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['middle_name'] = $row['middle_name'];
					$_SESSION['last_name'] = $row['last_name'];
					$_SESSION['voice'] = $row['voice'];
					
					return true;
				}
			}
		}
	}
	
	return false;
}


function set_cookie($username) {
	global $seed; // global because $seed is declared in the php_header.php file
	
	$cookie_key = sha1($username . $seed);
	$expires_epoch = time()+60*60*24*30;
	$expires_string = date("Y-m-d H:i:s", $expires_epoch);
	
	$query = sprintf("SELECT * FROM cookies WHERE cookie_key = '%s'", pg_escape_string($cookie_key));
	
	//Does this user have an active cookie? In that case, update it
	if(pg_num_rows(pg_query($query)) > 0) {
		$query = sprintf("UPDATE cookies SET expires = '%s' WHERE cookie_key = '%s'", $expires_string, pg_escape_string($cookie_key));
		pg_query($query);
	// If not, create new entry
	} else {
		$query = sprintf("INSERT INTO cookies(cookie_key, username, expires) VALUES('%s', '%s', '%s')", pg_escape_string($cookie_key), pg_escape_string($username), $expires_string);
		pg_query($query);
	}
	
	setcookie('pirweb', $cookie_key, $expires_epoch, '/', 'pirum.no', false, true);
}

function delete_cookie() {
	if($_COOKIE['pirweb'] != '') {
		$query = sprintf("DELETE FROM cookies WHERE cookie_key = '%s'", pg_escape_string($_COOKIE['pirweb']));
		pg_query($query);
		
		setcookie('pirweb','',time()-3600);
	}
}
?>