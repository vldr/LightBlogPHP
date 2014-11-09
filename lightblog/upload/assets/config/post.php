<?php
//Incluir a configuração default;
require_once('config.php');

class post{
	//Função para pegar os posts da DB;
	function sendPost(){
		$config = new CConfig();
		
		//Cria uma nova conexão MySqli;
		$conn = new mysqli($config::$DBServer, $config::$DBUser, $config::$DBPass, $config::$DBName);

		//Tenta conectar, caso contrário informe o erro;
		if ($conn->connect_error) {
		  trigger_error('A conexão com a database falhou: '  . $conn->connect_error, E_USER_ERROR);
		}


		$title = "'" . $conn->real_escape_string($_POST['title']) . "'";
		$content = "'" . $conn->real_escape_string($_POST['content']) . "'";
		$curdate = "'" . date('d') . "/" . date('m') . "/" . date('Y') . "'";
		$author = "'" . $conn->real_escape_string($_POST['author']) . "'";
 
		$sql="INSERT INTO posts (title, content,postdate, author) VALUES ($title,$content,$curdate, $author)";
		 
		if($conn->query($sql) === false) {
		  trigger_error('SQL Incorreto: ' . $sql . ' Erro: ' . $conn->error, E_USER_ERROR);
		  echo "Ocorreu um erro ao enviar seu post! Tente novamente!";
		} else {
		  $last_inserted_id = $conn->insert_id;
		  $affected_rows = $conn->affected_rows;
		  header("Location: " . $config::$baseurl);
		}
	}

	function updatePost(){
		$config = new CConfig();
		
		//Cria uma nova conexão MySqli;
		$conn = new mysqli($config::$DBServer, $config::$DBUser, $config::$DBPass, $config::$DBName);

		//Tenta conectar, caso contrário informe o erro;
		if ($conn->connect_error) {
		  trigger_error('A conexão com a database falhou: '  . $conn->connect_error, E_USER_ERROR);
		}


		$title = "'" . $conn->real_escape_string($_POST['title']) . "'";
		$content = "'" . $conn->real_escape_string($_POST['content']) . "'";
		$id = "'" . $_POST['pid'] . "'";
 
		$sql="UPDATE posts SET title=$title, content=$content WHERE id=$id";

		if($conn->query($sql) === false) {
		  trigger_error('SQL Incorreto: ' . $sql . ' Erro: ' . $conn->error, E_USER_ERROR);
		  echo "Ocorreu um erro ao atualizar seu post! Tente novamente!";
		} else {
		  $last_inserted_id = $conn->insert_id;
		  $affected_rows = $conn->affected_rows;
		  header("Location: " . $config::$baseurl . "viewpost.php?id=" . $_POST['pid']);
		}
	}

	function deletePost(){
		$config = new CConfig();
		
		//Cria uma nova conexão MySqli;
		$conn = new mysqli($config::$DBServer, $config::$DBUser, $config::$DBPass, $config::$DBName);

		//Tenta conectar, caso contrário informe o erro;
		if ($conn->connect_error) {
		  trigger_error('A conexão com a database falhou: '  . $conn->connect_error, E_USER_ERROR);
		}


		$title = "'" . $conn->real_escape_string($_POST['title']) . "'";
		$content = "'" . $conn->real_escape_string($_POST['content']) . "'";
		$id = "'" . $_POST['pid'] . "'";
 
		$sql="DELETE FROM posts WHERE id=$id";

		if($conn->query($sql) === false) {
		  trigger_error('SQL Incorreto: ' . $sql . ' Erro: ' . $conn->error, E_USER_ERROR);
		  echo "Ocorreu um erro ao atualizar seu post! Tente novamente!";
		} else {
		  $last_inserted_id = $conn->insert_id;
		  $affected_rows = $conn->affected_rows;
		  header("Location: " . $config::$baseurl);
		}
	}
}
?>