<?php
require_once("../php-header.php");

if(isLoggedIn() && $_SESSION['auth_code']>=15){

	if($_GET['action'] == "bekreft-oppdrag") {
		$query = "UPDATE oppdrag SET bekreftet = 't'";
		if($_GET['semesterplan'] !='') {
			$query2 = "SELECT * FROM oppdrag WHERE oppdrag_id = ".$db->escape_string($_GET['id']);
			$oppdrag = $db->query($query2)->fetch_assoc();
			$event_id = add_event(
						"Oppdrag for ".$oppdrag['oppdragsgiver'],
						false,
						true,
						$oppdrag['oppdragstype'].", ".$oppdrag['ant_sanger']." sanger",
						$oppdrag['dato'],
						date("H:i", strtotime($oppdrag['tid']." -45 minutes")),
						date("H:i", strtotime($oppdrag['tid']." +20 minutes")),
						$oppdrag['sted']
					);
			$query .= ", event_id=".$event_id;
		}
		$query .= " WHERE oppdrag_id = ".$db->escape_string($_GET['id']);
		$db->query($query);


		header("Location: ./../?show=oppdrag&status=bekreftet#bekreftet");
	} else if($_GET['action'] == "slett-oppdrag") {
		//Any assigned event? Delete that too!
		$query = "SELECT event_id FROM oppdrag WHERE  oppdrag_id = ".$_GET['id'];
		$row = $db->query($query)->fetch_assoc();
		if($row['event_id'] != '')
			delete_event($row['event_id']);

		$query = "DELETE FROM oppdrag WHERE oppdrag_id = ".$_GET['id'];
		$db->query($query);
		header("Location: ./../?show=oppdrag&status=del");
	}
} else{
	header("Location: ./../");
}
?>
