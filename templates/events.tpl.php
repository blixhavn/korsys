<div id="main-content">
		<h1>Semesterplan</h1>
<?php 

//Show status feedback
switch($_GET['status']){
	case 'minus_sent':
		echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button>
			 Minusmelding sendt.
			</div>";
		break;
	case 'del':
		echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button>
			 Hendelse slettet.
			</div>";
		break;
		
}
//Show all events
if(isset($data['events'])) {
	foreach($data['events'] as $event){
		if($_SESSION['auth_code'] >= $event['event_auth_code']) {
?>
		<div class="event">
			<div class="row">
				<h2><?=datetime_to_norstring_stor($event['event_start'])." - ".$event['title']?></h2>
				<div class="span2">
					<div class="event_time">
						<?=datetime_to_time($event['event_start'])?>
					</div>
					<p>
						<strong><?=$event['location']?></strong><br>
						Ferdig kl <?=datetime_to_time($event['event_end'])?>
						<br><br>
					</p>
					<div class="menu">
						<button class="menu-elem" onClick="toggleDiv('minus_<?=$event['event_id']?>')">Minus</button>
			<?php if($_SESSION['auth_code'] >= 15) { ?>
						<a class="menu-elem" href="?show=edit-event&id=<?=$event['event_id']?>">Endre hendelse</a>
						<form class="confirm" method="post" action="actions/events.php">
							<input type="hidden" name="delete" value="<?=$event['event_id']?>">
							<button class="menu-elem" type="submit">Slett hendelse</button>
						</form>
			<?php }?>
					</div>
			<?php if(isset($data['minus'][$event['event_id']])) {
				$minus = implode(", ", $data['minus'][$event['event_id']]);?>
					<div class="minusliste">
						<strong>Minus:</strong>
						<p><?=$minus?></p>
					</div>
			<?php }?>
				</div>
				<div class="span7">
					<?=$event['description']?>
				</div>
			</div>
			<div class="minusfelt" id="minus_<?=$event['event_id']?>">
				<form class="form-horizontal" method="post" action="actions/minus.php">
					<fieldset>        
					  <div class="textarea">
						<textarea name="minusmelding"></textarea>
					  </div>
					  <input type="hidden" name="event_id" value="<?=$event['event_id']?>">
					  <button type="submit" class="btn btn-default">Send minusmelding</button>
					</fieldset>
				</form>

			</div>
		</div>
<?php 
		}
	}
} else {
	echo "Oj, ingenting å gjøre!";
}
?>
	</div>
