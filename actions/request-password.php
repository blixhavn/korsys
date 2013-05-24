<?php

	require_once("../php-header.php");

	$u = trim($_POST['username']);

	$query = sprintf(" SELECT * FROM users WHERE username = '%s';",
		pg_escape_string($u));
    $result = pg_query($query);

	$string = 'failure';

	if (pg_num_rows($result) == 1)
	{
		$password = generate_code(8);
		$query = sprintf("UPDATE users SET password='%s' where username = '%s';",
			pg_escape_string(sha1($password . $seed)), pg_escape_string($u));
		pg_query($query);
		$string = 'success';
		$row = pg_fetch_assoc($result);

		$message = "
Hei ".$row['first_name']."!

Såvidt jeg kan se har du bedt om nytt passord, dette kan jeg fikse.

Brukernavn:	$u
Passord;	$password

Med vennlig hilsen,
vevmester
";
		mail($row['email'], 'Nytt passord på pirum.no', $message, "From: vevmester@pirum.no");
	}

	header("Location: ./../request-password.php?status=".$string);

?>