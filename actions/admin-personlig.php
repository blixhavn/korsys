<?php
require_once("../php-header.php");

if(isLoggedIn() && $_SESSION['auth_code']>=13){

	$desc = $_POST['desc'];
	$amount = str_replace(',', '.', $_POST['amount']);
	$user_id = $_POST['user_id'];
	$bilag = $_POST['bilag'];

	if($bilag != '') {
	$query = sprintf("INSERT INTO transactions (description, amount, user_id, bilag_nr) VALUES('%s', '%s', '%s', '%s')",
				mysql_escape_string($desc),
				mysql_escape_string($amount),
				mysql_escape_string($user_id),
				mysql_escape_string($bilag));

	} else {
	$query = sprintf("INSERT INTO transactions (description, amount, user_id) VALUES('%s', '%s', '%s')",
				mysql_escape_string($desc),
				mysql_escape_string($amount),
				mysql_escape_string($user_id));
	}
	mysql_query($query);

	header("Location: ./../?show=admin-personlig&show_user=".$user_id);

} else{
	header("Location: ./../");
}
?>
