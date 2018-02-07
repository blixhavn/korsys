<div id="main-content">
		<h1>Tentative oppdrag</h1>
<?php 


if(isLoggedIn() && $_SESSION['auth_code']>=0){
	

	//Show all events
	if(isset($data['tentativ'])) {
		foreach($data['tentativ'] as $tentativ){
	?>
			<div class="event">
				<div class="row">
					<h2><?=datetime_to_date_stor($tentativ['dato'])." - ".$tentativ['oppdragsgiver']?></h2>
					<div class="span2">
						<div class="event_time">
							<?=datetime_to_time($tentativ['tid'])?>
						</div>
						<p>
							<strong><?=$tentativ['sted']?></strong>
						</p>
					</div>
					<div class="span7">
					</div>
				</div>
			</div>
	<?php 
		}
	} else {
		echo "Oj, ingenting å gjøre!";
	}
} else {
	echo "Du har ikke tilgang til denne siden.";
}
?>
	</div>
