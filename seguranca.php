<?php 
	ob_start();

	if($_SESSION['usuarioId'] == "" || $_SESSION['usuarioNome'] == "" || $_SESSION['usuarioUsername'] == "" || $_SESSION['usuarioNivel'] == "" || $_SESSION['usuarioSenha'] == "") {

		unset($_SESSION['LoginErro'],
            $_SESSION['usuarioId'],
            $_SESSION['usuarioNome'],
            $_SESSION['usuarioEmail'],
            $_SESSION['usuarioUsername'],
            $_SESSION['usuarioSenha'],
            $_SESSION['usuarioNivel']);

		$_SESSION['LoginErro'] = "Usuário deverá estar logado!";

		header("Location: login.php");
	}

?>