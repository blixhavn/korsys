<?
require_once("../php-header.php");

if(isLoggedIn() && $_SESSION['auth_code']>=15){

	if(isset($_POST['delete'])) {
		delete_event($_POST['delete']);				
		header("Location: ./../?show=events&status=del");
	}
} else{
	header("Location: ./../");
}
?>

