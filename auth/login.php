<?php
// ******************
// Sumeet Sadarangani: JDSOFTTECH Social Login Plugin;
// Harsh Shah: Sr. Designer
// ******************
session_start();
$index='../login.php';
unset($_SESSION['ssa_return_url']);
if ( isset($_SESSION["userprofile"]) ) {
	header("Location: ".$_SESSION['authstation']);
}
else {
	$_SESSION['app'] = $_GET['app'];
	require_once('appconf.php');	
	if ( !empty($_SESSION['app']) ) {
		if ( $_SESSION['app'] == 'facebook' ) {
			$app_path = './platforms/facebook-app/facebook.php';
			header("Location: $app_path");
		}
		elseif ( $_SESSION['app'] == 'twitter' ) {
			$app_path = './platforms/twitter-app/twitter.php';
			header("Location: $app_path");
		}
		elseif ( $_SESSION['app'] == 'google' ) {
			$app_path = './platforms/google-app/google.php';
			header("Location: $app_path");
		}
		else {
			header("Location: ".$_SESSION['authstation']);
		}
	}
	else {
		header("Location: ".$_SESSION['authstation']);
	}
}
?>