<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo SITENAME?></title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo URLROOT?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo URLROOT?>css/business-casual.min.css" rel="stylesheet">

</head>

<body>

  <h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-upper text-primary mb-3">Ma boutique en ligne</span>
    <span class="site-heading-lower"> Test formation php</span>
  </h1>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
      <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item active px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="<?= URLROOT?>">Accueil
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="about.html">A propos de</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="products.h">Produits</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="<?= URLROOT?>/products">Magasin</a>
          </li>
          <?php if(isset($_SESSION['user_id'])) : ?>
            <li class="nav-item px-lg-4">
                <a href="<?= URLROOT?>users/logout" class="nav-link text-uppercase text-expanded">Déconnexion</a>
            </li>
            <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role']== 1): ?>
              <li class="nav-item px-lg-4">
                  <a href="<?= URLROOT?>admin" class="nav-link text-uppercase text-expanded">Administration</a>
              </li>
            <?php endif;?>
          <?php else: ?>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="<?= URLROOT?>users/register">S'enregistrer</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="<?= URLROOT?>users/login">Se connecter</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

