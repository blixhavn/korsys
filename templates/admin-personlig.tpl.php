<?
isset($_GET['show_user']) ? $select_id = $_GET['show_user'] : $select_id = $_SESSION['user_id'];
?>
<div id="main-content">
	<h1>Administrer personlig</h1>	
	<div id="total-balanse">
		Total balanse: <?=belop($data['total'])?>
	</div>
	<div class="row">
		<div class="span5">
			<form method="get" action="./">
			<input type="hidden" name="show" value="admin-personlig">
			<select class="hotsubmit" name="show_user">
				<?foreach($data['users'] as $user) {?>
				<option<? if($select_id == $user['user_id']) echo " selected"; ?> value="<?=$user['user_id']?>"><?=$user['name']?></option>
				<? } ?>
			</select>
			</form>
			<h4>Beløp: <?=number_format($data['user_total'], 2, ',', ' ')?></h4>
			<div id="oppforinger">
			<h2>Siste 10 oppføringer</h2>
			<table>
				<tr>
					<th id="beskrivelse">Beskrivelse</th>
					<th id="belop">Beløp</th>
					<th id="bilag">Bilag</th>
				</tr>
				
		<?if(isset($data['oppforinger'])) {foreach($data['oppforinger'] as $oppforing) { ?>
				<tr>
					<td><?=$oppforing['description']?></td>
					<td class="right"><?=belop($oppforing['amount'])?></td>
					<td class="right"><?=$oppforing['bilag_nr']?></td>
				<tr>
		<? }} ?>
				</table>
			</div>
		</div>
		<div class="span5">
			<div id="add-transaction">
				<h3>Legg til oppføring</h3>
				<form action="actions/admin-personlig.php" method="post" onsubmit="return $(this).validate()">
				<input type="hidden" name="user_id" value="<?=$select_id?>">
				<div class="inline-elems">
					<div class="controls inline">
						<input type="text" name="desc" class="input span4" placeholder="Beskrivelse" data-validation="required">
					</div>

					<div class="controls controls-row">
						<input type="text" name="amount" class="input span1" placeholder="Beløp" data-validation="validate_num">
						<input type="text" name="bilag" class="input span1"  placeholder="Bilag" data-validation="validate_num" data-validation-optional="true">
					  <button type="submit" class="btn btn-default span2">Lagre endringer</button>
					</div>
				</div>
				</form>
			</div>
		</div>
</div>
