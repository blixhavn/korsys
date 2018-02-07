<?php
/* Authenticate to Google Calendar
*/
require_once 'google-api-php-client-2.2.1/vendor/autoload.php';

define('SCOPES', implode(' ', array(
  Google_Service_Calendar::CALENDAR)
));

function getGoogleClient($skeleton = FALSE) {
  $client = new Google_Client();
  $client->setApplicationName(APPLICATION_NAME);
  $client->setScopes(SCOPES);
  $client->setAuthConfig(CLIENT_SECRET_PATH);
  $client->setAccessType('offline');

  if(!$skeleton) {
    // Load previously authorized credentials from a file.
    $credentialsPath = CREDENTIALS_PATH;

    try {
      $accessToken = json_decode(file_get_contents($credentialsPath), true);
      $client->setAccessToken($accessToken);
      // Refresh the token if it's expired.
      if ($client->isAccessTokenExpired()) {
        $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        file_put_contents($credentialsPath, json_encode($client->getAccessToken()));
      }

    } catch (Exception $e) {
      // Request authorization from the user.
      $authUrl = $client->createAuthUrl();
      header('location: '.$authUrl);
    }
  }
  return $client;
}

?>
