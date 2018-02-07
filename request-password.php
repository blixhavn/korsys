<?php require("php-header.php");?>

<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
	<title>Pavlovas interne sider</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
	<body>
	<form id="login" class="form-horizontal" method="post" action="./actions/request-password.php">
		<fieldset>
			<h2>Nytt passord</h2>
<?php
if(isset($_GET['status'])){
	if($_GET['status']=='success'){
		echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button>
			 Nytt passord er sendt til din epostadresse.
			</div>";
	}
	else{
		echo "<div class='alert alert-error'><button type='button' class='close' data-dismiss='alert'>&times;</button>
			Brukeren ble ikke funnet, prøv på nytt eller kontakt vevmester.
			</div>";
	}
}
?>
			<input type="text" name="username" placeholder="Brukernavn" class="input"><br>
			<button type="submit" class="btn btn-default">Få nytt passord</button>
		</fieldset>
		<br>
		<a href="./">Tilbake til forsiden</a>
	</form>
	</body>
</html>
