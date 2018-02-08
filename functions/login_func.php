<?php
function isLoggedIn(){
	if(isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
		return true;
	}
  return false;
}

function checkLogin($u, $p) {
	global $db;

	$query = sprintf("
		SELECT *
		FROM users
		WHERE username = '%s' AND password = '%s';
	", $db->escape_string($u), $db->escape_string(sha1($p . SEED)));

	$result = $db->query($query);

	if ($result->num_rows == 1) {
		// Login was successfull

		$row = $result->fetch_assoc();

		$_SESSION['user_id'] = $row['user_id'];			// Save the user ID for use later
		$_SESSION['username'] = $u;						// Save the username for use later
		$_SESSION['first_name'] = $row['first_name'];
		$_SESSION['auth_code'] = $row['auth_code'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['middle_name'] = $row['middle_name'];
		$_SESSION['last_name'] = $row['last_name'];
		$_SESSION['voice'] = $row['voice'];

    return true;
	}
	return false;
}
?>
