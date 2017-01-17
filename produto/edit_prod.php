<?php

  $id = $_GET['id'];

  $buscarProd=$pdo->prepare("SELECT * FROM produtos WHERE id=:id LIMIT 1");

  $buscarProd->bindValue(":id", $id);

  $buscarProd->execute();

  $linha=$buscarProd->fetchAll(PDO::FETCH_OBJ);
        
  foreach ($linha as $listarP) {
    $id = $listarP->id;
    $nome = $listarP->nome;
    $desc_c = $listarP->descricao_curta;
    $desc_l = $listarP->descricao_longa;
    $preco =  $listarP->preco;
    $tag = $listarP->tag;
    $description = $listarP->description;
    $imagem = $listarP->imagem;
    $categoria_id = $listarP->categoria_id;
    $situacao_id = $listarP->situacao_id;
  }

?>

<?php
  include_once("menu_admin.php");
?>

<div class="container theme-showcase" role="main">
  <div class="page-header">
  <h1>Editar Produto</h1>
  
</div>
<div class="row">
  <div class="col-md-12">
    <form class="form-horizontal" method="POST" action="processa/produto/processa_edit.php" enctype="multipart/form-data">

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
        
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nome" placeholder="Informe o nome" value="<?php echo $nome; ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Descrição Curta</label>
        
        <div class="col-sm-10">
          <textarea class="form-control" rows="3" name="descricao_curta" placeholder="Informe a descrição curta do produto"><?php echo $listarP->desc_c; ?></textarea>
        </div>
      </div>

      <div class="form-group">
        <label for="descrica_longa" class="col-sm-2 control-label">Descrição Longa</label>
        
        <div class="col-sm-10">
          <textarea class="form-control" rows="5" name="descricao_longa" placeholder="Informe a descrição longa do produto"><?php echo $listarP->desc_l; ?></textarea>
        </div>
      </div>

      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Preço</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="preco" placeholder="Informe a Preço do produto" value="<?php echo $preco; ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Tag</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="tag" placeholder="Informe a Tag do produto" value="<?php echo $tag; ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Description</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="description" placeholder="Informe a Description do produto" value="<?php echo $description; ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="exampleInputFile" class="col-sm-2 control-label">Upload de Imagem</label>

        <div class="col-sm-10">
          <input type="file" id="exampleInputFile" name="imagem">
        </div>
      </div>

      <?php 
      if($imagem = "") {
        echo "<span class='titulo'>O produto não possui imagem!</span>";
      } else {?>
        <label for="exampleInputFile" class="col-sm-2 control-label">Imagem do produto (Atual)</label>

        <div class="col-sm-10">
          <img src="<?php echo "imagens/$listarP->imagem"; ?>" width="100" height="100">
          <input type="hidden" name="img_antiga" value='<?php echo $imagem; ?>''>
        </div>

      <?php }
      ?>


      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Categorias</label>

        <div class="col-sm-10">
          <select class="form-control" name="categoria_id">
            <option>Selecione</option>

            <?php 
              $buscarCate=$pdo->prepare("SELECT * FROM categorias");

              $buscarCate->execute();

              $linha=$buscarCate->fetchAll(PDO::FETCH_OBJ);
                    
              foreach ($linha as $listarC) {
                ?>
                <option value="<?php echo $listarC->id;?>"
                <?php if ($listarC->id == $categoria_id) {
                  echo 'selected';
                } ?>

                ><?php echo $listarC->nome;?></option>
                <?php 
              }
            ?>  
          </select>
        </div>
      </div>


      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Situação</label>

        <div class="col-sm-10">
          <select class="form-control" name="situacao_id">
            <option>Selecione</option>

            <?php 
              $buscarSitua=$pdo->prepare("SELECT * FROM situacoes");

              $buscarSitua->execute();

              $linha=$buscarSitua->fetchAll(PDO::FETCH_OBJ);
                    
              foreach ($linha as $listarS) {
                ?>
                <option value="<?php echo $listarS->id;?>"
                <?php if ($listarS->id == $situacao_id) {
                  echo 'selected';
                } ?>

                ><?php echo $listarS->nome;?></option>
                <?php 
              }
            ?>  
          </select>
        </div>
      </div>

      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success">Editar</button>
        </div>
      </div>
    </form>
  </div>
</div>
      
 



