<?php
require_once '../php-header.php';

$authCode = $_GET['code'];
$client = getGoogleClient($skeleton = TRUE);

// Exchange authorization code for an access token.
$accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
// Store the credentials to disk.
if(!file_exists(dirname($credentialsPath))) {
  mkdir(dirname($credentialsPath), 0700, true);
}
file_put_contents($credentialsPath, json_encode($accessToken));

header('location: /');

?>
