<?php
require_once '../php-header.php';

$authCode = $_GET['code'];
$client = getGoogleClient($skeleton = TRUE);

// Exchange authorization code for an access token.
$accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
// Store the credentials to disk.
if(!file_exists(dirname(CREDENTIALS_PATH))) {
  mkdir(dirname(CREDENTIALS_PATH), 0700, true);
}
file_put_contents(CREDENTIALS_PATH, json_encode($accessToken));

header('location: ../');

?>
