<?
require_once("../php-header.php");

if(isLoggedIn() && $_SESSION['auth_code']>=15){
	if($_POST['fakturanr'] != '') {
	
	$query = sprintf("INSERT INTO faktura(oppdrag_id,fakturanr,kommentar) VALUES(%s,'%s', '%s')",
		pg_escape_string($_POST['oppdrag_id']),
		pg_escape_string($_POST['fakturanr']),
		pg_escape_string($_POST['kommentar'])
		);
		
	} else if(isset($_POST['betalt'])) {
		$query = sprintf("UPDATE faktura SET betalt_dato = now() WHERE faktura_id = %s",
		pg_escape_string($_POST['faktura_id'])
		);
	}	
	pg_query($query);
	header("Location: ./../?show=oppdrag");
} else {
	header("Location: ./../");
}
?>