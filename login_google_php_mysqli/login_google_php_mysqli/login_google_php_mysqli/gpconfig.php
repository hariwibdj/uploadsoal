<?php
session_start();

// Include Librari Google Client (API)
include_once 'libraries/google-client/Google_Client.php';
include_once 'libraries/google-client/contrib/Google_Oauth2Service.php';

$client_id = '389817304502-26scn0kt2hlc27ld5lbajp6oa8pap34d.apps.googleusercontent.com'; // Google client ID
$client_secret = 'WDfl6IeLVjLzubApinak7v39'; // Google Client Secret
$redirect_url = 'http://localhost/mynotescode/login_google_php/google.php'; // Callback URL

// Call Google API
$gclient = new Google_Client();
$gclient->setClientId($client_id); // Set dengan Client ID
$gclient->setClientSecret($client_secret); // Set dengan Client Secret
$gclient->setRedirectUri($redirect_url); // Set URL untuk Redirect setelah berhasil login

$google_oauthv2 = new Google_Oauth2Service($gclient);
?>
