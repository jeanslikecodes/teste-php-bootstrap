<?php
	session_start();

	include_once("../seguranca.php");
	include_once("../conexao.php");

	$id = $_POST["id"];
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$username = $_POST["username"];
	$senha = $_POST["senha"];
	$nivel_acesso = $_POST["nivel_acesso"];

	// Prepara o cadastro
	$cadastraUsu=$pdo->prepare("UPDATE usuarios SET nome=:nome, email=:email, username=:username, senha=:senha, nivel_acesso_id=:nivel_acesso_id WHERE id=:id");

	$cadastraUsu->bindValue(":id", $id);
	$cadastraUsu->bindValue(":nome", $nome);
	$cadastraUsu->bindValue(":email", $email);
	$cadastraUsu->bindValue(":username", $username);
	$cadastraUsu->bindValue(":senha", $senha);
	$cadastraUsu->bindValue(":nivel_acesso_id", $nivel_acesso);
		
	// Executa o cadastro
	$cadastraUsu->execute();

	if ($cadastraUsu->rowCount()) {
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/teste/administrativo.php?link=2'>

			<script type=\"text/javascript\">
				alert(\"Usuário alterado com sucesso!\");
			</script>";
	} else {
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/teste/administrativo.php?link=2'>

			<script type=\"text/javascript\">
				alert(\"Alteração não realizada!\");
			</script>";
	}


?>