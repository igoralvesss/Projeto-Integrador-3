<style>
    .null {
        display: none;
    }

    @media (max-width: 1200px) {
        .null {
            display: block;
        }
    }

    .dim {
        width: 1800px;
    }

    @media (max-width: 1200px) {
        .dim {
            display: none;
        }
    }
</style>

<div id="titulo_home" class="d-flex flex-wrap justify-content-center">
    <img class="dim" src="webroot/img/imgcardapio.png" alt="cardapio">

    <div class="text-center ml-5 mt-n5">
        <h1 class="mt-n5 mb-5 text-muted">Carrinho</h1>
    </div>
</div>


<div id="cardapio_home" class="text-center pt-5 mt-4">
    <div>
        <h1 class="mt-5 null text-muted">Cardápio</h1>
    </div>
    <div>
    <h5 class="text-success">
            <?= $this->Flash->render() ?>
        </h5>
        <h2 class="text-muted">Confira os produtos que você deseja pedir! </h2>
        <h4 class="text-muted">Ao escolher os produtos, clique em "Fechar pedido" para finalizar. </h4>
    </div>
</div>



<div class="container">
    <div class="r mt-5 d-flex flex-wrap justify-content-around">
        <div class="mt-2">
            <a class="btn btn-success" href="/projeto/produtos">Adicionar produtos</a>
        </div>

        <div class="mt-2">
            <a class="btn btn-success" href="/projeto/orders/fechar-pedido">Fechar pedido</a>
        </div>

        <div class="mt-2">
            <a class="btn btn-danger" href="/projeto/clients/logout">Desconectar</a>
        </div>
    </div><br><br>
    <hr>
    <?php if (!is_null($order)) : ?>
        <div class=" my-5">
            <div class="col-12">
                <h2>Pedidos (Total: R$<?= $total ?>)</h2>
            </div>
            <div class="d-flex flex-wrap justify-content-around">
                <?php foreach ($carrinho as $product) : ?>

                    <div class="mt-5">
                        <div class="card" style="width: 18rem; ">
                            <div class="card-body d-colum flex-wrap">
                                <h5 class="card-title"><?= $product->name ?></h5>
                                <h6 class="card-title">Quantidade: <?= $product->_joinData->quantity ?></h6>
                                <p class="card-subtitle mb-2 text-muted"><?= $product->price ?></p>
                                <p class="card-text"><?= $product->description ?></p>


                                <?= $this->Form->create(null, ['method' => 'POST', 'url' => ['controller' => 'Orders', 'action' => 'removeItem']]) ?>
                                <?php
                                echo $this->Form->control('id_product', ['type' => 'hidden', 'value' => $product->id_product]);
                                ?>
                                <?= $this->Form->button(__('Remover'), ['class' => 'btn btn-danger']) ?>
                                <?= $this->Form->end() ?>

                            </div>
                        </div>
                    </div>


                <?php endforeach; ?>

            </div>
        </div>
    <?php else : ?>

        <div id="cardapio_home" class="text-center pt-5 mt-4">
    <div>
        <h4 class="text-muted">Aqui você pode acompanhar a fila de pedidos e verificar o status do seu próprio pedido!</h4>
    </div>
</div>

        <div class="my-5">
            <a class="my-5 btn btn-success btn-lg btn-block" href="/projeto/aovivo">Acompanhe os pedidos ao vivo</a>
        </div>

    <?php endif; ?>
</div>