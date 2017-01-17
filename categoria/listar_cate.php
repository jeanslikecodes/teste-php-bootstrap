<?php

	$buscarUsu=$pdo->prepare("SELECT * FROM categorias ORDER BY id");

	$buscarUsu->execute();

	$linha=$buscarUsu->fetchAll(PDO::FETCH_OBJ);

?>

<div class="container theme-showcase" role="main">

    <div class="page-header">
		<h1>Lista de Categorias</h1>
	</div>
	<div class="row">

		<a href='administrativo.php?link=6'><button type='button' class='btn btn-sm btn-info'> Cadastrar Categoria </button></a>

		</br></br>


	    <div class="col-md-12">
	    	<table class="table">
	        	<thead>
	         		<tr>
	            		<th>ID</th>
	            		<th>Nome</th>
	            		
	          		</tr>
	        	</thead>
	        	<tbody>
	        		<?php
	        			foreach ($linha as $listar) {
							echo "<tr>";
								echo "<td>".$listar->id."</td>";
								echo "<td>".$listar->nome."</td>";
								?>
								<td>
									<a href='administrativo.php?link=8&id=<?php echo $listar->id;?>'><button type='button' class='btn btn-sm btn-default'> Editar </button></a>

									<a href='administrativo.php?link=9&id=<?php echo $listar->id;?>'><button type='button' class='btn btn-sm  btn-primary'> Visualizar </button></a>

									<a href='processa/categoria/processa_delete.php?id=<?php echo $listar->id;?>'><button type='button' class='btn btn-sm  btn-danger'> Apagar </button></a>
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
 



