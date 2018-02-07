<div id="main-content">
	<h1>Minusmeldinger</h1>

<div class="tabbable"> <!-- Only required for left/right tabs -->
	<ul class="nav nav-tabs">
		<li class="active"><a href="#minus" data-toggle="tab">Minusmeldinger</a></li>
		<li><a href="#tidligere" data-toggle="tab">Tidligere minusmeldinger</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="minus">
<?php 
if(isset($data['minus'])) {
	foreach($data['minus'] as $event){
?>
			<div class="minusevent">
				<h2><?=datetime_to_norstring_stor($event[0]['event_start'])." - ".$event[0]['title']?></h2>
				<?php  foreach($event as $minusmelding){ ?>
				<div class="minus-elem row-fluid">
					<div class="minus-details span4">
						<strong><?=$minusmelding['first_name']?></strong><br>
						<span class="time <?=$minusmelding['valid']?>"><?=datetime_to_norstring_stor($minusmelding['submitted'])?>
					</div>
					<div class="minus-desc span8">
						<p><?=$minusmelding['commentary']?></p>
					</div>
				</div>
				
				<div class="clearfix"></div>
				<?php }?>
			</div>
<?php 
	}
}
?>
		</div>
		<div class="tab-pane" id="tidligere">
<?php 
if(isset($data['tidligere'])) {
	foreach($data['tidligere'] as $event){
?>
			<div class="minusevent">
				<h2><?=datetime_to_norstring_stor($event[0]['event_start'])." - ".$event[0]['title']?></h2>
				<?php  foreach($event as $minusmelding){ ?>
				<div class="minus-elem row-fluid">
					<div class="minus-details span4">
						<strong><?=$minusmelding['first_name']?></strong><br>
						<span class="time <?=$minusmelding['valid']?>"><?=datetime_to_norstring_stor($minusmelding['submitted'])?>
					</div>
					<div class="minus-desc span8">
						<p><?=$minusmelding['commentary']?></p>
					</div>
				</div>
				
				<div class="clearfix"></div>
				<?php }?>
			</div>

<?php 
	}
}
?>
		</div>
	</div>
</div>
