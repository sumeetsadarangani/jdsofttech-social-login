<?php
// ******************
// Sumeet Sadarangani: JDSOFTTECH Social Login Plugin;
// Harsh Shah: Sr. Designer
// ******************
session_start();
require_once 'Google/Client.php';
require_once 'Google/Service/Oauth2.php';
$_SESSION['ssa_return_url'] = (isset($_SESSION['ssa_return_url']) ? $_SESSION['ssa_return_url'] : null);
if ( !isset($_SESSION['ssa_return_url'])) {
	$_SESSION['ssa_return_url'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}
$client = new Google_Client();
$client->setClientId($_SESSION['gg_appid']);
$client->setClientSecret($_SESSION['gg_appsecret']);
$client->setRedirectUri($_SESSION['ssa_return_url']);
$client->setScopes('email');
$oauth2Service = new Google_Service_Oauth2($client);
if (isset($_REQUEST['logout'])) {
	unset($_SESSION['access_token']);
}
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
	$client->setAccessToken($_SESSION['access_token']);
} else {
	$authUrl = $client->createAuthUrl();
	header("Location: $authUrl");
}
if ($client->getAccessToken()) {
	$_SESSION['access_token'] = $client->getAccessToken();
	$user = $oauth2Service->userinfo->get();
	$_SESSION["userprofile"] = (array) $user;
	header("Location: ".$_SESSION['authstation']);
}
?>