<?php  
	session_start();

	include_once("seguranca.php");
  include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página administrativa">
    <meta name="author" content="Jean Carlos">
    <link rel="icon" href="../../favicon.ico">

    <title>Administrativo</title>

  
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>

</head>

<body>
  	<?php
  		include_once("menu_admin.php");


      $link = $_GET["link"];

      $pag[1] = "bem_vindo.php";
      $pag[2] = "listar_usuario.php";
      $pag[3] = "cad_usuario.php";
      $pag[4] = "edit_usuario.php";
      $pag[5] = "visual_usuario.php";
      $pag[6] = "categoria/cad_cate.php";
      $pag[7] = "categoria/listar_cate.php";
      $pag[8] = "categoria/edit_cate.php";
      $pag[9] = "categoria/visual_cate.php";
      $pag[10] = "produto/listar_prod.php";
      $pag[11] = "produto/cad_prod.php";      
      $pag[12] = "produto/visual_prod.php";
      $pag[13] = "produto/edit_prod.php";

      if(!empty($link)) {
        if(file_exists($pag[$link])){
          include $pag[$link];
        } else {
          include "bem_vindo.php";
        }
      } else {
        include "bem_vindo.php";
      }
  	?>


   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>

    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>














