<?php
session_start();

// Include Librari Google Client (API)
include_once 'libraries/google-client/Google_Client.php';
include_once 'libraries/google-client/contrib/Google_Oauth2Service.php';

$client_id = '80972644476-ip28utrifm4uipkfvfjl1b899o9h6s8c.apps.googleusercontent.com'; // Google client ID
$client_secret = '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'; // Google Client Secret
$redirect_url = 'http://localhost/uploadsoal/google.php'; // Callback URL

// Call Google API
$gclient = new Google_Client();
$gclient->setApplicationName('Google Login'); // Set dengan Nama Aplikasi Kalian
$gclient->setClientId($client_id); // Set dengan Client ID
$gclient->setClientSecret($client_secret); // Set dengan Client Secret
$gclient->setRedirectUri($redirect_url); // Set URL untuk Redirect setelah berhasil login

$google_oauthv2 = new Google_Oauth2Service($gclient);
?>