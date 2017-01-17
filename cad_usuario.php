<?php
  include_once("menu_admin.php");
?>

<div class="container theme-showcase" role="main">
  <div class="page-header">
  <h1>Cadastro de Usuários</h1>
</div>
<div class="row">
  <div class="col-md-12">
    <form class="form-horizontal" method="POST" action="processa/processa_cad.php">

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
        
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nome" placeholder="Informe o nome">
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        
        <div class="col-sm-10">
          <input type="email" class="form-control" name="email" placeholder="Informe o E-mail">
        </div>
      </div>

      <div class="form-group">
        <label for="username" class="col-sm-2 control-label">Username</label>
        
        <div class="col-sm-10">
          <input type="text" class="form-control" name="username" placeholder="Informe o Username">
        </div>
      </div>

      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Senha</label>

        <div class="col-sm-10">
          <input type="password" class="form-control" name="senha" placeholder="Informe a Senha">
        </div>
      </div>

      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Nível de Acesso</label>

        <div class="col-sm-10">
          <select class="form-control" name="nivel_acesso">
            <option value="1">Administrador</option>
            <option value="2">Usuário</option>
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
      
 



