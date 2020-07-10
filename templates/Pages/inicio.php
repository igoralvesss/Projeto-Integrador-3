<div id="titulo_home" class="fundo d-flex  flex-wrap justify-content-start pt-4">
    <div class="text-center ml-5 mt-5 "><br><br><br>
    <h5 class="text-success">
            <?= $this->Flash->render() ?>
        </h5>
        <h1 class="p-5 text-muted">Peça já o seu saboroso <br> Hambuguer Gurmet </h1>
        <a href="/projeto/produtos"><button type="button" class="btn btn-danger text-white btn-lg text-center ">Peça agora</button></a>
    </div>

</div>

<div class="d-flex justify-content-center mt-5">
    <h1 class="text-danger">Oferecemos</h1>
</div>


<div class="d-flex justify-content-around p-4  flex-wrap mb-5 " id="card_home">
    <div class="card border border-danger text-muted m-2 mt-5" style="width: 18rem; height: 480px;">
        <img src="./img/combao.png" class="card-img-top" alt="Combo">
        <div class="card-body">
            <h5 class="card-title text-center text-danger">Combos</h5>
            <p class="card-text text-center">Deliciosos combos de hamburgues artesanais que você mesmo pode montar!</p>
        </div>
    </div>
    <div class="card border border-warning text-muted m-2 mt-5" style="width: 18rem; height: 480px;">
        <img src="./img/produtos/X-Bacon Especial.png" class="card-img-top" alt="Hamburguer">
        <div class="card-body">
            <h5 class="card-title text-center text-warning">Hamburguers</h5>
            <p class="card-text text-center">Nossos hambuguers são de total qualidade, carnes e outros ingredientes de primeira!</p>
        </div>
    </div>
    <div class="card border border-success text-muted mt-5" style="width: 18rem;">
        <div class="mt-5">
            <div class="mt-5">
                <img src="./img/latinha.png" class="card-img-top" alt="Bebidas">
            </div>
        </div>
        <div class="card-body mt-4">
            <h5 class="card-title text-center text-success">Bebidas</h5>
            <p class="card-text text-center">Sucos, Drinks, Choop e Cervejas. Temos variedades de bebidas para todos os gostos!</p>
        </div>
    </div>
</div>

<div id="cardapio_home" class="d-flex  justify-content-around flex-wrap justify-content-center mt-n5">
    <div class="text-center mt-n5">
        <div class="mt-n5">
            <img class="diminuir" src="webroot/img/LogoHamburgueria.svg" alt="Logo Hamburgueria">
        </div>

    </div>
    <div class="text-center mt-2">
        <div class="mt-2 mb-5">
            <h1 class="px-5 pt-5 mb-1 text-muted">Confira nosso Cardápio!</h1>
            <h5 class="px-5 text-muted">Os melhores hamburgueres com os melhores acompanhamentos. </h4>
                <a href="/projeto/produtos"><button type="button" class="btn btn-success btn-lg text-center m-4">Cardápio</button></a>

        </div>
    </div>
</div>

<style>

    .diminuir{
        width: 600px; height: 520px;
    }

    @media (max-width: 540px){
  .diminuir{
    height: 320px;
    width: 400px;
    margin-top: 30px;
  }
}
</style>