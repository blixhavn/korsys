<?

//Get users
$users_query = sprintf("SELECT users.user_id, users.first_name, users.middle_name, users.last_name FROM users WHERE auth_code >= 0 ORDER BY voice ASC");
$users_result = pg_query($users_query);

while($users_row = pg_fetch_assoc($users_result)) {
	$name = $users_row['first_name'];
	if(isset($users_row['middle_name']))
		$name .= " ".$users_row['middle_name'];
	$name .= " ".$users_row['last_name'];
	
	$user['name'] = $name;
	$user['user_id'] = $users_row['user_id'];
	$users[] = $user;
}

//Get total balance
$total_query = "SELECT SUM(amount) FROM transactions";
$total_result = pg_query($total_query);
$row = pg_fetch_row($total_result);
$total = $row[0];


//Get transactions

isset($_GET['show_user']) ? $user_id = $_GET['show_user'] : $user_id = $_SESSION['user_id'];

$trans_query = sprintf("SELECT * FROM transactions WHERE user_id = '%s' ORDER BY time DESC;", $user_id);
$trans_result = pg_query($trans_query);

while($trans_row = pg_fetch_assoc($trans_result)) {
	$oppforinger[] = $trans_row;
}

$user_total_query = sprintf("SELECT SUM(amount) from transactions WHERE user_id = '%s'", $user_id);
$user_total = pg_fetch_assoc(pg_query($user_total_query));

//Variable assignement

$smarter->assign('users', $users);
$smarter->assign('total', $total);
$smarter->assign('user_total', $user_total['sum']);
$smarter->assign('oppforinger', $oppforinger);
?>
