<?php
require_once(dirname(__FILE__)."/db_connect.php");
require_once(dirname(__FILE__)."/cookie.php");
require_once(dirname(__FILE__)."/smarter.php");
require_once(dirname(__FILE__)."/google-api.php");
require_once(dirname(__FILE__)."/login_func.php");
require_once(dirname(__FILE__)."/datetime.php");
require_once(dirname(__FILE__)."/minus.php");
require_once(dirname(__FILE__)."/songs.php");
require_once(dirname(__FILE__)."/generator.php");
require_once(dirname(__FILE__)."/events.php");

function belop($float) {
	return number_format($float, 2, ',', ' ');
}
?>
