<?php
// ******************
// Sumeet Sadarangani: JDSOFTTECH Social Login Plugin;
// Harsh Shah: Sr. Designer
// ******************
session_start();
$_SESSION['authstation'] = (isset($_SESSION['authstation']) ? $_SESSION['authstation'] : null);
if ( !isset($_SESSION['authstation']) ) {
	$_SESSION['authstation'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sumeet Social Login Auth PHP</title>
<meta name="description" content="This is a demo of Sumeet Social Auth PHP Plugin. This Plugin is free and easy to use" />
<style>
	html,
body,
div,
span,
applet,
object,
iframe,
input,
h1,
h2,
h3,
h4,
h5,
h6,
p,
blockquote,
pre,
a,
abbr,
acronym,
address,
big,
cite,
code,
del,
dfn,
em,
font,
img,
ins,
kbd,
q,
s,
samp,
small,
strike,
strong,
sub,
sup,
tt,
var,
dl,
dt,
dd,
ol,
ul,
li,
fieldset,
form,
label,
legend,
table,
caption,
tbody,
tfoot,
thead,
tr,
th,
td{
	margin:0;
	padding:0;
}
a { text-decoration:none; }
img { border:0px; }
h1 {
	font-size:100px;
	line-height:1;
	font-family: sans-serif;
	font-weight:normal;
}
.header {
	width:960px;
	margin:0 auto;
	text-align:center;
}
.maincontainer {
	width:960px;
	margin:0 auto;
	text-align:center;
}
.maincontainer a{
	display:inline-block;
}

.button {
	width:200px;
	height:100px;
	margin:0 10px;
	display:block;
	color:#fff;
	text-align:center;
}
.button:hover {
	opacity:0.7;
}
.button > span {
	font-size:40px;
	font-family:sans-serif;
	line-height:1;
	margin: 30px 0;
	display:block;
}
.fb {
	background: #3C599B;
	margin-bottom:10px;
}
.gg {
	background: #D82A21;
	margin-bottom:10px;
}
.tt {
	background: #00ACEE;
}
</style>
</head>
<body>
<?php
// ******************
// Sumeet Sadarangani: JDSOFTTECH Social Login Plugin;
// Harsh Shah: Sr. Designer
// ******************
if ( !isset($_SESSION["userprofile"]) ) {
?>
<div class="header">
	<div class="logo">
		<img src="http://www.jdsofttech.com/images/jdlogo.png" alt="JDSOFTTECH" />
	</div>
</div>
<div class="maincontainer">
	<a href="auth/login.php?app=facebook" class="button fb">
		<span>Facebook</span>
	</a>
	<a href="auth/login.php?app=google" class="button gg">
		<span>Google</span>
	</a>	
	<a href="auth/login.php?app=twitter" class="button tt">
		<span>Twitter</span>
	</a>
</div>
<?php
// ******************
// Sumeet Sadarangani: JDSOFTTECH Social Login Plugin;
// Harsh Shah: Sr. Designer
// ****************** } else { ?>
<div class="maincontainer">
	<div class="welcome">
		<h2>Hi, <?php
// ******************
// Sumeet Sadarangani: JDSOFTTECH Social Login Plugin;
// Harsh Shah: Sr. Designer
// ****************** echo $_SESSION["userprofile"]['name']; ?></h2>
		<p>You are logged in successfully. See your details below.</p>
	</div>
	<div class="details">
		<pre>
		<?php
// ******************
// Sumeet Sadarangani: JDSOFTTECH Social Login Plugin;
// Harsh Shah: Sr. Designer
// ******************
				print_r($_SESSION["userprofile"]);
		?>
		</pre>		
	</div>
	<h2 class="logout">
		<a href="auth/logout.php">Logout</a>
	</h2>	
	</div>
<?php
// ******************
// Sumeet Sadarangani: JDSOFTTECH Social Login Plugin;
// Harsh Shah: Sr. Designer
// ****************** } ?>
</body>
</html>