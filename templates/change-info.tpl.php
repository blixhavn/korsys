<div id="main-content">
		<h1>Endre info</h1>		
		<?
		//Show status feedback
		if(isset($_GET['status'])){
			if($_GET['status']=='success'){
				echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button>
					 Endringene er lagret.
					</div>";
			}
			if($_GET['status']=='exists'){
				echo "<div class='alert alert-error'><button type='button' class='close' data-dismiss='alert'>&times;</button>
					 Brukernavn eksisterer allerede.
					</div>";
			}
			else{
				echo "<div class='alert alert-error'><button type='button' class='close' data-dismiss='alert'>&times;</button>
					Feil passord.
					</div>";
			}
		}
		?>
		<form class="form-horizontal" method="post" action="actions/change-info.php" onsubmit="return $(this).validate()">
			<fieldset>
			<!-- Text input-->
			<label class="control-label">Brukernavn</label>
			<div class="controls">
			  <input name="username" type="text" class="input" value="<?=$_SESSION['username']?>">
			</div>

			<!-- Text input-->
			<label class="control-label">Fornavn</label>
			<div class="controls">
			  <input name="first_name" type="text" class="input" value="<?=$_SESSION['first_name']?>">
			</div>

			<!-- Text input-->
			<label class="control-label">Mellomnavn</label>
			<div class="controls">
			  <input name="middle_name" type="text" class="input" value="<?=$_SESSION['middle_name']?>">
			</div>

			<!-- Text input-->
			<label class="control-label">Etternavn</label>
			<div class="controls">
			  <input name="last_name" type="text" class="input" value="<?=$_SESSION['last_name']?>">
			</div>

			<!-- Text input-->
			<label class="control-label">Epost</label>
			<div class="controls">
			  <input name="email" type="text" class="input"  value="<?=$_SESSION['email']?>" data-validation="validate_email">
			</div>

			<!-- Text input-->
			<label class="control-label">Nytt passord</label>
			<div class="controls">
			  <input name="new_pw" type="password" class="input">
			</div>

			<!-- Text input-->
			<label class="control-label">Gjenta nytt passord</label>
			<div class="controls">
			  <input name="new_pw2" type="password" class="input">
			</div>
			<div class="controls">
			<hr style="width: 220px;">
			</div>
			<!-- Text input-->
			<label class="control-label">Gjeldende passord</label>
			<div class="controls">
			  <input name="old_pw" type="password" class="input" data-validation="required">
			</div>

			<!-- Button -->
			<div class="pw_required">Passord er påkrevd for alle endringer</div>
			<label class="control-label"></label>
			<div class="controls">
			  <button class="btn btn-default">Lagre endringer</button>
			</div>

			</fieldset>
		</form>


	</div>
