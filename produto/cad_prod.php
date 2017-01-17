<?php
  include_once("menu_admin.php");
?>

<div class="container theme-showcase" role="main">
  <div class="page-header">
  <h1>Cadastro de Produtos</h1>
</div>
<div class="row">
  <div class="col-md-12">
    <form class="form-horizontal" method="POST" action="processa/produto/processa_cad.php" enctype="multipart/form-data">

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
        
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nome" placeholder="Informe o nome do produto">
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Descrição Curta</label>
        
        <div class="col-sm-10">
          <textarea class="form-control" rows="3" name="descricao_curta" placeholder="Informe a descrição curta do produto"></textarea>
        </div>
      </div>

      <div class="form-group">
        <label for="descrica_longa" class="col-sm-2 control-label">Descrição Longa</label>
        
        <div class="col-sm-10">
          <textarea class="form-control" rows="5" name="descricao_longa" placeholder="Informe a descrição longa do produto"></textarea>
        </div>
      </div>

      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Preço</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="preco" placeholder="Informe a Preço do produto">
        </div>
      </div>

      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Tag</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="tag" placeholder="Informe a Tag do produto">
        </div>
      </div>

      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Description</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="description" placeholder="Informe a Description do produto">
        </div>
      </div>

      <div class="form-group">
        <label for="exampleInputFile" class="col-sm-2 control-label">Upload de Imagem</label>

        <div class="col-sm-10">
          <input type="file" id="exampleInputFile" name="imagem">
        </div>
      </div>

      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Categorias</label>

        <div class="col-sm-10">
          <select class="form-control" name="categoria_id">
            <option>Selecione</option>

            <?php 
              $buscarCate=$pdo->prepare("SELECT * FROM categorias");

              $buscarCate->execute();

              $linha=$buscarCate->fetchAll(PDO::FETCH_OBJ);
                    
              foreach ($linha as $listar) {
                ?>
                <option value="<?php echo $listar->id;?>"><?php echo $listar->nome;?></option>
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
                    
              foreach ($linha as $listar) {
                ?>
                <option value="<?php echo $listar->id;?>"><?php echo $listar->nome;?></option>
                <?php 
              }
            ?>  
          </select>
        </div>
      </div>

      
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>
      </div>
    </form>
  </div>
</div>
      
 



