<?
require_once("../php-header.php");

if(isLoggedIn() && $_SESSION['auth_code']>=15){

	if(isset($_POST['tittel']) && isset($_POST['melding'])) {
		$tittel = $_POST['tittel'];
		$melding = $_POST['melding'];
		
		if(isset($_POST['extro'])) {
			$auth_code = -10;
		} else {
			$auth_code = 0;
		}
			
		$query = sprintf("INSERT INTO news (subject, message, from_id, news_auth_code) VALUES ('%s', '%s', '%s', '%s');",
					pg_escape_string($tittel),
					pg_escape_string($melding),
					$_SESSION['user_id'],
					$auth_code);
					
		$result = pg_query($query);
		
		if($_POST['epost']){
			mail('oyblix@gmail.com', "[Pirum.no] ".$tittel, $melding, "From: ".$_SESSION['email']);
		}
		
		header('location: ../index.php?show=news');
	} else {
		header('location: ../index.php?show=add-news');
	}
} else{
	header("Location: ./../");
}
?>