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
        <h1 class="mt-n5 mb-5 text-muted">Cardápio</h1>
    </div>
</div>


<div id="cardapio_home" class="text-center pt-5 mt-5">
    <div>
        <h1 class="mt-5 null text-muted">Cardápio</h1>
    </div>
    <div>
        <h2 class="text-muted">Confira nossas novidades! </h2>
        <h5 class="text-success">
            <?= $this->Flash->render() ?>
        </h5>
    </div>
</div>



<div class="d-flex justify-content-around p-4 flex-wrap bt-5 mb-5" id="card_home">
    <?php foreach ($products as $product) : ?>
        <div class="card border border-success text-muted col-sm-3 m-2 mt-5" style="min-width: 18rem; max-width:18rem; height: 530px;">
            <!-- <button type="button" class="btn btn-danger  btn-lg"><?= $product->name ?></button> -->

            <div class="card-body d-flex flex-wrap justify-content-center ">
                <img src="webroot/img/produtos/<?= $product->name ?>.png" style="width: 15rem; height: 200px;" class="card-img-top" alt="<?= $product->name ?>">
                <p class="card-text text-center font-weight-bold h4"><?= $product->name ?></p>
                <p class="card-text text-center mt-2"><?= $product->description ?></p>
                <p class="card-text text-center font-weight-bold h5">R$<?= $product->price ?></p>

                <div>
                    <?= $this->Form->create($product, ['method' => 'POST', 'url' => ['controller' => 'Orders', 'action' => 'addItem']]) ?>
                    <?php
                    echo $this->Form->control('id_product', ['type' => 'hidden', 'value' => $product->id]);
                    echo $this->Form->control('quantity', ['label' => 'Quantidade', 'value' => 1,  'class' => 'form-control text-center']);
                    ?>
                    <?= $this->Form->button(__('Comprar'), ['class' => 'btn btn-success btn-lg btn-block mt-2']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>

        </div>
    <?php endforeach; ?>
</div>


<!-- <?php if (!is_null($order)) : ?>
    <div class="row m-5">
        <div class="col-12">
            <H2>Pedidos (Total: R$<?= $total ?>)
        </div>
        <?php
            // if(isset($order->products))
            foreach ($carrinho as $product) : ?>
            <div class="col-sm-4 m-5">
                <div class="card" style="width: 18rem; ">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product->name ?> (Qtd <?= $product->_joinData->quantity ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $product->price ?></h6>
                        <p class="card-text"><?= $product->description ?></p>


                        <?= $this->Form->create(null, ['method' => 'POST', 'url' => ['controller' => 'Orders', 'action' => 'removeItem']]) ?>
                        <?php
                        echo $this->Form->control('id_product', ['type' => 'hidden', 'value' => $product->id]);
                        ?>
                        <?= $this->Form->button(__('Remover'), ['class' => 'btn btn-primary']) ?>
                        <?= $this->Form->end() ?>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <a class="btn btn-danegr" href="/orders/fechar-pedido">Fechar pedido</a>
        </div>
    </div>
<?php endif; ?> -->