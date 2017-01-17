<?php

  $id = $_GET['id'];

  $buscarProd=$pdo->prepare("SELECT * FROM produtos WHERE id=:id LIMIT 1");

  $buscarProd->bindValue(":id", $id);

  $buscarProd->execute();

  $linha=$buscarProd->fetchAll(PDO::FETCH_OBJ);
        
  foreach ($linha as $listar) {
    $id = $listar->id;
    $imagem = $listar->imagem;
  }

?>
<div class="container theme-showcase" role="main">
  <div class="page-header">
  <h1>Visualizar Produto</h1>
</div>
<div class="row">
  <div class="col-md-12">
      <table class="table">

        <thead class="col-md-9">
          <tr>
            <th>Id do produto</th>
            <td>
              <?php echo $listar->id; ?>
            </td>
          </tr>  
          <tr>
            <th>Nome do produto</th>
            <td>
              <?php echo $listar->nome; ?>
            </td>
          </tr>
          <tr>
            <th>Descrição curta</th>
            <td>
              <?php echo $listar->desc_c; ?>
            </td>
          </tr>
          <tr>
            <th>Descrição longa</th>
            <td>
              <?php echo $listar->desc_l; ?>
            </td>
          </tr>
           <tr>
            <th>Preço</th>
            <td>
              <?php echo $listar->preco; ?>
            </td>
          </tr>
          <tr>
            <th>Tag</th>
            <td>
              <?php 
                echo $listar->tag;
              ?>
            </td>
          </tr>
          <tr>
            <th>Description</th>
            <td>
              <?php 
                echo $listar->description;
              ?>
            </td>
          </tr>  


          <tr>
            <th>Imagem do produto</th>
            <td>
              <?php 
                if($listar->imagem = "") {
                  echo "<span class='titulo'>O produto não possui imagem!</span>";
                } else {?>
                  <div class="col-sm-10">
                    <img src="imagens/<?php echo $imagem; ?>" width="100" height="100">
                  </div>

                <?php }
                ?>
            </td>
          </tr> 



          <tr>
            <th>Categoria</th>
            <td>
              <?php 
                $buscarCate=$pdo->prepare("SELECT * FROM categorias WHERE id=:id");

                $buscarCate->bindValue(":id", $listar->categoria_id);

                $buscarCate->execute();

                $linha=$buscarCate->fetchAll(PDO::FETCH_OBJ);
                    
                foreach ($linha as $listarC) {
                  
                  echo $listarC->nome;
                }
              ?>
            </td>
          </tr>
          <tr>
            <th>Situacao</th>
            <td>
              <?php 
                $buscarSitu=$pdo->prepare("SELECT * FROM situacoes WHERE id=:id");

                $buscarSitu->bindValue(":id", $listar->situacao_id);

                $buscarSitu->execute();

                $linha=$buscarSitu->fetchAll(PDO::FETCH_OBJ);
                    
                foreach ($linha as $listarS) {
                  echo $listarS->nome;
                }
              ?>
            </td>
          </tr>  
          <tr>
            <th>Ações</th>
            <td class="pull-right">
              <a href='administrativo.php?link=10'><button type='button' class='btn btn-sm btn-info'> Listar </button></a>

              <a href='administrativo.php?link=13&id=<?php echo $id;?>'><button type='button' class='btn btn-sm  btn-default'> Editar </button></a>

               <a href='processa/produto/processa_delete.php?id=<?php echo $id;?>'><button type='button' class='btn btn-sm  btn-danger'> Apagar </button></a>
            </td>
          </tr>          
        </thead> 
      </table>
  </div>
</div>


