<div id="main-content">
		<h1>Personlig konto</h1>
		
<? if(isset($data['saldo'])) { ?>
	<div id="saldo">
		<strong>Din saldo er</strong>
		<div id="saldo_val"><?=number_format($data['saldo'], 2, ',', ' ')?></div>
	</div>
	<div id="oppforinger">
		<h2>Siste 10 oppføringer</h2>
		<table>
			<tr>
				<th id="beskrivelse">Beskrivelse</th>
				<th id="belop">Beløp</th>
			</tr>
<?foreach($data['oppforinger'] as $oppforing) { ?>
			<tr>
				<td><?=$oppforing['description']?></td>
				<td class="belop"><?=number_format($oppforing['amount'], 2, ',', ' ')?></td>
			<tr>
<? } ?>
		</table>
	</div>
<? } else { ?>
	<div id="saldo">Du har ingen oppføringer på personlig</div>
<? } ?>
</div>
