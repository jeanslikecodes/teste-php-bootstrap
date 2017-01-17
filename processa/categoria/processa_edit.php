<?php
	session_start();

	include_once("../../seguranca.php");
	include_once("../../conexao.php");

	$id = $_POST["id"];
	$nome = $_POST["nome"];
	

	// Prepara o cadastro
	$editarCate=$pdo->prepare("UPDATE categorias SET nome=:nome WHERE id=:id");

	$editarCate->bindValue(":id", $id);
	$editarCate->bindValue(":nome", $nome);
		
	// Executa o cadastro
	$editarCate->execute();

	if ($editarCate->rowCount()) {
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/teste/administrativo.php?link=7'>

			<script type=\"text/javascript\">
				alert(\"Categoria alterada com sucesso!\");
			</script>";
	} else {
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/teste/administrativo.php?link=7'>

			<script type=\"text/javascript\">
				alert(\"Alteração não realizada!\");
			</script>";
	}


?>