<?php
// ******************
// Sumeet Sadarangani: JDSOFTTECH Social Login Plugin;
// Harsh Shah: Sr. Designer
// ******************
session_start();
unset($_SESSION['userprofile']);
unset($_SESSION['app']);
unset($_SESSION['ssa_return_url']);
unset($_SESSION['access_token']);
unset($_SESSION['oauth_token']);
unset($_SESSION['oauth_token_secret']);
$_SESSION['authstation'] = (isset($_SESSION['authstation']) ? $_SESSION['authstation'] : null);
if ( isset($_SESSION['authstation']) ) {
	header("Location: ".$_SESSION['authstation']);
}
else {
	echo 'Sessions have been removed. Please return the home page.';
}
?>