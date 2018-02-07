<?php
/* Authenticate to Google Calendar
*/
require_once 'google-api-php-client-2.2.1/vendor/autoload.php';

$google_client = new Google_Client();
$google_cal = new Google_Service_Calendar($google_client);
$google_client->setApplicationName(APPLICATION_NAME);
$google_client->setDeveloperKey(GOOGLE_DEV_KEY);
$google_client->setClientId(GCAL_CLIENT_ID);
$google_client->setClientSecret(GCAL_CLIENT_SECRET);
$google_client->setRedirectUri(GCAL_REDIRECT_URI);

?>
