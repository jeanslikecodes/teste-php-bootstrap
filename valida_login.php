<?php 

	session_start();

	$usuariot = $_POST['usuario'];
	$senhat = $_POST['senha'];

	echo $usuariot.' '.$senhat;

	include_once("conexao.php");

	$buscarusuario=$pdo->prepare("SELECT * FROM usuarios WHERE username=:username AND senha=:senha");

	$buscarusuario->bindValue(":username", $usuariot);
	$buscarusuario->bindValue(":senha", $senhat);

	$buscarusuario->execute();
	
	$linha=$buscarusuario->fetchAll(PDO::FETCH_ASSOC);
		
	foreach ($linha as $listar) {
		echo "Nome: ".$listar['nome']."<br/>";
	}

	if(empty($linha)) {
		$_SESSION['LoginErro'] = "Usuário e/ou Senha inválidos!";

		header("Location: login.php");
	} else {
		$_SESSION['usuarioId'] = $listar['id'];
		$_SESSION['usuarioNome'] = $listar['nome'];
		$_SESSION['usuarioEmail'] = $listar['email'];
		$_SESSION['usuarioUsername'] = $listar['username'];
		$_SESSION['usuarioSenha'] = $listar['senha'];
		$_SESSION['usuarioNivel'] = $listar['nivel_acesso_id'];

		if($_SESSION['usuarioNivel'] == 1) {
			header("Location: administrativo.php");
		} else {
			header("Location: usuario.php");
		}

	}


?>



