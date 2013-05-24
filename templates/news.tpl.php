<div id="main-content">
		<h1>Nyheter</h1>
<?

if(isset($data['news'])) {
	foreach($data['news'] as $newspost){
		if($_SESSION['auth_code'] >= $newspost['news_auth_code']) {
?>
		<div class="newsitem">
			<h2><?=$newspost['subject']?></h2>
			<p><?=$newspost['message']?></p>
			<span class="byline">Postet <?=datetime_to_norstring($newspost['submitted'])?> av <?=$newspost['first_name']." ".$newspost['last_name']?></span>
		</div>
<?
		}
	}
}
?>
	</div>