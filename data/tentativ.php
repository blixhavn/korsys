<?php

$query = sprintf("SELECT * FROM oppdrag WHERE bekreftet = 'f' AND dato > '%s' ORDER BY dato ASC", date("Y-m-d", time()));
$result = $db->query($query);

if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
		$tentativ[] = $row;
	}

	//Variable assignement
	$smarter->assign('tentativ', $tentativ);

}

?>
