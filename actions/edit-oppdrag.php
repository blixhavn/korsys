<?php
require_once("../php-header.php");

if(isLoggedIn() && $_SESSION['auth_code']>=15){

	$oppdrag_id =		$_POST['oppdrag_id'];
	$oppdragsgiver =	$_POST['oppdragsgiver'];
	$sted = 			$_POST['sted'];
	$dato = 			$_POST['dato'];
	$tid = 				$_POST['tid'];
	$type = 			$_POST['type'];
	$sanger = 			$_POST['sanger'];
	$pris = 			$_POST['pris'];
	$notat =			$_POST['notat'];
	$kontaktperson = 	$_POST['kontaktperson'];
	$kontaktepost = 	$_POST['kontaktepost'];
	$kontaktnr = 		str_replace(" ","",$_POST['kontaktnr']);


	//Insert into DB
	$query = sprintf("UPDATE oppdrag SET oppdragsgiver = '%s', sted = '%s', dato = '%s', tid = '%s', oppdragstype = '%s', ant_sanger  = %s, pris = '%s' ,notat  = '%s', kontaktperson = '%s'",
		mysql_escape_string($oppdragsgiver),
		mysql_escape_string($sted),
		mysql_escape_string($dato),
		mysql_escape_string($tid),
		mysql_escape_string($type),
		mysql_escape_string($sanger),
		mysql_escape_string($pris),
		mysql_escape_string($notat),
		mysql_escape_string($kontaktperson)
	);

	if($kontaktepost!='') $query .= sprintf(",kontaktepost  = '%s'", mysql_escape_string($kontaktepost));
	if($kontaktnr!='') $query .= sprintf(",kontaktnr  = '%s'", mysql_escape_string($kontaktnr));


	$query .= sprintf(" WHERE oppdrag_id = %s", mysql_escape_string($oppdrag_id));

	mysql_query($query);

	header("Location: ./../?show=oppdrag");

} else{
	header("Location: ./../");
}

?>
