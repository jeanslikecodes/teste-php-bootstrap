<?php
	session_start();

	include_once("../../seguranca.php");
	include_once("../../conexao.php");

	$id = $_GET["id"];

	// Prepara o cadastro
	$cadastraUsu=$pdo->prepare("DELETE FROM categorias WHERE id=:id");

	$cadastraUsu->bindValue(":id", $id);
		
	// Executa o cadastro
	$cadastraUsu->execute();

	if ($cadastraUsu->rowCount()) {
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/teste/administrativo.php?link=7'>

			<script type=\"text/javascript\">
				alert(\"Categoria excluída com sucesso!\");
			</script>";
	} else {
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/teste/administrativo.php?link=7'>

			<script type=\"text/javascript\">
				alert(\"Exclusão não realizada!\");
			</script>";
	}


?>