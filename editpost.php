<?php
require_once('assets/config/config.php');
require_once('assets/config/get.php');
$config = new CConfig();
$get = new get();

$valid_passwords = $config::$accounts;
$valid_users = array_keys($valid_passwords);

$user = $_SERVER['PHP_AUTH_USER'];
$pass = $_SERVER['PHP_AUTH_PW'];

$validated = (in_array($user, $valid_users)) && ($pass == $valid_passwords[$user]);

if (!$validated) {
  header('WWW-Authenticate: Basic realm="Light Blog"');
  header('HTTP/1.0 401 Unauthorized');
  die('<!DOCTYPE html>
  <html lang="en"><head><meta charset="UTF-8"><title></title><link rel="stylesheet" type="text/css" href="../css/main.css"><link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css"></head><body><div class="content"><!-- Start Error --><div class="postBox"><center><h1>Access denied!</h1></center></div><!-- End Error --></div><div class="footer"><div class="footerContent"><p></p></div></div></body></html>');
}

if(!isset($_GET['id'])){
	header("Location: " . $config::$baseurl);
}else{
	if($get->checkIfExists($_GET['id'])){header("Location: " . $config::$baseurl);}else{$pid = $_GET['id'];}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $config::$title; ?> - Edit Post</title>
	<link rel="shortcut icon" href=<?php echo '"' . $config::$baseurl . 'assets/themes/' . $config::$theme . '/images/favicon.ico?v=2' . '"'; ?> type="image/x-icon">
	<link rel="icon" href=<?php echo '"' . $config::$baseurl . 'assets/themes/' . $config::$theme . '/images/favicon.ico?v=2' . '"'; ?> type="image/x-icon">
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
		color:#1A99DB !important;
		text-decoration:underline !important;
		font-family: 'Open Sans', sans-serif;
	}
	</style>
	
</head>
<body>
	<div class="header" style="background-position: 2 -220">
	</div>
	<div class="content">

		<!-- Start Post Form -->
		<div class="topbar">
				<ul class="topbar-ul">
					<li class="topbar-li"><a href="viewpost.php?id=<?php echo $pid; ?>">Return to Post</a></li>
				</ul>
			</div>
		
		<div class="newPostBox">
		<center>
			<br><br><br><form method="post" action=<?php echo '"' . $config::$baseurl . 'validateeditpost.php' . '"'; ?>>
				<input type="hidden" name="pid" value=<?php echo $pid; ?>>
				<label class="newPostTitleTag">Title:</label><br><br>
				<input class="newPostTitle" type="text" name="title" required value=<?php $get->getThisPostTitle($pid); ?> />
				<br><br><label class="newPostContentTag">Content:</label><br><br>
				<textarea class="newPostContent" style="height:300px; width:500px;" name="content" required ><?php $get->getThisPostContent($pid); ?></textarea><br/><br>
				<input class="newPostSubmit" type="submit" value="Submit" />
			</form>
		</div>
		<!-- End Post Form -->

	</div>
	<div class="footer">
		<div class="footerContent"><p></p></div>
	</div>
</body>
</html>