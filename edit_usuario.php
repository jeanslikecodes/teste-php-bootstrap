<?php

  $id = $_GET['id'];

  $buscarusuario=$pdo->prepare("SELECT * FROM usuarios WHERE id=:id LIMIT 1");

  $buscarusuario->bindValue(":id", $id);

  $buscarusuario->execute();

  $linha=$buscarusuario->fetchAll(PDO::FETCH_OBJ);
        
  foreach ($linha as $listar) {
    $id = $listar->id;
    $nome = $listar->nome;
    $email = $listar->email;
    $username = $listar->username;
    $senha =  $listar->senha;
    $nivel = $listar->nivel_acesso_id;
  }

?>

<?php
  include_once("menu_admin.php");
?>

<div class="container theme-showcase" role="main">
  <div class="page-header">
  <h1>Editar Usuário</h1>
</div>
<div class="row">
  <div class="col-md-12">
    <form class="form-horizontal" method="POST" action="processa/processa_edit.php">

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
        
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nome" placeholder="Informe o nome" value="<?php echo $nome; ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        
        <div class="col-sm-10">
          <input type="email" class="form-control" name="email" placeholder="Informe o E-mail" value="<?php echo $email; ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="username" class="col-sm-2 control-label">Username</label>
        
        <div class="col-sm-10">
          <input type="text" class="form-control" name="username" placeholder="Informe o Username" value="<?php echo $username; ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Senha</label>

        <div class="col-sm-10">
          <input type="password" class="form-control" name="senha" placeholder="Informe a Senha" value="<?php echo $senha; ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Nível de Acesso</label>

        <div class="col-sm-10">
          <select class="form-control" name="nivel_acesso">
            <option value="1"
            <?php
              if($nivel == 1) {
                echo 'selected';
              }
            ?>
            >Administrador</option>
            <option value="2"
            <?php
              if($nivel == 2) {
                echo 'selected';
              }
            ?>
            >Usuário</option>
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
      
 



