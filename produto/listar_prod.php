<?php

	$bsucarProd=$pdo->prepare("SELECT * FROM produtos ORDER BY id");

	$bsucarProd->execute();

	$linha=$bsucarProd->fetchAll(PDO::FETCH_OBJ);

?>

<div class="container theme-showcase" role="main">

    <div class="page-header">
		<h1>Lista de Produtos</h1>
	</div>
	<div class="row">

		<a href='administrativo.php?link=11'><button type='button' class='btn btn-sm btn-info'> Cadastrar Produto </button></a>

		</br></br>


	    <div class="col-md-12">
	    	<table class="table">
	        	<thead>
	         		<tr>
	            		<th>ID</th>
	            		<th>Nome</th>
	            		<th>Preço</th>
	            		<th>Situação</th>
	            		<th>Ações</th>
	          		</tr>
	        	</thead>
	        	<tbody>
	        		<?php
	        			foreach ($linha as $listarP) {
							echo "<tr>";
								echo "<td>".$listarP->id."</td>";
								echo "<td>".$listarP->nome."</td>";
								echo "<td>".$listarP->preco."</td>";
								$buscarCate=$pdo->prepare("SELECT * FROM situacoes WHERE id=:id");

				                $buscarCate->bindValue(":id", $listarP->situacao_id);

				                $buscarCate->execute();

				                $linha=$buscarCate->fetchAll(PDO::FETCH_OBJ);
				                    
				                foreach ($linha as $listar) {
				                  
				                  echo "<td>".$listar->nome."</td>";
				                }
								?>
								<td>
									<a href='administrativo.php?link=13&id=<?php echo $listarP->id;?>'><button type='button' class='btn btn-sm btn-default'> Editar </button></a>

									<a href='administrativo.php?link=12&id=<?php echo $listarP->id;?>'><button type='button' class='btn btn-sm  btn-primary'> Visualizar </button></a>

									<a href='processa/produto/processa_delete.php?id=<?php echo $listarP->id;?>'><button type='button' class='btn btn-sm  btn-danger'> Apagar </button></a>
								</td>
								<?php
							echo "</tr>";
						}
	        		?>
	        	</tbody>
	      	</table>
	    </div>
	</div>
    
</div> <!-- /container -->
 



