<?php

function cookie_login() {
	global $db;

	if(isset($_COOKIE['pirweb']) && !isset($_SESSION['user_id'])) {
		$query = sprintf("SELECT * FROM cookies WHERE cookie_key = '%s'", mysql_escape_string($_COOKIE['pirweb']));
		$result = $db->query($query);

		if ($result->num_rows == 1)	{
			$cookie_match = $result->fetch_assoc();
			if(true) {

				$query = sprintf("SELECT * FROM users WHERE username = '%s'", mysql_escape_string($cookie_match['username']));
				$result = $db->query($query);

				if ($result->num_rows == 1)	{

					$row = $result->fetch_assoc();

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
	global $db;
	
	$cookie_key = sha1($username . SEED);
	$expires_epoch = time()+60*60*24*30;
	$expires_string = date("Y-m-d H:i:s", $expires_epoch);

	$query = sprintf("SELECT * FROM cookies WHERE cookie_key = '%s'", mysql_escape_string($cookie_key));

	//Does this user have an active cookie? In that case, update it
	$result = $db->query($query);
	if ($result->num_rows > 0) {
		$query = sprintf("UPDATE cookies SET expires = '%s' WHERE cookie_key = '%s'", $expires_string, mysql_escape_string($cookie_key));
		$db->query($query);
	// If not, create new entry
	} else {
		$query = sprintf("INSERT INTO cookies(cookie_key, username, expires) VALUES('%s', '%s', '%s')", mysql_escape_string($cookie_key), mysql_escape_string($username), $expires_string);
		$db->query($query);
	}

	setcookie('korsys', $cookie_key, $expires_epoch, '/', DOMAIN, false, true);
}

function delete_cookie() {
	if($_COOKIE['korsys'] != '') {
		$query = sprintf("DELETE FROM cookies WHERE cookie_key = '%s'", $db->escape_string($_COOKIE['korsys']));
		$db->query($query);

		setcookie('korsys','',time()-3600);
	}
}
?>
