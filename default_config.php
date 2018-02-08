<?php
/******************************************
 * Global config-file
 * Rename to config.php when set
*******************************************/


//Events
define("EMAIL", ""); 			// Address for sending calendar updates etc
define("MINUS_EMAIL", "");		// Email address for sending absence notices

//Google
define('APPLICATION_NAME', 'Korsys');
define('CLIENT_SECRET_PATH', dirname(__FILE__).'/korsys_client.json');
define('CREDENTIALS_PATH', dirname(__FILE__).'/google_credentials.json');
define('CALENDAR', 'primary');

//Voice names
define("VOICE_10", "1. tenor");
define("VOICE_20", "2. tenor");
define("VOICE_30", "1. bass");
define("VOICE_40", "2. bass");

// Name for old members (plural)
define("OLD", "gamle");

// Seed for passwords and cookie ID
define("SEED", "");

// Set timezone
define("TIMEZONE", "UTC");

// Set domain (for cookie)
define("DOMAIN", "");
?>
