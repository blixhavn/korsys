<div id="main-content">
		<h1>Legg til oppdrag</h1>		
		<form class="form-horizontal largeform" id="add-oppdrag" action="actions/add-oppdrag.php" method="post" onsubmit="return $(this).validate()">
			<fieldset>
			<!-- Text input-->
			
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-suitcase"></i></span>
					<input type="text" name="oppdragsgiver" placeholder="Oppdragsgiver" class="input" data-validation="required">
				</div>
			
				<div class="input-prepend block">
					<span class="add-on"><i class="icon-building"></i></span>
					<input type="text" name="sted" placeholder="Sted" class="input" data-validation="required">
				</div>
				
				<div class="input-prepend">
					<span class="add-on"><i class="icon-calendar"></i></span>
					<input type="text"  id="dato" name="dato" placeholder="Dato" class="input datepicker" data-validation="validate_date">
				</div>
				<div class="input-prepend">
					<span class="add-on"><i class="icon-time"></i></span>
					<input type="text" id="tid" name="tid" placeholder="Tid" class="input timepicker" data-validation="validate_time" data-validation-optional="true">
				</div>
				
				<select name="type" id="oppdragstype">
				  <option>Alle</option>
				  <option>Kvartett</option>
				  <option>Oktett</option>
				  <option>Annet</option>
				</select>&nbsp;
				<input type="text" id="sanger" placeholder="Sanger"name="sanger"  class="input" data-validation="validate_num">
				&nbsp;<input type="text" id="pris" name="pris" placeholder="Pris" class="input" data-validation="required">
			
			</div>
			<br>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>
					<input type="text" placeholder="Kontaktperson" name="kontaktperson" id="kontaktperson" class="input" data-validation="required">
				</div>
			</div>
			<label class="control-label"></label>
			<div class="controls">
				<span class="input-prepend">
					<span class="add-on"><i class="icon-envelope"></i></span>
					<input type="text" id="epost" name="kontaktepost" placeholder="Epost" class="input" data-validation="validate_email" data-validation-optional="true">
				</span>
				<span class="input-prepend">
					<span class="add-on"><i class="icon-phone"></i></span>
					<input type="text" id="telefon" name="kontaktnr" placeholder="Telefon" class="input" data-validation="validate_phon" data-validation-optional="true">
				</span>
			</div>
			
			<br>
			<div class="controls">                     
			  <div class="textarea">
				<textarea name="notat" id="notat" placeholder="Notat"></textarea>
			  </div>
			</div>
			
			<!-- Button -->
			<label class="control-label"></label>
			<div class="controls">
			  <button class="btn btn-default">Legg til oppdrag</button>
			</div>

			</fieldset>
		</form>

	</div>
