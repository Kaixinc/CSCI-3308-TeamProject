<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="google-signin-client_id" content="842627369246-3vnte9rk9njailk387v934tln1rgkmg9.apps.googleusercontent.com">
<title>Wishlist</title>
<link rel="stylesheet" type="text/css" href="Style/viewtablesearch.css" />
</head>
<body>
<?php
session_start();

//Include Google client library
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '842627369246-3vnte9rk9njailk387v934tln1rgkmg9.apps.googleusercontent.com';
$clientSecret = 'vCVWxgtjgtZWw_uUZtS2v96u';
$redirectURL = 'http://www.laoziwudi.xyz';

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('wishlist');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>
</body>
</html>