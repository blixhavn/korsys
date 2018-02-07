<?php
require_once("../php-header.php");

if(isLoggedIn() && $_SESSION['auth_code']>=15){

	$oppdragsgiver =	$_POST['oppdragsgiver'];
	$sted = 			$_POST['sted'];
	$dato = 			$_POST['dato'];
	$tid = 				$_POST['tid'];
	$type = 			$_POST['type'];
	$sanger = 			$_POST['sanger'];
	$pris = 			$_POST['pris'];
	$notat =			str_replace("\n","<br>",$_POST['notat']);
	$kontaktperson = 	$_POST['kontaktperson'];
	$kontaktepost = 	$_POST['kontaktepost'];
	$kontaktnr = 		str_replace(" ","",$_POST['kontaktnr']);

	//Insert into DB
	$query = "INSERT INTO oppdrag (oppdragsgiver,sted,dato,oppdragstype,ant_sanger,pris,kontaktperson";

	if($kontaktepost!='') $query .= ",kontaktepost";
	if($kontaktnr!='') $query .= ",kontaktnr";
	if($tid!='') $query .= ",tid";
	if($notat!='') $query .= ",notat";

	$query .=	sprintf(") VALUES ('%s','%s','%s','%s',%s,'%s','%s'",

		$db->escape_string($oppdragsgiver),
		$db->escape_string($sted),
		$db->escape_string($dato),
		$db->escape_string($type),
		$db->escape_string($sanger),
		$db->escape_string($pris),
		$db->escape_string($kontaktperson)
	);

	if($kontaktepost!='') $query .= sprintf(",'%s'", $kontaktepost);
	if($kontaktnr!='') $query .= sprintf(",%s", $kontaktnr);
	if($tid!='') $query .= sprintf(",'%s'", $tid);
	if($notat!='') $query .= sprintf(",'%s'", $notat);


	$query .= ")";
	$db->query($query);

	header("Location: ./../?show=oppdrag");

} else{
	header("Location: ./../");
}

?>
