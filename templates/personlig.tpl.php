<div id="main-content">
		<h1>Personlig konto</h1>
		
<? if(isset($data['saldo'])) { ?>
	<div id="saldo">
		<strong>Din saldo er</strong>
		<div id="saldo_val"><?=number_format($data['saldo'], 2, ',', ' ')?></div>
	</div>
	<div id="oppforinger">
		<h2>Alle oppføringer</h2>
		<table>
			<tr>
				<th id="beskrivelse">Beskrivelse</th>
				<th id="belop">Beløp</th>
				<th id="dato">Dato</th>
			</tr>
<?foreach($data['oppforinger'] as $oppforing) { ?>
			<tr>
				<td><?=$oppforing['description']?></td>
				<td class="belop"><?=number_format($oppforing['amount'], 2, ',', ' ')?></td>
				<td class="dato"><?=datetime_to_date_stor($oppforing['time'])?></td>
			<tr>
<? } ?>
		</table>
	</div>
<? } else { ?>
	<div id="saldo">Du har ingen oppføringer på personlig</div>
<? } ?>
</div>
