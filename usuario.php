<?php  
	session_start();

	include_once("seguranca.php");

	echo "Bem vindo usuário ".$_SESSION['usuarioNome']."!<br/><br/>";


	echo "Id: ".$_SESSION['usuarioId']."<br/>";
	echo "Nome: ".$_SESSION['usuarioNome']."<br/>";
	echo "E-mail: ".$_SESSION['usuarioEmail']."<br/>";
	echo "Username: ".$_SESSION['usuarioUsername']."<br/>";
	echo "Nível de acesso: ".$_SESSION['usuarioNivel']."<br/>";
?>
<a href="sair.php">Sair</a>