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
	<meta NAME="description" CONTENT="Vlad's Blog is basically my home place to just chat with people and advertise my thoughts.">
	<meta NAME="keywords" CONTENT="vladr, studios, blog">
	<title><?php echo $config::$title; ?></title>
	<link href=<?php echo '"' . $config::$baseurl . 'assets/themes/' . $config::$theme . '/style.css' . '"'; ?> rel="stylesheet" media="screen">
</head>
<body>
	<div class="header">
		<a href=<?php echo '"' . $config::$baseurl . '"'; ?> >
			<img class="logo" src=<?php echo '"' . $config::$baseurl . 'assets/themes/' . $config::$theme . '/images/logo.png' . '"'; ?> >
		</a>
	</div>
	
	<div class="content">

		<!-- Start Posts -->
		<?php $get->getThisPost($_GET['id']); ?>
		<!-- End Posts -->
		
		<div class="newPostBox" id="disqus_thread"></div>
    
		<div id="disqus_thread"></div>
		<script type="text/javascript">
			/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
			var disqus_shortname = 'CHANGETHIS_TO_YOUR_USERNAME'; // required: replace example with your forum shortname

			/* * * DON'T EDIT BELOW THIS LINE * * */
			(function() {
				var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
				dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
				(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
			})();
		</script>
		<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript"></a></noscript>
		<div style="margin-left:60px;">
			
		</div><br>
	</div>
	
	
	<div class="footer">
		
		<div class="footerContent"><p></p></div>
	</div>
</body>
</html>