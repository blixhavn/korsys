<?php
	include("../php-header.php");
	if(checkLogin($_POST['username'], $_POST['password'])) {
		if($_POST['stay'] != '') {
			set_cookie($_POST['username']);
		}
		header("location: ./../");
	} else {
		header("location: ./../login.php?err=1");
	}
?>
