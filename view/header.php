<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>LeoBarberShop</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="../public/img/favicon.png" rel="icon">
  <link href="../public/img/apple-touch-icon.png" rel="apple-touch-icon">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="../public/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../public/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../public/lib/animate/animate.min.css" rel="stylesheet">
  <link href="../public/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../public/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../public/lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="../public/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../public/css/style.css" rel="stylesheet">


  <!-- calendar -->
  <link href="../public/css/main.min.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Reveal
    Theme URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body id="body">

  

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- <h1><a href="#body" class="scrollto">Leo Barber<span>Shop</span></a></h1>-->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="#body"><img src="../public/img/logo.jpg" alt="" title="" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
        <?php if(!isset($_SESSION["login_usuario"]))
          {
            echo '<li><a href="login.php">Iniciar Sesion</a></li>';
          } 
          else{
            echo '<li><a href="../ajax/usuario.php?op=6">Cerrar Sesion</a></li>';
          }
        ?>
          
          <li><a href="singin.php">Registrarse</a></li>
          
          
          
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  
  <main id="main">

    

  

