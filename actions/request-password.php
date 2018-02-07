<?php

	require_once("../php-header.php");

	$u = trim($_POST['username']);

	$query = sprintf(" SELECT * FROM users WHERE username = '%s';",
		$db->escape_string($u));
    $result = $db->query($query);

	$string = 'failure';

	if ($result->num_rows == 1)
	{
		$user = $result->fetch_assoc();
		$password = generate_code(8);
		$query = sprintf("UPDATE users SET password='%s' where username = '%s';",
			$db->escape_string(sha1($password . $seed)), $db->escape_string($u));
		$result = $db->query($query);
		$string = 'success';

		$message = "
Hei ".$user['first_name']."!

Såvidt jeg kan se har du bedt om nytt passord, dette kan jeg fikse.

Brukernavn:	$u
Passord;	$password

Med vennlig hilsen,
vevmester
";
		mail($user['email'], 'Nytt passord på pirum.no', $message, "From: vevmester@pirum.no");
	}

	header("Location: ./../request-password.php?status=".$string);

?>
