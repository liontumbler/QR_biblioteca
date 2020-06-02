<?php
include 'php/menu.php';
?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="keywords" content="">   
  <meta name="author" content="Edwin Velasquez Jimenez">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" type="image/x-icon" href="logo.ico">
  <title>Portal de Biblioteca || QR Uniminuto</title>

  <?php 
    $menu= new menu();
    $menu->librerias_css_raiz();
  ?>
  
</head>
<body id="instituto">
  
    
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l6">
        <img style="width: 100%; display: block; margin: auto;" src="img/uniminuto.png" alt="No carga la imagen">
      </div>
      <div class="col s12 m12 l6 center">
        <p style="font-size: 0.6em;">Sistema Nacional de Bibliotecas <b>Rafael Garcìa Herraros</b> </p>
      </div>
    </div>
  </div>
  <div>
    <img id="biblioteca" src="img/biblioteca.png" alt="">
  </div>

  <div class="container">
    <div class="row">
      <div class="col s12">
        <div>
        <?php
        include 'php/administrador.php';
        $fqr=new administrador();
        $fqr->formulario_QR();
        ?>
        </div>
      </div>
      <div class="col s12">

        <div class="centrar">
          <img id="mostrar_QR" src="" alt="No carga la imagen">
        </div>
          
      </div>
    </div>
  </div>

  <?php
    $menu->librerias_js_raiz();
  ?>
</body>
</html>

