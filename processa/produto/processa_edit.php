<?php
	session_start();

	include_once("../../seguranca.php");
	include_once("../../conexao.php");

	$id = $_POST["id"];
	$nome = $_POST["nome"];
	$desc_c = $_POST["descricao_curta"];
	$desc_l = $_POST["descricao_longa"];
	$preco = $_POST["preco"];
	$tag = $_POST["tag"];
	$description = $_POST["description"];
	$imagem = $_FILES['imagem']['name'];
	$categoria_id = $_POST["categoria_id"];
	$situacao_id = $_POST["situacao_id"];
	$img_antiga = $_FILES['img_antiga']['name'];


	// Array de extensões permitidas
	$_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');


	// Verifica extensão
	$extensao = strtolower(end(explode('.', $_FILES['imagem']['name'])));

	if ($imagem == "") {
		$editProd=$pdo->prepare("UPDATE produtos SET nome=:nome, desc_c=:desc_c, desc_l=:desc_l, preco=:preco, tag=:tag, description=:description, categoria_id=:categoria_id, situacao_id=:situacao_id WHERE id=:id");

		$editProd->bindValue(":id", $id);
		$editProd->bindValue(":nome", $nome);
		$editProd->bindValue(":desc_c", $desc_c);
		$editProd->bindValue(":desc_l", $desc_l);
		$editProd->bindValue(":preco", $preco);
		$editProd->bindValue(":tag", $tag);
		$editProd->bindValue(":description", $description);
		$editProd->bindValue(":categoria_id", $categoria_id);
		$editProd->bindValue(":situacao_id", $situacao_id);
	} else {
		if (array_search($extensao, $_UP['extensoes']) === false) {
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/teste/administrativo.php?link=13&id=$id'>

			<script type=\"text/javascript\">
				alert(\"Por favor, envie arquivos com as seguintes extensões: jpeg, jpg, png, gif!\");
			</script>";
		} 
		
		$editProd=$pdo->prepare("UPDATE produtos SET nome=:nome, desc_c=:desc_c, desc_l=:desc_l, preco=:preco, tag=:tag, description=:description, imagem=:imagem, categoria_id=:categoria_id, situacao_id=:situacao_id WHERE id=:id");

			$editProd->bindValue(":id", $id);
			$editProd->bindValue(":nome", $nome);
			$editProd->bindValue(":desc_c", $desc_c);
			$editProd->bindValue(":desc_l", $desc_l);
			$editProd->bindValue(":preco", $preco);
			$editProd->bindValue(":tag", $tag);
			$editProd->bindValue(":description", $description);
			$editProd->bindValue(":imagem", $imagem);
			$editProd->bindValue(":categoria_id", $categoria_id);
			$editProd->bindValue(":situacao_id", $situacao_id);
	}
		
	// Executa o cadastro
	$editProd->execute();

	if ($editProd->rowCount()) {
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/teste/administrativo.php?link=10'>

			<script type=\"text/javascript\">
				alert(\"Produto alterado com sucesso!\");
			</script>";
	} else {
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/teste/administrativo.php?link=10'>

			<script type=\"text/javascript\">
				alert(\"Alteração não realizada!\");
			</script>";
	}


?>