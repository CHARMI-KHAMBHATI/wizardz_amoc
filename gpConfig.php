<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '586379061155-p0t7n6gvkip4ueicqa8cup71sftum922.apps.googleusercontent.com';
$clientSecret = '3Dh5on5ObXjLUmWGQ8Xg8qGw';
$redirectURL = 'http://localhost/login/';

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to QuickBucket.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);


?>