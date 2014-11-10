<?php
require_once('config.php');
require_once('nbbc.php');

class get{
	function getPosts(){
		try {
			$config = new CConfig();
			$bb = new bbcode();
			
			$conn = new PDO('mysql:host=' . $config::$DBServer . ';dbname=' . $config::$DBName . ';charset=utf8', $config::$DBUser, $config::$DBPass);
			$stmt = $conn->query('SELECT * FROM posts ORDER by id DESC');
			

			while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				echo '<div class="postBox">
					<div class="postHeader">
						<a class="postTitle" href=' . 'viewpost.php?id=' . $row['id'] . '>' . $row['title'] . '</a>
						<span class="postDate">' . $row['postdate'] . '</span>
					</div>
					<div class="postContent"><p>' . nl2br($bb->Parse($row['content'])) . '</p></div>
					<div class="postFooter">
						<a href="createpost.php"><span class="editPostButton">Create Post</span></a>
						<span class="postAuthor">' . $row['author'] . '</span>
					</div>
				</div>';
			}
		} catch(PDOException $ex) {
			echo "An error occurred!";
		}
	}

	function getThisPost($id){
		try {
			$config = new CConfig();
			$bb = new bbcode();
			
			$conn = new PDO('mysql:host=' . $config::$DBServer . ';dbname=' . $config::$DBName . ';charset=utf8', $config::$DBUser, $config::$DBPass);
			$stmt = $conn->prepare("SELECT * FROM posts WHERE id=:id");
			$stmt->execute(array(':id' => $id));
			
			$row_count = $stmt->rowCount();

			while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				echo '<div class="postBox">
					<div class="postHeader">
						<span class="postTitleOnPage">' . $row['title'] . '</span>
						<span class="postDate">' . $row['postdate'] . '</span>
					</div>
					<div class="postContent"><p>' . nl2br($bb->Parse($row['content'])) . '</p></div>
					<div class="postFooter">
						<a href="editpost.php?id=' . $row['id'] . '"><span class="editPostButton">Edit Post</span></a>
						<a href="deletepost.php?id=' . $row['id'] . '"><span class="editPostButton">Delete Post</span></a>
						<span class="postAuthor">' . $row['author'] . '</span>
						
					</div>
				</div>';
			}

			if ($row_count == 0){
				echo '<div class="postBox">
					<div class="postHeader">
						<span class="postTitleOnPage">Woah! An error occurred!</span>
					</div>
					<div class="postContent"><p>The post you were looking for was not found! <br>You probably typed the wrong number or the post does not exist anymore.<br/></p></div>
					<div class="postFooter">
						<span class="postAuthor"></span>
					</div>
				</div>';
			}
		} catch(PDOException $ex) {
			echo "An error occurred!";
		}
	}

	function getThisPostContent($id){
		try {
			$config = new CConfig();
			$bb = new bbcode();
			
			$conn = new PDO('mysql:host=' . $config::$DBServer . ';dbname=' . $config::$DBName . ';charset=utf8', $config::$DBUser, $config::$DBPass);
			$stmt = $conn->prepare("SELECT * FROM posts WHERE id=:id");
			$stmt->execute(array(':id' => $id));
			
			$row_count = $stmt->rowCount();

			while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				echo $row['content'];
			}

			if ($row_count == 0){
				header("Location: " . $config::$baseurl);
			}
		} catch(PDOException $ex) {
			echo "An error occurred!";
		}
	}

	function getThisPostTitle($id){
		try {
			$config = new CConfig();
			$bb = new bbcode();
			
			$conn = new PDO('mysql:host=' . $config::$DBServer . ';dbname=' . $config::$DBName . ';charset=utf8', $config::$DBUser, $config::$DBPass);
			$stmt = $conn->prepare("SELECT * FROM posts WHERE id=:id");
			$stmt->execute(array(':id' => $id));
			
			$row_count = $stmt->rowCount();

			while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				echo '"' . $row['title'] . '"';
			}

			if ($row_count == 0){
				header("Location: " . $config::$baseurl);
			}
		} catch(PDOException $ex) {
			echo "An error occurred!";
		}
	}

	function checkIfExists($id){
		try {
			$config = new CConfig();
			$bb = new bbcode();
			
			$conn = new PDO('mysql:host=' . $config::$DBServer . ';dbname=' . $config::$DBName . ';charset=utf8', $config::$DBUser, $config::$DBPass);
			$stmt = $conn->prepare("SELECT * FROM posts WHERE id=:id");
			$stmt->execute(array(':id' => $id));
			
			$row_count = $stmt->rowCount();

			if ($row_count == 0){
				die('<div class="postBox">
					<div class="postHeader">
						<span class="postTitle">Woah! An error occurred!</span>
					</div>
					<div class="postContent"><p>The post you were looking for was not found! <br>You probably typed the wrong number or the post does not exist anymore.<br/></p></div>
					<div class="postFooter">
						<span class="postAuthor"></span>
					</div>
				</div>');
			}
		} catch(PDOException $ex) {
			echo "An error occurred!";
		}
	}
}
?>