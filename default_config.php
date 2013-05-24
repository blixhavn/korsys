<?
/******************************************
 * Global config-fil for alle tjenester.
 * Omdøpes til config.php når den er fylt ut
*******************************************/


//Events
define("EMAIL", ""); 			// Epost for utsendendelse av kalenderoppdateringer osv. 
define("MINUS_EMAIL", "");		// Epost for utsendelse av minus/fraværsmeldinger

//Google
define("GOOGLE_DEV_KEY", "");
define("APPLICATION_NAME", "");
define("GCAL_CAL_ID", "");
define("GCAL_SCOPE", "https%3a%2f%2fwww.googleapis.com%2fauth%2fcalendar");
define("GCAL_CLIENT_ID", "");
define("GCAL_CLIENT_SECRET", "");
define("GCAL_REFRESH_TOKEN", "");
//The redirect URI is specified at Google Projects, so it must be changed there aswell.
//It's not really used, but it is required by the API library. Should be URL-encoded.
define("GCAL_REDIRECT_URI", "");


//Stemmenavn
define("VOICE_10", "");			// Eks: 1. tenor
define("VOICE_20", "");			// Eks: 2. tenor
define("VOICE_30", "");			// Eks: 1. bass
define("VOICE_40", "");			// Eks: 2. bass

//Navn for gamle medlemmer (flertall)
define("OLD", "");

define("SEED", "");	
$seed = "";			// Seed for passord og cookie-ID

?>
