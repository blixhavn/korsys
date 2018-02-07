<?php
$saldo_query = sprintf("SELECT SUM(amount) from transactions WHERE user_id = '%s'", $_SESSION['user_id']);
$saldo_result = $db->query($saldo_query);
$saldo_row = $saldo_result->fetch_row();

$saldo = $saldo_row[0];

$trans_query = sprintf("SELECT * FROM transactions WHERE user_id = '%s' ORDER BY time DESC;", $db->escape_string($_SESSION['user_id']));
$trans_result = $db->query($trans_query);

while($trans_row = $trans_result->fetch_assoc()) {
	$oppforinger[] = $trans_row;
}


$smarter->assign('saldo', $saldo);
$smarter->assign('oppforinger', $oppforinger);

?>
