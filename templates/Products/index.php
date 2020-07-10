<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */

use PhpParser\Node\Stmt\Label;

?>

<div id="titulo_home" class="d-flex  flex-wrap justify-content-center">

    <div style="margin-left: 20px;">
        <h3 style="color: white;">Página destinada a gestão de produtos.</h3>
    </div>
</div>
<div class="container">


    <div class="orders index content">


        <?= $this->Html->link(__('Novo Usurio'), ['action' => 'add'], ['class' => 'button float-right']) ?>
        <h3><?= __('Produtos') ?></h3>
        <div class="table-responsive ">
            <table>
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id_product', ['label' => 'ID']) ?></th>
                        <th scope="col"><?= $this->Paginator->sort('name', ['label' => 'Nome']) ?></th>
                        <th scope="col"><?= $this->Paginator->sort('description', ['label' => 'Descrição']) ?></th>
                        <th scope="col"><?= $this->Paginator->sort('price', ['label' => 'Preço']) ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product) : ?>
                        <tr>
                            <td><?= $this->Number->format($product->id_product) ?></td>
                            <td><?= h($product->name) ?></td>
                            <td><?= h($product->description) ?></td>
                            <td><?= $this->Number->format($product->price) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Vizualizar'), ['action' => 'view', $product->id_product]) ?>
                                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $product->id_product]) ?>
                                <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $product->id_product], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id_product)]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="Page navigation example bg-light d-flex flex-wrap justify-content-around mt-n3">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('Primeiro')) ?>
                <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
                <?= $this->Paginator->numbers() ?><br>
                <?= $this->Paginator->next(__('Próximo') . ' >') ?>
                <?= $this->Paginator->last(__('Último') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registros(s) do total de {{count}}')) ?></p>
        </div>
    </div>
</div>