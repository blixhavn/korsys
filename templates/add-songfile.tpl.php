<div id="main-content">
		<h1>Legg til fil</h1>		
		<?
		if(isset($_GET['status'])){
			if($_GET['status']=='file'){
				echo "<div class='alert alert-error'>
					 Kunne ikke laste opp filen, kontakt vevmester.
					</div>";
			}
		} else if($_GET['status']=='chmod'){
				echo "<div class='alert alert-error'>
					 Kunne ikke sette rettigheter på filen, kontakt vevmester.
					</div>";
		} else if($_GET['status']=='dir'){
				echo "<div class='alert alert-error'>
					 Finner ikke mappe, kontakt vevmester.
					</div>";
		} else if($_GET['status']=='filetype'){
				echo "<div class='alert alert-error'>
					 Feil filtype. Kun midi, mp3 og wav er tillatt.
					</div>";
		} else if($_GET['status']=='success'){
				echo "<div class='alert alert-success'>
					 Filen er lastet opp.
					</div>";
		}
		?>
		<form class="form-horizontal" method="post" action="actions/add-songfile.php" onsubmit="return $(this).validate()" enctype="multipart/form-data">
			<fieldset>
			<h5 class="form-text">
			<?=$data['songtitle']?>
			</h5>
			<label class="control-label">Tittel</label>
			<div class="controls">
			  <input name="showing_name" type="text" class="input" data-validation="required">
			</div>
			<input type="hidden" name="song_id" value="<?=$_GET['id']?>">
			<div class="form-text muted">
			Filene kan ikke være større enn 15 MB.
			</div>
			<label class="control-label">Fil</label>
			<div class="controls">
			  <input id="filebutton" name="file" class="input-file" type="file" data-validation="required">
			</div>

			<div class="controls">
			  <label class="checkbox">
				<input type="checkbox" class="toggle" toggle-this="stemmefil" name="stemmefil" value="checkbox">
				Stemmefil
			  </label>
			</div>
			<div class="controls hide" id="stemmefil">
				<select class="span2" name="mainvoice">
				  <option value="1" <?if(substr($_SESSION['voice'], 0, 1) == 1) echo "selected"?>><?=VOICE_10?></option>
				  <option value="2" <?if(substr($_SESSION['voice'], 0, 1) == 2) echo "selected"?>><?=VOICE_20?></option>
				  <option value="3" <?if(substr($_SESSION['voice'], 0, 1) == 3) echo "selected"?>><?=VOICE_30?></option>
				  <option value="4" <?if(substr($_SESSION['voice'], 0, 1) == 4) echo "selected"?>><?=VOICE_40?></option>
				</select>
				<select class="span2" name="partvoice">
				  <option value="0">Alle</option>
				  <option value="1">1. stemme</option>
				  <option value="2">2. stemme</option>
				</select>
			</div>
			<div class="controls">
			  <label class="checkbox">
				<input type="checkbox" name="extro" value="checkbox">
				Synlig for <?=OLD?>
			  </label>
			</div>
			<!-- Button -->
			<label class="control-label"></label>
			<div class="controls">
			  <button type="submit" class="btn btn-default">Last opp fil</button>
			</div>

			</fieldset>
		</form>


	</div>
