<div id="main-content">
		<h1>Rediger hendelse</h1>		
		<form class="form-horizontal largeform" action="actions/edit-event.php" method="post" onsubmit="return $(this).validate()">
			<fieldset>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-pencil"></i></span>
					<input type="text" name="title" placeholder="Tittel"   value="<?=$data['title']?>" class="input " data-validation="required">
				</div>
				<div class="input-prepend block">
					<span class="add-on"><i class="icon-building"></i></span>
					<input type="text"name="location" placeholder="Sted" value="<?=$data['location']?>" class="input" data-validation="required">
				</div>
				
				<div class="input-prepend ">
					<span class="add-on"><i class="icon-calendar"></i></span>
					<input type="text" id="new-event-date" placeholder="Dato"  value="<?=$data['date']?>" name="date" class="input datepicker" data-validation="validate_future_date">
				</div>
				
				<div class="input-prepend">
					<span class="add-on"><i class="icon-time"></i></span>
					<input type="text" id="new-event-time-start" placeholder="Start"  value="<?=$data['start']?>"  name="start" class="input timepicker" data-validation="validate_time">
				</div>
				<div class="input-prepend">
					<span class="add-on"><i class="icon-time"></i></span>
					<input type="text" id="new-event-time-end" placeholder="Slutt" name="end"  value="<?=$data['end']?>"  class="input timepicker" data-validation="validate_time">
				</div>               
				<div class="textarea">
					<textarea placeholder="Beskrivelse" name="description"><?=$data['description']?></textarea>
				</div>
				<input type="hidden" name="google_eid"  value="<?=$data['google_eid']?>">
				<input type="hidden" name="event_id"  value="<?=$data['event_id']?>">
				<label class="checkbox">
					<input type="checkbox" name="extro" <? if($data['extro'] == true) echo "checked" ?> value="checkbox">
					Synlig for <?=OLD?>
				</label>
				<label class="checkbox">
					<input type="checkbox" name="email" value="checkbox">
					Send ut epost
				</label>

				<button class="btn btn-default">Lagre hendelse</button>
			</div>

			</fieldset>
		</form>

	</div>
