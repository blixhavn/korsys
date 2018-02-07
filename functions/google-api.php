<?php
/* Autentisering mot Google Calendar
*/
require_once 'google-api-php-client/src/Google_Client.php';
require_once 'google-api-php-client/src/contrib/Google_CalendarService.php';


/*
$params = array(
		'response_type' => 'code',
		'client_id' 	=> GCAL_CLIENT_ID,
		'redirect_uri'	=> GCAL_REDIRECT_URI,
		'access_type'	=> 'offline',
		'approval_prompt' => 'force',
		'scope'		=> GCAL_SCOPE
		);
$url = 'https://accounts.google.com/o/oauth2/auth?'.http_build_query($params);
echo $url."\n";


$token_url = 'https://accounts.google.com/o/oauth2/token';

$token_data = array(
		'code' 		=> '4/jOL8GLdA4lC7mLe64r-WBgkasFIY.4i5MpuMOfPQWOl05ti8ZT3YjBx6tewI',
		'client_id' 	=> GCAL_CLIENT_ID,
		'client_secret'	=> GCAL_CLIENT_SECRET,
		'redirect_uri' 	=> GCAL_REDIRECT_URI,
		'grant_type'	=> 'authorization_code'
		);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $token_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $token_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = json_decode(curl_exec($ch));
$refresh_token = $result->refresh_token;
print_r($result);

$refresh_data = array(
		'client_secret'	=> GCAL_CLIENT_SECRET,
		'grant_type'	=> 'refresh_token',
		'refresh_token'	=> GCAL_REFRESH_TOKEN,
		'client_id'	=> GCAL_CLIENT_ID
		);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $token_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $refresh_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$token = curl_exec($ch);
echo $token;
*/

$google_client = new Google_Client();
$google_cal = new Google_CalendarService($google_client);
$google_client->setApplicationName(APPLICATION_NAME);
$google_client->setDeveloperKey(GOOGLE_DEV_KEY);
$google_client->setClientId(GCAL_CLIENT_ID);
$google_client->setClientSecret(GCAL_CLIENT_SECRET);
$google_client->setRedirectUri(GCAL_REDIRECT_URI);

/*
if(isset($_SESSION['google_token'])) {
	$google_client->setAccessToken($_SESSION['google_token']);
}

if($google_client->isAccessTokenExpired()) {
	$google_client->refreshToken(GCAL_REFRESH_TOKEN);
	$_SESSION['google_token'] = $google_client->getAccessToken();
}
*/
?>
