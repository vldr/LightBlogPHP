<?php
ob_start();

require_once('assets/config/config.php');
$config = new CConfig();

$valid_passwords = $config::$accounts;
$valid_users = array_keys($valid_passwords);

$user = $_SERVER['PHP_AUTH_USER'];
$pass = $_SERVER['PHP_AUTH_PW'];

$validated = (in_array($user, $valid_users)) && ($pass == $valid_passwords[$user]);

if (!$validated) {
  header('WWW-Authenticate: Basic realm="Light Blog"');
  header('HTTP/1.0 401 Unauthorized');
  die('<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title></title><link rel="stylesheet" type="text/css" href="../css/main.css"><link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css"></head><body><div class="content"><!-- Start Error --><div class="postBox"><center><h1>Access denied!</h1></center></div><!-- End Error --></div><div class="footer"><div class="footerContent"><p></p></div></div></body></html>');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $config::$title; ?> - Edit Post</title>
	<link rel="shortcut icon" href=<?php echo '"' . $config::$baseurl . 'assets/themes/' . $config::$theme . '/images/favicon.ico?v=2' . '"'; ?> type="image/x-icon">
	<link rel="icon" href=<?php echo '"' . $config::$baseurl . 'assets/themes/' . $config::$theme . '/images/favicon.ico?v=2' . '"'; ?> type="image/x-icon">
	
	<?php include("assets/config/sceditor.php"); ?>
	
	<style>
	body {
		font-family: 'Open Sans',sans-serif;
	}
	
	.topbar {
		position: absolute !important;
		
		right: 0px !important;
		top:21px !important;
		
		width: auto !important;
		font-size:18px !important;
		padding-right:40px !important;
	}

	.topbar-li {
		display: inline !important;
		margin-left:14.5px !important;;
	}

	.topbar-li a {
		color:black !important;
		text-decoration:underline !important;
		font-family: 'Open Sans', sans-serif;
	}
	</style></head>
<body>
	<div class="header" style="background-position: 2 -220">
	</div>
	<div class="content">
		<div class="topbar">
				<ul class="topbar-ul">
					<li class="topbar-li"><a href="../">Return to Home</a></li>
				</ul>
			</div>
	
		<center>
		<!-- Start Post Form -->
		<br><br><br><br><div class="newPostBox">
			<form method="post" action=<?php echo '"' . $config::$baseurl . 'validatepost.php' . '"'; ?>>
				<label class="newPostTitleTag">Title:</label><br><br>
				<input class="newPostTitle" type="text" name="title" required /><br><br>
				<label class="newPostContentTag">Content: </label><br><br>
				<textarea class="newPostContent" name="content" style="width: 70%; height: 400px;" required ></textarea><br><br>
				<label class="newPostAttTag">Author: </label><br><br>
				<input class="newPostAtt" type="text" name="author" readonly="readonly" value=<?php echo "'" . $user . "'"; ?> /><br><br><br><br>
				<input class="newPostSubmit" type="submit" value="Submit" />
			</form>
		</div>
		<!-- End Post Form -->

	</div>
	<div class="footer">
		<div class="footerContent"></div>
	</div>
</body>
</html>
