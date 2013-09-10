<?
$saldo_query = sprintf("SELECT SUM(amount) from transactions WHERE user_id = '%s'", $_SESSION['user_id']);
$saldo_result = pg_query($saldo_query);
$saldo_row = pg_fetch_row($saldo_result);

$saldo = $saldo_row[0];

$trans_query = sprintf("SELECT * FROM transactions WHERE user_id = '%s' ORDER BY time DESC;", pg_escape_string($_SESSION['user_id']));
$trans_result = pg_query($trans_query);

while($trans_row = pg_fetch_assoc($trans_result)) {
	$oppforinger[] = $trans_row;
}


$smarter->assign('saldo', $saldo);
$smarter->assign('oppforinger', $oppforinger);

?>
