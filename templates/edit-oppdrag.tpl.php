<div id="main-content">
		<h1>Rediger oppdrag</h1>	
		<form class="form-horizontal largeform" id="add-oppdrag" action="actions/edit-oppdrag.php" method="post" onsubmit="return $(this).validate()">
			<fieldset>
			<!-- Text input-->
			
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-suitcase"></i></span>
					<input type="text" name="oppdragsgiver" placeholder="Oppdragsgiver" value="<?=$data['oppdrag']['oppdragsgiver']?>" class="input" data-validation="required">
				</div>
			
				<div class="input-prepend block">
					<span class="add-on"><i class="icon-building"></i></span>
					<input type="text" name="sted" placeholder="Sted" value="<?=$data['oppdrag']['sted']?>"  class="input" data-validation="required">
				</div>
				
				<div class="input-prepend">
					<span class="add-on"><i class="icon-calendar"></i></span>
					<input type="text" id="dato" name="dato" placeholder="Dato" value="<?=$data['oppdrag']['dato']?>"  class="input datepicker" data-validation="validate_future_date">
				</div>
				<div class="input-prepend">
					<span class="add-on"><i class="icon-time"></i></span>
					<input type="text" id="tid" name="tid" placeholder="Tid" value="<?=substr($data['oppdrag']['tid'], 0 ,-3)?>"  class="input timepicker" data-validation="validate_time" data-validation-optional="true">
				</div>
				
				<select name="type" id="oppdragstype">
				  <option<?php if($data['oppdrag']['oppdragstype'] == 'Alle') echo " selected "?>>Alle</option>
				  <option<?php if($data['oppdrag']['oppdragstype'] == 'Kvartett') echo " selected "?>>Kvartett</option>
				  <option<?php if($data['oppdrag']['oppdragstype'] == 'Oktett') echo " selected "?>>Oktett</option>
				  <option<?php if($data['oppdrag']['oppdragstype'] == 'Annet') echo " selected "?>>Annet</option>
				</select>&nbsp;
				<input type="text" id="sanger" placeholder="Sanger" value="<?=$data['oppdrag']['ant_sanger']?>"  name="sanger"  class="input" data-validation="validate_num">
				&nbsp;<input type="text" id="pris" name="pris" placeholder="Pris" value="<?=$data['oppdrag']['pris']?>"  class="input" data-validation="required">
			
			</div>
			<br>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>
					<input type="text" placeholder="Kontaktperson"  value="<?=$data['oppdrag']['kontaktperson']?>" name="kontaktperson" id="kontaktperson" class="input" data-validation="required">
				</div>
			</div>
			<label class="control-label"></label>
			<div class="controls">
				<span class="input-prepend">
					<span class="add-on"><i class="icon-envelope"></i></span>
					<input type="text" id="epost" name="kontaktepost" placeholder="Epost" value="<?=$data['oppdrag']['kontaktepost']?>"  class="input" data-validation="validate_email" data-validation-optional="true">
				</span>
				<span class="input-prepend">
					<span class="add-on"><i class="icon-phone"></i></span>
					<input type="text" id="telefon" name="kontaktnr" placeholder="Telefon" value="<?=$data['oppdrag']['kontaktnr']?>"  class="input" data-validation="validate_phon" data-validation-optional="true">
				</span>
			</div>
			
			<br>
			<div class="controls">                     
			  <div class="textarea">
				<textarea name="notat" id="notat" placeholder="Notat"><?=$data['oppdrag']['notat']?></textarea>
			  </div>
			</div>
			
			<input type="hidden" name="oppdrag_id"  value="<?=$data['oppdrag']['oppdrag_id']?>" >
			
			<!-- Button -->
			<label class="control-label"></label>
			<div class="controls">
			  <button class="btn btn-default">Rediger oppdrag</button>
			</div>

			</fieldset>
		</form>

	</div>
