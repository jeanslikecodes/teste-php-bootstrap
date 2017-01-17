<?php
	session_start();

	include_once("../../seguranca.php");
	include_once("../../conexao.php");

	$id = $_GET["id"];

	// Prepara o cadastro
	$excluirProd=$pdo->prepare("DELETE FROM produtos WHERE id=:id");

	$excluirProd->bindValue(":id", $id);
		
	// Executa o cadastro
	$excluirProd->execute();

	if ($excluirProd->rowCount()) {
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/teste/administrativo.php?link=10'>

			<script type=\"text/javascript\">
				alert(\"Produto excluído com sucesso!\");
			</script>";
	} else {
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/teste/administrativo.php?link=10'>

			<script type=\"text/javascript\">
				alert(\"Exclusão não realizada!\");
			</script>";
	}


?>