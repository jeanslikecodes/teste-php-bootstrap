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
<div class="container theme-showcase" role="main">
  <div class="page-header">
  <h1>Visualizar Usuário</h1>
</div>
<div class="row">
  <div class="col-md-12">
      <table class="table">
            <thead>
              <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>E-mail</th>
                  <th>Username</th>
                  <th>Nível Acesso</th>
                  <th>Ações</th>
                </tr>
            </thead>
            <tbody>
              <?php
                foreach ($linha as $listar) {
              echo "<tr>";
                echo "<td>".$listar->id."</td>";
                echo "<td>".$listar->nome."</td>";
                echo "<td>".$listar->email."</td>";
                echo "<td>".$listar->username."</td>";
                echo "<td>".$listar->nivel_acesso_id."</td>";
                ?>
                  <td>
                    <a href='administrativo.php?link=2'><button type='button' class='btn btn-sm btn-info'> Listar </button></a>

                    <a href='administrativo.php?link=4&id=<?php echo $listar->id;?>'><button type='button' class='btn btn-sm  btn-default'> Editar </button></a>

                     <a href='processa/processa_delete.php?id=<?php echo $listar->id;?>'><button type='button' class='btn btn-sm  btn-danger'> Apagar </button></a>
                  </td>
                <?php
                  echo "</tr>";
                }
              ?>
            </tbody>
          </table>
  </div>
</div>
      
 



