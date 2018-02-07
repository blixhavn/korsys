<div id="main-content">
		<h1>Sangarkiv</h1>
<?php 
if(isset($_GET['status'])){
			if($_GET['status']=='notfound'){
				echo "<div class='alert alert-error'>
					 Kunne ikke finne filen, kontakt vevmester.
					</div>";
			}
		}
if(isset($data['songs'])) {
	?>
	<table id="songs" class="table-striped table">
	<?php 
	foreach($data['songs'] as $song){
		if($_SESSION['auth_code'] >= $song[0]['song_auth_code']) {
?>		<tr>
			<td class="plus">
			<button class="btn btn-mini toggle" type="button" hide-div="songs-<?=$song[0]['song_id']?>">+</button>
			</td>
			<td class="sangtittel">
				<a name="<?=$song[0]['song_id']?>"></a>
				<?=$song[0]['title']?>
			<div class="songfiles" id="songs-<?=$song[0]['song_id']?>"> <?php 
			if(any_songfiles($song)) {
				foreach($song as $songfile) {
					if($_SESSION['auth_code'] >= $songfile['songfile_auth_code'] && ($_SESSION['voice'] == $songfile['voice'] || $songfile['voice'] == 0)) { ?>
					<div class="songfile <?=get_filetype($songfile['link'])?>">
						<a href="./?action=getfile&file=<?=$songfile['link']?>"><?=$songfile['showing_name']?></a>
					</div>
			<?php 	 	}
				} 
			} else {
				echo "<p class='muted'>Ingen tilgjengelige filer for din stemmegruppe.</p>";
			}?>
			</div>
			</td>
			<?php  if($_SESSION['auth_id'] >= 0) { ?>
			<td class="last-opp">
				<a class="btn btn-mini" href="./?show=add-songfile&id=<?=$song[0]['song_id']?>">Last opp fil</a>
			</td>
			<?php  } ?> 
			
		</tr>
<?php 
		}
	}
}
?>
	</div>
