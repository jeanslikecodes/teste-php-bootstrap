<?php 

  session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Página de Login">
    <meta name="author" content="Jean Carlos">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>

  </head>

  <body>
    <?php 

      unset($_SESSION['LoginErro'],
            $_SESSION['usuarioId'],
            $_SESSION['usuarioNome'],
            $_SESSION['usuarioEmail'],
            $_SESSION['usuarioUsername'],
            $_SESSION['usuarioSenha'],
            $_SESSION['usuarioNivel']);
    ?>

    <div class="container">

      <form class="form-signin" method="POST" action="valida_login.php">
        <h2 class="form-signin-heading text-center">Insira seu Login</h2>

        <label for="inputEmail" class="sr-only">Usuário</label>
        <input type="text" name="usuario" class="form-control" placeholder="Digite o Username" required autofocus>

        <br/>

        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" name="senha" class="form-control" placeholder="Digite a senha" required>
      
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>

        <br/>

        
          <?php
            if(isset($_SESSION['LoginErro'])) { ?>
            <p class="text-center text-danger alert alert-danger"/>
          <?php           
              echo $_SESSION['LoginErro'];

              unset($_SESSION['LoginErro']);
            }
          ?>
        

      </form>
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
