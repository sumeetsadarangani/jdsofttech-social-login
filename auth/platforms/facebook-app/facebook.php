<?php
// ******************
// Sumeet Sadarangani: JDSOFTTECH Social Login Plugin;
// Harsh Shah: Sr. Designer
// ******************
session_start();
require_once('autoload.php');
use Facebook\FacebookSession; 
use Facebook\FacebookRedirectLoginHelper; 
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
FacebookSession::setDefaultApplication($_SESSION['fb_appid'], $_SESSION['fb_appsecret']);
$_SESSION['ssa_return_url'] = (isset($_SESSION['ssa_return_url']) ? $_SESSION['ssa_return_url'] : null);
if ( !isset($_SESSION['ssa_return_url'])) {
	$_SESSION['ssa_return_url'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}
$helper = new FacebookRedirectLoginHelper($_SESSION['ssa_return_url']);
if ( isset($_SESSION['app']) ) {
	if ( $_SESSION['app'] == 'facebook' ) {
		try {
			$session = $helper->getSessionFromRedirect();
		} catch( FacebookRequestException $ex ) {
		} catch( Exception $ex ) {
		}
	}
	else {
		header("Location: ".$_SESSION['authstation']);
	}
}
else {
	header("Location: ".$_SESSION['authstation']);
}
if ( isset( $session ) ) {
	try {

		$request = new FacebookRequest( $session, 'GET', '/me?fields=first_name,last_name,name,gender,picture,age_range,link,email&debug=all' );
		$response = $request->execute();
		$user = $response->getGraphObject()->asArray();
		$_SESSION["userprofile"] = $user;
		unset($_SESSION['ssa_return_url']);
		unset($_SESSION['fb_appid']);
		unset($_SESSION['fb_appsecret']);
		header("Location: ".$_SESSION['authstation']);		
	} catch(FacebookRequestException $e) {	
		echo "Exception occured, code: " . $e->getCode();
		echo " with message: " . $e->getMessage();	
	}	
} else {
	$loginUrl = $helper->getLoginUrl(array('email'));
	header("Location: $loginUrl");
}
?>