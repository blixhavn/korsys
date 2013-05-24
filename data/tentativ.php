<?

$query = sprintf("SELECT * FROM oppdrag WHERE bekreftet = 'f' AND dato > '%s' ORDER BY dato ASC", date("Y-m-d", time()));
$result = pg_query($query);

if(pg_num_rows($result) > 0) {
	while($row = pg_fetch_assoc($result)){
		$tentativ[] = $row;
	}

	//Variable assignement
	$smarter->assign('tentativ', $tentativ);

}

?>