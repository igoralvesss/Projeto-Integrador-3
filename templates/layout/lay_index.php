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

$cakeDescription = 'CakePHP: the rapid development php framework';
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
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css">

    <?= $this->Html->css('milligram.min.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>


<body style="background-image: url('webroot/img/fundologin3.jpg'); background-attachment: fixed;">
    <nav class="top-nav">
        <div class="top-nav-title">
        <img href="/projeto/" src="webroot/img/SpeedBurguer.png" alt="Logo SpeedBurguer">
            <!-- <a href="/"><span>Speed</span>Burguer</a> -->
        </div>

        <div class="top-nav-links">
            <a href="/projeto/Products">Produtos</a>
            <a href="/projeto/Orders">Pedidos</a>
            <a href="/projeto/Clients">Clientes</a>
            <a href="/projeto/Users">Usuários</a>
            <a href="/projeto/Users/login">Sair</a>
        </div>
    
    </nav>
    <main class="main">
    <div id="titulo_home" class="d-flex  flex-wrap justify-content-center">

</div>
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
