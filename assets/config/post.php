<?php
require_once('config.php');

class post{
	function sendPost(){
		try {
			$config = new CConfig();
			$conn = new PDO('mysql:host=' . $config::$DBServer . ';dbname=' . $config::$DBName . ';charset=utf8', $config::$DBUser, $config::$DBPass);

			$curdate = date('d') . "/" . date('m') . "/" . date('Y');
			
			$stmt = $conn->prepare("INSERT INTO posts (title, content, postdate, author) VALUES (:title,:content,:curdate, :author)");
			$stmt->execute(array(':title' => $_POST['title'], 
			':content' => $_POST['content'], 
			':curdate' => $curdate, 
			':author' => $_POST['author']));
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			header("Location: " . $config::$baseurl);
			
		} catch(PDOException $ex) {
			echo "An error occurred!";
		}
	}

	function updatePost(){
		try {
			$config = new CConfig();
			$conn = new PDO('mysql:host=' . $config::$DBServer . ';dbname=' . $config::$DBName . ';charset=utf8', $config::$DBUser, $config::$DBPass);

			$stmt = $conn->prepare("UPDATE posts SET title=:title, content=:content WHERE id=:id");
			$stmt->execute(array(':title' => $_POST['title'], 
			':content' => $_POST['content'], 
			':id' => $_POST['pid']));
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	 
			header("Location: " . $config::$baseurl . "viewpost.php?id=" . $_POST['pid']);
			
		} catch(PDOException $ex) {
			echo "An error occurred!";
		}
	}

	function deletePost(){
		try {
		
			$config = new CConfig();
			$conn = new PDO('mysql:host=' . $config::$DBServer . ';dbname=' . $config::$DBName . ';charset=utf8', $config::$DBUser, $config::$DBPass);

			$stmt = $conn->prepare("DELETE FROM posts WHERE id=:id");
			$stmt->bindValue(':id', $_POST['pid'], PDO::PARAM_STR);
			$stmt->execute();
			

			  header("Location: " . $config::$baseurl);
		} catch(PDOException $ex) {
			echo "An error occurred!";
		}
	}
}
?>