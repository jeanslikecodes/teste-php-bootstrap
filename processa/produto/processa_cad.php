<?php
	session_start();

	include_once("../../seguranca.php");
	include_once("../../conexao.php");

	$nome = $_POST["nome"];
	$desc_c = $_POST["descricao_curta"];
	$desc_l = $_POST["descricao_longa"];
	$preco = $_POST["preco"];
	$tag = $_POST["tag"];
	$description = $_POST["description"];
	$imagem = $_FILES['imagem']['name'];
	$categoria_id = $_POST["categoria_id"];
	$situacao_id = $_POST["situacao_id"];


	// Pasta onde o arquivo vai ser salvo
	$_UP['pasta'] = "../../imagens/";

	// Tamanho máximo do arquivo (Em bytes)
	$_UP['tamanho'] = 1014*1024*2; // 5 mb

	// Array de extensões permitidas
	$_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');

	// Renomear arquivo (Se true, será salvo como .jpg e em nome único)
	$_UP['renomear'] = false;

	// Array com os tipos de erros de upload de PHP
	$_UP['erros'][0] = 'Não houve erro';
	$_UP['erros'][1] = 'O arquivo é maior que o limite do PHP!';
	$_UP['erros'][2] = 'O arquivo é maior que o limite especificado no html!';
	$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente!';
	$_UP['erros'][4] = 'Não foi feito o upload do arquivo!'; 

	// Verifica se houve erro
	if ($_FILES['imagem']['error'] != 0) {
		die ("Não foi possível fazer o upload, erro: <br />".$_UP['erros'].$_FILES['imagem']['error']);
		exit;
	} 

	// Verifica extensão
	$extensao = strtolower(end(explode('.', $_FILES['imagem']['name'])));

	if (array_search($extensao, $_UP['extensoes']) === false) {
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/teste/administrativo.php?link=11'>

			<script type=\"text/javascript\">
				alert(\"Por favor, envie arquivos com as seguintes extensões: jpeg, jpg, png, gif!\");
			</script>";
	} else if ($_UP['tamanho'] < $_FILES['imagem']['size']) {
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/teste/administrativo.php?link=10'>

			<script type=\"text/javascript\">
				alert(\"imagem maior!\");
			</script>";
  
	} else { // Hora de movelo para a pasta foto
	
		// Verifica se deve trocar o nome da imagem
		if ($_UP['renomear'] == true ) {
			// Cria um nome baeado no Unix Timestamp atual com extensão '.jpg'
			$nome_final = md5(time()).'.'.extensao;
		}  else {
			// Mantem o nome original do arquivo
			$nome_final = $_FILES['imagem']['name'];
		}
		
		// Verificar se é possível mover a imagem
		if (move_uploaded_file($_FILES['imagem']['tmp_name'], $_UP['pasta'].$nome_final)) {

			// Prepara o cadastro
			 $cadastrarProd=$pdo->prepare("INSERT INTO produtos(nome, desc_c, desc_l, preco, tag, description, imagem, categoria_id, situacao_id)VALUES(:nome, :desc_c, :desc_l, :preco, :tag, :description, :imagem, :categoria_id, :situacao_id)");

			$cadastrarProd->bindValue(":nome", $nome);
			$cadastrarProd->bindValue(":desc_c", $desc_c);
			$cadastrarProd->bindValue(":desc_l", $desc_l);
			$cadastrarProd->bindValue(":preco", $preco);
			$cadastrarProd->bindValue(":tag", $tag);
			$cadastrarProd->bindValue(":description", $description);
			$cadastrarProd->bindValue(":imagem", $nome_final);
			$cadastrarProd->bindValue(":categoria_id", $categoria_id);
			$cadastrarProd->bindValue(":situacao_id", $situacao_id);
				
			// Executa o cadastro
			$cadastrarProd->execute();

			if ($cadastrarProd->rowCount()) {
				echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/teste/administrativo.php?link=10'>

					<script type=\"text/javascript\">
						alert(\"Produto cadastado com sucesso!\");
					</script>";
			} else {
				echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/teste/administrativo.php?link=10'>

					<script type=\"text/javascript\">
						alert(\"Cadastro não realizado!\");
					</script>";
			} 

		} else {
			echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/teste/administrativo.php?link=10'>

			<script type=\"text/javascript\">
				alert(\"Imagem não carregada!\");
			</script>";
		}

	} 


?>