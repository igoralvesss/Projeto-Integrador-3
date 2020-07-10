<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'Site Hamburgueria';
?>
<!DOCTYPE html>
<html>

<head>
  <?= $this->Html->charset() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?= $cakeDescription ?>:
    <?= $this->fetch('title') ?>
  </title>

  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900">
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="webroot/css/one-page-wonder.min.css" rel="stylesheet">
  <link rel="stylesheet" href="webroot/css/inicio.css">
  <link rel="stylesheet" href="webroot/css/footer.css">

  <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <!--Custom styles-->
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<style>
  /* *{
    font-family: 'Quicksand', sans-serif;
  } */

  .body {
    background-color: white;
  }

  .alt {
    transition: transform 1s;
    transform: translateX(0) scale(1);
  }

  .alt:hover {
    transform: scale(1.2);
  }
</style>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
      <img href="/projeto/" src="webroot/img/SpeedBurguer.png" alt="Logo SpeedBurguer">
      <a class="navbar-brand" href="/projeto/">Speed Burguer</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item pr-3">
            <a class="nav-link alt" href="/projeto/Products">Produtos</a>
          </li>
          <li class="nav-item pr-3">
            <a class="nav-link alt" href="/projeto/Orders">Pedidos</a>
          </li>
          <li class="nav-item pr-3">
            <a class="nav-link alt" href="/projeto/Clients">Clientes</a>
          </li>
          <li class="nav-item pr-3">
            <a class="nav-link alt" href="/projeto/Users">Usuários</a>
          </li>
          <li class="nav-item pr-3">
            <a class="nav-link alt" href="/projeto/Users/login">Sair</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <?= $this->Flash->render() ?>
  <?= $this->fetch('content') ?>

  <!-- Footer -->
  <footer class="page-footer font-small special-color-dark bg-dark">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3 text-white">© 2020 Copyright:
      SpeedBurguer
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>