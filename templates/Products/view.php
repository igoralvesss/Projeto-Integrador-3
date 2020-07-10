<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>

<div class="container">
    <div class="row">
        <aside class="column">
            <div class="side-nav mt-5 d-flx flex-wrap justify-content-center">
                <h4 class="heading"><?= __('Ações') ?></h4>
                <?= $this->Html->link(__('Editar Produto'), ['action' => 'edit', $product->id_product], ['class' => 'side-nav-item']) ?>
                <?= $this->Form->postLink(__('Deletar Produto'), ['action' => 'delete', $product->id_product], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id_product), 'class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('Lista de Produtos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('Novo Produto'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            </div>
        </aside>
        <div class="column-responsive column-80">
            <div class="products view content">
                <div class="bg-dark mt-5 px-3 py-3">
                    <h3 class="text-light"><?= h($product->name) ?></h3>
                </div>

                <table class="table table-dark">
                    <tr>
                        <th><?= __('Nome') ?></th>
                        <td><?= h($product->name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Descrição') ?></th>
                        <td><?= h($product->description) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('ID') ?></th>
                        <td><?= $this->Number->format($product->id_product) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Preço') ?></th>
                        <td><?= $this->Number->format($product->price) ?></td>
                    </tr>
                </table>
                <div class="related">
                    <h4><?= __('Pedidos relacionados') ?></h4>
                    <?php if (!empty($product->orders)) : ?>
                        <div class="table-responsive">
                            <table>
                                <tr>
                                    <th><?= __('ID Pedido') ?></th>
                                    <th><?= __('Total') ?></th>
                                    <th><?= __('Criado em') ?></th>
                                    <th><?= __('Status') ?></th>
                                    <th><?= __('ID Cliente') ?></th>
                                    <th class="actions"><?= __('Ações') ?></th>
                                </tr>
                                <?php foreach ($product->orders as $orders) : ?>
                                    <tr>
                                        <td><?= h($orders->id_orders) ?></td>
                                        <td><?= h($orders->total) ?></td>
                                        <td><?= h($orders->created_at) ?></td>
                                        <td><?= h($orders->status) ?></td>
                                        <td><?= h($orders->client_id) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link(__('Vizualizar'), ['controller' => 'Orders', 'action' => 'view', $orders->id_orders]) ?>
                                            <?= $this->Html->link(__('Editar'), ['controller' => 'Orders', 'action' => 'edit', $orders->id_orders]) ?>
                                            <?= $this->Form->postLink(__('Excluir'), ['controller' => 'Orders', 'action' => 'delete', $orders->id_orders], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id_orders)]) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>