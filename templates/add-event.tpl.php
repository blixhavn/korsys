<div id="main-content">
		<h1>Legg til hendelse</h1>		
		<form class="form-horizontal largeform" action="actions/add-event.php" method="post" onsubmit="return $(this).validate()">
			<fieldset>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-pencil"></i></span>
					<input type="text" name="title" placeholder="Tittel" class="input" data-validation="required">
				</div>
				<div class="input-prepend block">
					<span class="add-on"><i class="icon-building"></i></span>
					<input type="text"name="location" placeholder="Sted" class="input" data-validation="required">
				</div>
				
				<div class="input-prepend ">
					<span class="add-on"><i class="icon-calendar"></i></span>
					<input type="text" id="new-event-date" placeholder="Dato" name="date" class="input datepicker" data-validation="validate_future_date">
				</div>
				
				<div class="input-prepend">
					<span class="add-on"><i class="icon-time"></i></span>
					<input type="text" id="new-event-time-start" placeholder="Start" name="start" class="input timepicker" data-validation="validate_time">
				</div>
				<div class="input-prepend">
					<span class="add-on"><i class="icon-time"></i></span>
					<input type="text" id="new-event-time-end" placeholder="Slutt" name="end" class="input timepicker" data-validation="validate_time">
				</div>               
				<div class="textarea">
					<textarea placeholder="Beskrivelse" name="description"></textarea>
				</div>
				
				<label class="checkbox">
					<input type="checkbox" name="extro" value="checkbox">
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
