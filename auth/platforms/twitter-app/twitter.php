<?php
// ******************
// Sumeet Sadarangani: JDSOFTTECH Social Login Plugin;
// Harsh Shah: Sr. Designer
// ******************
session_start();
require_once('twitteroauth/twitteroauth.php');
$_SESSION['ssa_return_url'] = (isset($_SESSION['ssa_return_url']) ? $_SESSION['ssa_return_url'] : null);
if ( !isset($_SESSION['ssa_return_url'])) {
	$_SESSION['ssa_return_url'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}
define('OAUTH_CALLBACK', $_SESSION['ssa_return_url']);
if ( isset($_SESSION['oauth_token']) && isset($_SESSION['oauth_token_secret']) ) {
	if (isset($_REQUEST['oauth_token']) && $_SESSION['oauth_token'] !== $_REQUEST['oauth_token']) {
		$_SESSION['oauth_status'] = 'oldtoken';
		header('Location: ../../logout.php');
	}
	$connection = new TwitterOAuth($_SESSION['tt_key'], $_SESSION['tt_secret'], $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
	$_SESSION['access_token'] = $connection->getAccessToken($_REQUEST['oauth_verifier']);
	unset($_SESSION['oauth_token']);
	unset($_SESSION['oauth_token_secret']);
	if (200 == $connection->http_code) {
		$connection = new TwitterOAuth($_SESSION['tt_key'], $_SESSION['tt_secret'], $_SESSION['access_token']['oauth_token'], $_SESSION['access_token']['oauth_token_secret']);
		$user = $connection->get('account/verify_credentials');
		$_SESSION["userprofile"] = (array) $user;
		unset($_SESSION['ssa_return_url']);
		unset($_SESSION['tt_key']);
		unset($_SESSION['tt_secret']);
		header('Location: '.$_SESSION['authstation']);
	} else {
		header('Location: ../../logout.php');
	}
}
else {
	$connection = new TwitterOAuth($_SESSION['tt_key'], $_SESSION['tt_secret']);
	$request_token = $connection->getRequestToken(OAUTH_CALLBACK);
	$_SESSION['oauth_token'] = $token = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
	switch ($connection->http_code) {
		case 200:
			$url = $connection->getAuthorizeURL($token);
			header('Location: ' . $url); 
		break;
		default:
			echo 'Could not connect to Twitter. Refresh the page or try again later.';
	}
}
?>