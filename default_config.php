<?php
/******************************************
 * Global config-file
 * Rename to config.php when set
*******************************************/


//Events
define("EMAIL", ""); 			// Address for sending calendar updates etc
define("MINUS_EMAIL", "");		// Email address for sending absence notices

//Google
define("GOOGLE_DEV_KEY", "");
define("APPLICATION_NAME", "");
define("GCAL_CAL_ID", "");
define("GCAL_SCOPE", "https%3a%2f%2fwww.googleapis.com%2fauth%2fcalendar");
define("GCAL_CLIENT_ID", "");
define("GCAL_CLIENT_SECRET", "");
define("GCAL_REFRESH_TOKEN", "");
define("GCAL_ACCESS_TOKEN", "");
//The redirect URI is specified at Google Projects, so it must be changed there aswell.
//It's not really used, but it is required by the API library
define("GCAL_REDIRECT_URI", "");

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
?>
