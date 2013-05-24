<?
require_once("../php-header.php");

if(isLoggedIn() && $_SESSION['auth_code']>=13){
	
	$desc = $_POST['desc'];
	$amount = str_replace(',', '.', $_POST['amount']);
	$user_id = $_POST['user_id'];
	$bilag = $_POST['bilag'];
	
	if($bilag != '') {
	$query = sprintf("INSERT INTO transactions (description, amount, user_id, bilag_nr) VALUES('%s', '%s', '%s', '%s')",
				pg_escape_string($desc),
				pg_escape_string($amount),
				pg_escape_string($user_id),
				pg_escape_string($bilag));
				
	} else {
	$query = sprintf("INSERT INTO transactions (description, amount, user_id) VALUES('%s', '%s', '%s')",
				pg_escape_string($desc),
				pg_escape_string($amount),
				pg_escape_string($user_id));
	}
	pg_query($query);
	
	header("Location: ./../?show=admin-personlig&show_user=".$user_id);

} else{
	header("Location: ./../");
}
?>