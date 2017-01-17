<?php

  $id = $_GET['id'];

  $buscarCate=$pdo->prepare("SELECT * FROM categorias WHERE id=:id LIMIT 1");

  $buscarCate->bindValue(":id", $id);

  $buscarCate->execute();

  $linha=$buscarCate->fetchAll(PDO::FETCH_OBJ);
        
  foreach ($linha as $listar) {
    $id = $listar->id;
    $nome = $listar->nome;
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
                  <th>Ações</th>
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
                    <a href='administrativo.php?link=7'><button type='button' class='btn btn-sm btn-info'> Listar </button></a>

                    <a href='administrativo.php?link=8&id=<?php echo $listar->id;?>'><button type='button' class='btn btn-sm  btn-default'> Editar </button></a>

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
      
 



