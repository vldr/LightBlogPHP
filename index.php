<?php
require_once('assets/config/config.php');
require_once('assets/config/get.php');

$config = new CConfig();
$get = new get();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta CHARSET="UTF-8">
	<title><?php echo $config::$title; ?></title>
	<link href=<?php echo '"' . $config::$baseurl . 'assets/themes/' . $config::$theme . '/style.css' . '"'; ?> rel="stylesheet" media="screen">
	<script>
		function CreateRedirectKey(keyID, url){
	                window.addEventListener("keydown", function(e){
	                        if (e.keyCode == keyID) {
	                                window.location.replace(url);
	                        }
	                });
        	}
       
        	CreateRedirectKey(219, '<?php echo $config::$baseurl; ?>' + 'createpost.php');	
	</script>
	
</head>
<body>
	
	
	<div class="header">
		<a href=<?php echo '"' . $config::$baseurl . '"'; ?> >
			<img class="logo" src=<?php echo '"' . $config::$baseurl . 'assets/themes/' . $config::$theme . '/images/logo.png' . '"'; ?> >
		</a>	
	</div>
	
	<div class="content">

		<!-- Start Posts -->
		<?php $get->getPosts(); ?>
		<!-- End Posts -->
		<br>
	</div>
	<div class="footer">
		<div class="footerContent"><p></p></div>
	</div>
</body>
</html>
