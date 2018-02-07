<?php

//Get users
$users_query = sprintf("SELECT users.user_id, users.first_name, users.middle_name, users.last_name FROM users WHERE auth_code >= 0 ORDER BY first_name ASC");
$users_result = $db->query($users_query);

while($users_row = $users_result->fetch_assoc()) {
	$name = $users_row['first_name'];
	if(isset($users_row['middle_name']))
		$name .= " ".$users_row['middle_name'];
	$name .= " ".$users_row['last_name'];

	$user['name'] = $name;
	$user['user_id'] = $users_row['user_id'];
	$users[] = $user;
}

//Get total balance
$total_query = "SELECT SUM(amount) FROM transactions t JOIN users u on t.user_id = u.user_id WHERE u.auth_code >= 0";
$total_result = $db->query($total_query);
$row = $total_result->fetch_row();
$total = $row[0];

//Get total minus
$minustotal_query = "SELECT SUM(amount) FROM transactions t JOIN users u on t.user_id = u.user_id WHERE u.auth_code >= 0 AND t.amount < 0";
$minustotal_result = $db->query($minustotal_query);
$minustotal = $minustotal_result->fetch_row()[0];

//Get transactions

isset($_GET['show_user']) ? $user_id = $_GET['show_user'] : $user_id = $_SESSION['user_id'];

$trans_query = sprintf("SELECT * FROM transactions WHERE user_id = '%s' ORDER BY time DESC;", $user_id);
$trans_result = $db->query($trans_query);

while($trans_row = $trans_result->fetch_assoc()) {
	$oppforinger[] = $trans_row;
}

$user_total_query = sprintf("SELECT SUM(amount) from transactions WHERE user_id = '%s'", $user_id);
$user_total = $db->query($user_total_query)->fetch_assoc();

//Get overview

if(isset($_GET['overview'])){
	$overview_query = "SELECT first_name, SUM(amount) FROM transactions t JOIN users u ON t.user_id = u.user_id WHERE u.auth_code >= 0 GROUP BY first_name ORDER BY first_name ASC;";
	$overview_result = $db->query($overview_query);

	while($overview_row = $overview_result->fetch_assoc()){
		$persons[] = $overview_row;
		$overview_total += $overview_row['sum'];
	}
}

//Variable assignement

$smarter->assign('users', $users);
$smarter->assign('total', $total);
$smarter->assign('minustotal', $minustotal);
$smarter->assign('user_total', $user_total['sum']);
$smarter->assign('oppforinger', $oppforinger);
if(isset($_GET['overview'])){
	$smarter->assign('persons', $persons);
	$smarter->assign('overview_total', $overview_total);
}

?>
