<div id="main-content">
		<h1>Legg ut nyhet</h1>		
		<form class="form-horizontal largeform" action="actions/add-news.php" method="post" onsubmit="return $(this).validate()">
		<fieldset>
		
		<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-pencil"></i></span>
					<input name="tittel" id="tittel" type="text" placeholder="Tittel" class="input" data-validation="required">
				</div>
		</div>

		<div class="controls">                     
		  <div class="textarea">
			<textarea name="melding" id="melding"  data-validation="required" placeholder="Melding"></textarea>
		  </div>
		</div>

		<div class="controls">
		  <label class="checkbox">
			<input type="checkbox" name="extro" value="yes">
			Synlig for <?=OLD?>
		  </label><label class="checkbox">
			<input type="checkbox" name="epost" value="yes">
			Send epost
		  </label>
		</div>

		<div class="controls">
		  <button type="submit" class="btn btn-default">
			Legg ut nyhet
		  </button>
		</div>

		</fieldset>
		</form>

	</div>
