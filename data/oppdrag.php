<?
$query = "SELECT oppdrag.oppdrag_id, bekreftet, dato, tid, sted, oppdragsgiver, oppdragstype, ant_sanger, pris, kontaktperson, kontaktnr, kontaktepost, notat, faktura_id, fakturanr, betalt_dato, kommentar, sendt_dato FROM oppdrag LEFT JOIN faktura on oppdrag.oppdrag_id = faktura.oppdrag_id ORDER BY dato";
$result = pg_query($query);

while($row = pg_fetch_assoc($result)){
	if($row['dato'] >= date("Y-m-d")) {
		
		if($row['bekreftet'] == 't')
			$bekreftede_oppdrag[] = $row;
		else
			$tentative_oppdrag[] = $row;
			
	} else if($row['bekreftet']){
		//Sjekk om faktura ble sendt for over to uker siden
		if(strtotime($row['sendt_dato']) < strtotime("-2 week")) {
			$color = "red";
		} else {
			$color = "grey";
		}
		$row['datofarge'] = $color;
		$utforte_oppdrag[] = $row;
		
	}
}
$smarter->assign('bekreftede_oppdrag', $bekreftede_oppdrag);
$smarter->assign('tentative_oppdrag', $tentative_oppdrag);
$smarter->assign('utforte_oppdrag', array_reverse($utforte_oppdrag));
?>