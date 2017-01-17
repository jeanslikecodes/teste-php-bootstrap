<?php 
	session_start();

	session_destroy();

	unset($_SESSION['LoginErro'],
            $_SESSION['usuarioId'],
            $_SESSION['usuarioNome'],
            $_SESSION['usuarioEmail'],
            $_SESSION['usuarioUsername'],
            $_SESSION['usuarioSenha'],
            $_SESSION['usuarioNivel']);

	header("Location: login.php");
?>