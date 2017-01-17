<?php
	session_start();

	include_once("../../seguranca.php");
	include_once("../../conexao.php");

	$nome = $_POST["nome"];

	// Prepara o cadastro
	$cadastraCate=$pdo->prepare("INSERT INTO categorias(nome)VALUES(:nome)");

	$cadastraCate->bindValue(":nome", $nome);
		
	// Executa o cadastro
	$cadastraCate->execute();

	if ($cadastraCate->rowCount()) {
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/teste/administrativo.php?link=7'>

			<script type=\"text/javascript\">
				alert(\"Categoria cadastada com sucesso!\");
			</script>";
	} else {
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/teste/administrativo.php?link=7'>

			<script type=\"text/javascript\">
				alert(\"Cadastro não realizado!\");
			</script>";
	}


?>