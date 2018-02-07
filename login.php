<?require("php-header.php");?>

<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
	<title>Pavlovas interne sider</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
	<body>
	<form id="login" class="form-horizontal" method="post" action="./actions/login.php">
		<fieldset>
			<h2>Innlogging</h2>

			<?php if($_GET['err']){
				echo "<div class='alert alert-error'>Feil brukernavn eller passord.</div>";
			}?>

			<input type="text" name="username" placeholder="Brukernavn" class="input" autofocus="autofocus">
			<input type="password" name="password" placeholder="Passord" class="input"><br>
			<div class="checkbox">
			  <input type="checkbox" name="stay"> Forbli innlogget
			</div>

			<button type="submit" class="btn btn-default">Logg inn</button>

		</fieldset>
		<br>
		<a href="request-password.php">Glemt passord?</a>
	</form>
	</body>
</html>
