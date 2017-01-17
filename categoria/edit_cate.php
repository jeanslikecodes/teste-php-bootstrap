<?php

  $id = $_GET['id'];

  $buscarusuario=$pdo->prepare("SELECT * FROM categorias WHERE id=:id LIMIT 1");

  $buscarusuario->bindValue(":id", $id);

  $buscarusuario->execute();

  $linha=$buscarusuario->fetchAll(PDO::FETCH_OBJ);
        
  foreach ($linha as $listar) {
    $id = $listar->id;
    $nome = $listar->nome;
  }

?>

<?php
  include_once("menu_admin.php");
?>

<div class="container theme-showcase" role="main">
  <div class="page-header">
  <h1>Editar Categoria</h1>
</div>
<div class="row">
  <div class="col-md-12">
    <form class="form-horizontal" method="POST" action="processa/categoria/processa_edit.php">

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
        
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nome" placeholder="Informe o nome" value="<?php echo $nome; ?>">
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
      
 



