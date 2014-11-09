<?php
//Incluir a configuração default;
require_once('config.php');
require_once('nbbc.php');

class get{
	//Função para pegar os posts da DB;
	function getPosts(){
		$config = new CConfig();
		$bb = new bbcode();
		
		//Cria uma nova conexão MySqli;
		$conn = new mysqli($config::$DBServer, $config::$DBUser, $config::$DBPass, $config::$DBName);

		//Tenta conectar, caso contrário informe o erro;
		if ($conn->connect_error) {
		  trigger_error('A conexão com a database falhou: '  . $conn->connect_error, E_USER_ERROR);
		}

		//Pre-definimos a seleção do conteúdo da tabela posts;
		$sql='SELECT * FROM posts ORDER by id DESC';

		//Conectamos e Selecionamos;
		$rs=$conn->query($sql);

		//Caso falhe, lançe erro, em sucesso, salvar em array;
		if($rs === false) {
		  trigger_error('SQL Incorreto: ' . $sql . ' Erro: ' . $conn->error, E_USER_ERROR);
		} else {
		  $rows_returned = $rs->num_rows;
		}

		//Mostra as informações retiradas da DB em forma de post;
		$rs->data_seek(0);
		while($row = $rs->fetch_assoc()){
		    echo '<div class="postBox">
				<div class="postHeader">
					<a class="postTitle" href=' . 'viewpost.php?id=' . $row['id'] . '>' . $row['title'] . '</a>
					<span class="postDate">' . $row['postdate'] . '</span>
				</div><br>
				<div class="postContent"><p>' . nl2br($bb->Parse($row['content'])) . '</p></div><br>
				<div class="postFooter">
					<a href="createpost.php"><span class="editPostButton">Create Post</span></a>
					<span class="postAuthor">' . $row['author'] . '</span>
				</div>
			</div>';
		}
		$rs->free();
	}


	//Pegar o post com o ID correspondente.
	function getThisPost($id){
		$config = new CConfig();
		$bb = new bbcode();
		
		//Cria uma nova conexão MySqli;
		$conn = new mysqli($config::$DBServer, $config::$DBUser, $config::$DBPass, $config::$DBName);

		//Tenta conectar, caso contrário informe o erro;
		if ($conn->connect_error) {
		  trigger_error('A conexão com a database falhou: '  . $conn->connect_error, E_USER_ERROR);
		}

		//Pre-definimos a seleção do conteúdo da tabela posts;
		$sql='SELECT * FROM posts WHERE id="' . $id . '"';

		//Conectamos e Selecionamos;
		$rs=$conn->query($sql);

		//Caso falhe, lançe erro, em sucesso, salvar em array;
		if($rs === false) {
		  trigger_error('SQL Incorreto: ' . $sql . ' Erro: ' . $conn->error, E_USER_ERROR);
		} else {
		  $rows_returned = $rs->num_rows;
		}

		//Mostra as informações retiradas da DB em forma de post;
		$rs->data_seek(0);
		while($row = $rs->fetch_assoc()){
		    echo '<div class="postBox">
				<div class="postHeader">
					<span class="postTitleOnPage">' . $row['title'] . '</span>
					<span class="postDate">' . $row['postdate'] . '</span>
				</div><br>
				<div class="postContent"><p>' . nl2br($bb->Parse($row['content'])) . '</p></div><br>
				<div class="postFooter">
					<a href="editpost.php?id=' . $_GET["id"] . '"><span class="editPostButton">Edit Post</span></a>
					<a href="deletepost.php?id=' . $_GET["id"] . '"><span class="editPostButton">Delete Post</span></a>
					<span class="postAuthor">' . $row['author'] . '</span>
					
				</div>
			</div>';
		}

		if ($rows_returned == 0){
			echo '<div class="postBox">
				<div class="postHeader">
					<span class="postTitle">Woah! An error occurred!</span>
				</div>
				<div class="postContent"><p>The post you were looking for was not found! <br>You probably typed the wrong number or the post does not exist anymore.<br/></p></div>
				<div class="postFooter">
					<span class="postAuthor"></span>
				</div>
			</div>';
		}
		$rs->free();
	}

	//Pegar o conteúdo post com o ID correspondente.
	function getThisPostContent($id){
		$config = new CConfig();
		
		//Cria uma nova conexão MySqli;
		$conn = new mysqli($config::$DBServer, $config::$DBUser, $config::$DBPass, $config::$DBName);

		//Tenta conectar, caso contrário informe o erro;
		if ($conn->connect_error) {
		  trigger_error('A conexão com a database falhou: '  . $conn->connect_error, E_USER_ERROR);
		}

		//Pre-definimos a seleção do conteúdo da tabela posts;
		$sql='SELECT * FROM posts WHERE id="' . $id . '"';

		//Conectamos e Selecionamos;
		$rs=$conn->query($sql);

		//Caso falhe, lançe erro, em sucesso, salvar em array;
		if($rs === false) {
		  trigger_error('SQL Incorreto: ' . $sql . ' Erro: ' . $conn->error, E_USER_ERROR);
		} else {
		  $rows_returned = $rs->num_rows;
		}

		//Mostra as informações retiradas da DB em forma de post;
		$rs->data_seek(0);
		while($row = $rs->fetch_assoc()){
		    echo $row['content'];
		}

		if ($rows_returned == 0){
			header("Location: " . $config::$baseurl);
		}
		$rs->free();
	}

	//Pegar o conteúdo post com o ID correspondente.
	function getThisPostTitle($id){
		$config = new CConfig();
		$bb = new bbcode();
		
		//Cria uma nova conexão MySqli;
		$conn = new mysqli($config::$DBServer, $config::$DBUser, $config::$DBPass, $config::$DBName);

		//Tenta conectar, caso contrário informe o erro;
		if ($conn->connect_error) {
		  trigger_error('A conexão com a database falhou: '  . $conn->connect_error, E_USER_ERROR);
		}

		//Pre-definimos a seleção do conteúdo da tabela posts;
		$sql='SELECT * FROM posts WHERE id="' . $id . '"';

		//Conectamos e Selecionamos;
		$rs=$conn->query($sql);

		//Caso falhe, lançe erro, em sucesso, salvar em array;
		if($rs === false) {
		  trigger_error('SQL Incorreto: ' . $sql . ' Erro: ' . $conn->error, E_USER_ERROR);
		} else {
		  $rows_returned = $rs->num_rows;
		}

		//Mostra as informações retiradas da DB em forma de post;
		$rs->data_seek(0);
		while($row = $rs->fetch_assoc()){
		    echo  '"' . $row['title'] . '"';
		}

		if ($rows_returned == 0){
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
		$rs->free();
	}

	function checkIfExists($id){
		$config = new CConfig();
		
		//Cria uma nova conexão MySqli;
		$conn = new mysqli($config::$DBServer, $config::$DBUser, $config::$DBPass, $config::$DBName);

		//Tenta conectar, caso contrário informe o erro;
		if ($conn->connect_error) {
		  trigger_error('A conexão com a database falhou: '  . $conn->connect_error, E_USER_ERROR);
		}

		//Pre-definimos a seleção do conteúdo da tabela posts;
		$sql='SELECT * FROM posts WHERE id="' . $id . '"';

		//Conectamos e Selecionamos;
		$rs=$conn->query($sql);

		//Caso falhe, lançe erro, em sucesso, salvar em array;
		if($rs === false) {
		  trigger_error('SQL Incorreto: ' . $sql . ' Erro: ' . $conn->error, E_USER_ERROR);
		} else {
		  $rows_returned = $rs->num_rows;
		}

		//Mostra as informações retiradas da DB em forma de post;
		$rs->data_seek(0);

		if ($rows_returned == 0){
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
		$rs->free();
	}
}
?>