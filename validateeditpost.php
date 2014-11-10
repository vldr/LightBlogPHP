<?php
require_once('assets/config/post.php');
require_once('assets/config/config.php');

$config = new CConfig();
$post = new post();

$post->updatePost();
?>