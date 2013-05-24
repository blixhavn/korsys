<div id="main-content">
		<h1>Oppdrag</h1>
		
	<?//Show status feedback
	switch($_GET['status']){
		case 'bekreftet':
			echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button>
				 Oppdrag bekreftet
				</div>";
			break;
		case 'del':
			echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button>
				 Oppdrag slettet.
				</div>";
			break;
	}
	?>		
		
	<div class="pull-right">
		<a class="btn btn-info" href="?show=add-oppdrag">Nytt oppdrag</a>
	</div>
	<div class="tabbable"> <!-- Only required for left/right tabs -->
	  <ul class="nav nav-tabs">
		<li class="active"><a href="#tentativ" data-toggle="tab">Tentative oppdrag</a></li>
		<li><a href="#bekreftet" data-toggle="tab">Bekreftede oppdrag</a></li>
		<li><a href="#utfort" data-toggle="tab">Utførte oppdrag</a></li>
	  </ul>
	  <div class="tab-content">
		<div class="tab-pane active" id="tentativ">
		<?if(isset($data['tentative_oppdrag'])) {
			foreach($data['tentative_oppdrag'] as $oppdrag_t){?>
			
			<div class="oppdrag clearfix">
				<h3><?=datetime_to_date_stor($oppdrag_t['dato'])." - ".$oppdrag_t['oppdragsgiver']?></h3>
				<div class="row-fluid">
					<div class="span3">
						<div class="sted">
							<?=$oppdrag_t['sted'];?>
						</div>
						<div class="tid">
							<?=substr($oppdrag_t['tid'], 0, -3)?>
						</div>
						<br>
						<i class="icon-tag"></i>&nbsp;<?=$oppdrag_t['oppdragstype']?><br>
						<i class="icon-music"></i>&nbsp;<?=$oppdrag_t['ant_sanger']?> sanger<br>
						<br>
						<?if($oppdrag_t['notat']!=''){?>
						<button class="btn btn-mini oppdrag-notat" data-toggle="popover" data-placement="right" data-content="<?=$oppdrag_t['notat']?>" type="button"><i class="icon-pencil"></i> Se notat</button>
						<?}?>
					</div>
					<div class="span3 offset1 text-right">
						<div class="pris">
							<?=$oppdrag_t['pris']?><?if(is_numeric($oppdrag_t['pris'])) echo ",-"?>
						</div>
					</div>
					<div class="span5 well">
						<i class="icon-user"></i>&nbsp;&nbsp;<strong><?=$oppdrag_t['kontaktperson']?></strong><br>
					<? if(isset($oppdrag_t['kontaktepost'])){?>
						<i class="icon-envelope"></i>&nbsp;&nbsp;<?=$oppdrag_t['kontaktepost']?><br>
					<?}?>
					<? if(isset($oppdrag_t['kontaktnr'])){?>
						<i class="icon-phone"></i>&nbsp;&nbsp;<?=$oppdrag_t['kontaktnr']?><br>
					<?}?>
					</div>
				</div>
				<div class="pull-right">
						<form method="GET" action="./">
						<input type="hidden" name="id" value="<?=$oppdrag_t['oppdrag_id']?>">
						<input type="hidden" name="action" value="bekreft-oppdrag">
						Lag hendelse i semesterplanen <input type="checkbox" name="semesterplan" checked value="true">&nbsp;&nbsp;
						<button class="btn btn-primary" ><i class="icon-ok icon-white"></i>  Bekreft</button>
						<a class="btn" href="?show=edit-oppdrag&id=<?=$oppdrag_t['oppdrag_id']?>"><i class="icon-pencil"></i>  Rediger</a>
						<a class="btn confirm" confirm-text='Er du sikker på at du vil slette oppdraget?'  href="?action=slett-oppdrag&id=<?=$oppdrag_t['oppdrag_id']?>"><i class="icon-trash"></i> Slett</a>
						</form>
				</div>
			</div>
			<hr>
		<?}
		} else { ?>
			<p>Ingen tentative oppdrag</p>
		<?}?>
		</div>
		<div class="tab-pane" id="bekreftet">
		<?if(isset($data['bekreftede_oppdrag'])) {
		foreach($data['bekreftede_oppdrag'] as $oppdrag_b) {?>
			<div class="oppdrag clearfix">
				<h3><?=datetime_to_date_stor($oppdrag_b['dato'])." - ".$oppdrag_b['oppdragsgiver']?></h3>
				<div class="row-fluid">
					<div class="span3">
						<div class="sted">
							<?=$oppdrag_b['sted'];?>
						</div>
						<div class="tid">
							<?=substr($oppdrag_b['tid'], 0, -3)?>
						</div>
						<br>
						<i class="icon-tag"></i>&nbsp;<?=$oppdrag_b['oppdragstype']?><br>
						<i class="icon-music"></i>&nbsp;<?=$oppdrag_b['ant_sanger']?> sanger<br>
						<br>
						<?if($oppdrag_b['notat']!=''){?>
						<button class="btn btn-mini oppdrag-notat"  data-toggle="popover" data-placement="right" data-content="<?=htmlentities($oppdrag_b['notat'])?>" type="button"><i class="icon-pencil"></i> Se notat</button>
						<?}?>
					</div>
					<div class="span3 offset1 text-right">
						<div class="pris">
							<?=$oppdrag_b['pris']?><?if(is_numeric($oppdrag_b['pris'])) echo ",-"?>
						</div>
					</div>
					<div class="span5 well">
						<i class="icon-user"></i>&nbsp;&nbsp;<strong><?=$oppdrag_b['kontaktperson']?></strong><br>
					<? if(isset($oppdrag_b['kontaktepost'])){?>
						<i class="icon-envelope"></i>&nbsp;&nbsp;<?=$oppdrag_b['kontaktepost']?><br>
					<?}?>
					<? if(isset($oppdrag_b['kontaktnr'])){?>
						<i class="icon-phone"></i>&nbsp;&nbsp;<?=$oppdrag_b['kontaktnr']?><br>
					<?}?>
					</div>
				</div>
				<div class="pull-right">
						<a class="btn" href="?show=edit-oppdrag&id=<?=$oppdrag_b['oppdrag_id']?>"><i class="icon-pencil"></i>  Rediger</a>
						<a class="btn confirm" confirm-text='Er du sikker på at du vil slette oppdraget?' href="?action=slett-oppdrag&id=<?=$oppdrag_b['oppdrag_id']?>"><i class="icon-trash"></i> Slett</a>
				</div>
			</div>
			<hr>
		<?}
		} else { ?>
			<p>Ingen bekreftede oppdrag</p>
		<?}?>
		</div>
		<div class="tab-pane" id="utfort">
		<?if(isset($data['utforte_oppdrag'])) {
		foreach($data['utforte_oppdrag'] as $oppdrag_u) {?>
			<div class="oppdrag clearfix">
				<h3><?=datetime_to_date_stor($oppdrag_u['dato'])." - ".$oppdrag_u['oppdragsgiver']?></h3>
				<div class="row-fluid">
					<div class="span3">
						<div class="sted">
							<?=$oppdrag_u['sted'];?>
						</div>
						<div class="tid">
							<?=substr($oppdrag_u['tid'], 0, -3)?>
						</div>
						<br>
						<i class="icon-tag"></i>&nbsp;<?=$oppdrag_u['oppdragstype']?><br>
						<i class="icon-music"></i>&nbsp;<?=$oppdrag_u['ant_sanger']?> sanger<br>
						<br>
						<?if($oppdrag_u['notat']!=''){?>
						<button class="btn btn-mini oppdrag-notat" data-toggle="popover" data-placement="right" data-content="<?=$oppdrag_u['notat']?>" type="button"><i class="icon-pencil"></i> Se notat</button>
						<?}?>
					</div>
					<div class="span3 offset1 text-right">
						<div class="pris">
							<?=$oppdrag_u['pris']?><?if(is_numeric($oppdrag_u['pris'])) echo ",-"?>
						</div>
						<br>
						<?if($oppdrag_u['fakturanr'] != ''){ ?>
						
						Fakturanr: <?=$oppdrag_u['fakturanr']?> 
							<?if($oppdrag_u['kommentar']!=''){?>
								<button class="btn btn-mini faktura-notat"  data-toggle="popover" data-placement="right" data-content="<?=$oppdrag_u['kommentar']?>" type="button"><i class="icon-pencil"></i></button>
							<?}?>
							<br>
							<?if($oppdrag_u['betalt_dato'] != ''){ ?>
								<span class="text-success">Betalt <?=datetime_to_date($oppdrag_u['betalt_dato'])?></span><br>
							<?} else { ?>
								<small style="color:<?=$oppdrag_u['datofarge']?>">Sendt <?=datetime_to_date($oppdrag_u['sendt_dato'])?></small><br>
							
								<form action="actions/faktura.php" method="post">
								<input type="hidden" name="faktura_id" value="<?=$oppdrag_u['faktura_id']?>">
								<input type="hidden" name="betalt" value="true">
								<button class="btn btn-mini btn-primary">Registrer betaling</button>
								</form>
							<?}?>
						<?} else { ?>
							<a href="#faktura-reg" role="button" class="btn btn-mini" data-toggle="modal">Registrer faktura</a>
							<!-- Modal -->
							<div id="faktura-reg" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h3 id="myModalLabel">Registrer faktura</h3>
							  </div>
							  <form method="post" action="actions/faktura.php">
							  <div class="modal-body">
									<div class="input-prepend">
										<span class="add-on"><i class="icon-book"></i></span>
										<input type="text" name="fakturanr" placeholder="Fakturanummer" class="input" data-validation="validate_int">
									</div>          
									<div class="textarea">
										<textarea placeholder="Kommentar" name="kommentar"></textarea>
									</div>
							  </div>
							  <div class="modal-footer">
								<input type="hidden" name="oppdrag_id" value="<?=$oppdrag_u['oppdrag_id']?>">
								<button class="btn" data-dismiss="modal" aria-hidden="true">Lukk</button>
								<button class="btn btn-primary">Lagre faktura</button>
							  </div>
							  </form>
							</div>
						
						<? } ?>
						
						
						
					</div>
					<div class="span5 well">
						<i class="icon-user"></i>&nbsp;&nbsp;<strong><?=$oppdrag_u['kontaktperson']?></strong><br>
					<? if(isset($oppdrag_u['kontaktepost'])){?>
						<i class="icon-envelope"></i>&nbsp;&nbsp;<?=$oppdrag_u['kontaktepost']?><br>
					<?}?>
					<? if(isset($oppdrag_u['kontaktnr'])){?>
						<i class="icon-phone"></i>&nbsp;&nbsp;<?=$oppdrag_u['kontaktnr']?><br>
					<?}?>
					</div>
				</div>
				<div class="pull-right">
					<? if(!isset($oppdrag_u['innbetalt'])) {?>
						<!-- <a class="btn" href="?action=lag-faktura&id=<?=$oppdrag_u['oppdrag_id']?>"><i class="icon-list-alt"></i> Lag faktura</a> -->
					<?}?>
				</div>
			</div>
			<hr>
		<?}
		} else { ?>
			<p>Ingen utførte oppdrag</p>
		<?}?>
		</div>
	  </div>
	</div>

</div>
