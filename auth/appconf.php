<?php
// ******************
// Sumeet Sadarangani: JDSOFTTECH Social Login Plugin;
// Harsh Shah: Sr. Designer
// ******************
session_start();

// here is the link to obtain facebook app id and secret key
// https://developers.facebook.com/docs/apps/register
if ( $_SESSION['app'] == 'facebook' ) {
	$_SESSION['fb_appid'] = '<enter your facebook app id>';
	$_SESSION['fb_appsecret'] = '<enter your facebook app secret key>';	
}


// here is the link to obtain twitter app consumer key and secret key
// http://stackoverflow.com/questions/1808855/getting-new-twitter-api-consumer-and-secret-keys/12335636#12335636
elseif ( $_SESSION['app'] == 'twitter' ) {
	$_SESSION['tt_key'] = '<replace-your-consumer-key-here>';
	$_SESSION['tt_secret'] = '<replace-your-consumer-secret-here>';
}


// here is the link to obtain google app client id and secret key
// https://auth0.com/docs/connections/social/google
elseif ( $_SESSION['app'] == 'google' ) {
	$_SESSION['gg_appid'] = '<replace-your-client-id-here>';
	$_SESSION['gg_appsecret'] = '<replace-your-client-secret-here>';
}

?>
