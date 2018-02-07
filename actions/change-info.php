<?php
require_once("../php-header.php");

$status="password";

if(isset($_POST['old_pw']) && isLoggedIn() && $_SESSION['user_id'] > -10) {

	$query = sprintf("SELECT user_id FROM users WHERE password = '%s' AND user_id = %s",
			$db->escape_string( sha1($_POST['old_pw'].SEED)), $db->escape_string($_SESSION['user_id']));

	$result = $db->query($query);
	if(($row = $result->fetch_assoc())&&($row['user_id'] == $_SESSION['user_id'])){

		//Make sure the username doesn't exist
		$query = sprintf("SELECT * FROM users WHERE username = '%s'", $db->escape_string($_POST['username']));
		$result = $db->query($query);
		if($result->num_rows > 0 && $_POST['username'] != $_SESSION['username']){
			$status = "exists";
		} else {
			$query = sprintf("UPDATE users SET 	username='%s', first_name='%s', middle_name='%s', last_name='%s', password='%s', email='%s' WHERE user_id = '%s'",

				$db->escape_string($_POST['username']),
				$db->escape_string($_POST['first_name']),
				$db->escape_string($_POST['middle_name']),
				$db->escape_string($_POST['last_name']),
				$db->escape_string((($_POST['new_pw']==$_POST['new_pw2'] && $_POST['new_pw2']!="")
									?
										(sha1($_POST['new_pw'].SEED))
									:
										(sha1($_POST['old_pw'].SEED))
									)
								),

				$db->escape_string($_POST['email']),
				$db->escape_string($_SESSION['user_id'])
			);

			$db->query($query);

			//If username is updated, delete old cookie entries
			if($_SESSION['username'] != $_POST['username']){
				$query = sprintf("DELETE FROM cookies WHERE username = '%s'", $db->escape_string($_SESSION['username']));
				$db->query($query);
			}

			$_SESSION['username'] = $_POST['username'];
			$_SESSION['first_name'] = $_POST['first_name'];
			$_SESSION['middle_name'] = $_POST['middle_name'];
			$_SESSION['last_name'] = $_POST['last_name'];
			$_SESSION['email'] = $_POST['email'];

			$status = "success";
		}
	}
}
header("Location: ./../?show=change-info&status=$status");
?>
