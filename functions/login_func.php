<?
function isLoggedIn(){
	if(isset($_SESSION['user_id']) && isset($_SESSION['username']))
		return true;
	else		
		return false;

}

function checkLogin($u, $p)
{
	global $seed; // global because $seed is declared in the php_header.php file

	//Now let us look for the user in the database.
    	$query = sprintf("
		SELECT *
		FROM users
		WHERE username = '%s' AND password = '%s';
		", pg_escape_string($u), pg_escape_string(sha1($p . $seed)));
		
    	$result = pg_query($query);

    	// If the database returns a 0 as result we know the login information is incorrect.
    	// If the database returns a 1 as result we know  the login was correct and we proceed.
    	// If the database returns a result > 1 there are multple users
    	// with the same username and password, so the login will fail.

    	if (pg_num_rows($result) != 1)
    	{
        	return false;
    	} else
    	{
			// Login was successfull
			
			
			$row = pg_fetch_assoc($result);
			
			$_SESSION['user_id'] = $row['user_id'];			// Save the user ID for use later
			$_SESSION['username'] = $u;						// Save the username for use later
			$_SESSION['first_name'] = $row['first_name'];
			$_SESSION['auth_code'] = $row['auth_code'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['middle_name'] = $row['middle_name'];
			$_SESSION['last_name'] = $row['last_name'];
			$_SESSION['voice'] = $row['voice'];
			
			/*
			//Fetch account total
			$query = "SELECT ROUND(SUM(transactions.amount), 2) AS total FROM transactions WHERE user_id = ".$row['user_id']." GROUP BY user_id";
			$result = pg_query($query);
			if  (pg_num_rows($result) != 1){
				$_SESSION['saldo'] = 0;
			} else {
				$total_row = pg_fetch_assoc($result);
				$_SESSION['saldo'] = $total_row['total'];
			}
			*/

        	return true;
    	}
    	return false;
}
?>
