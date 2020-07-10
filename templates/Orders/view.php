<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<div class="container">
    <div class="row">
        <aside class="column">
            <div class="side-nav">
                <h4 class="heading"><?= __('Ações') ?></h4>
                <?= $this->Html->link(__('Editar pedido'), ['action' => 'edit', $order->id_orders], ['class' => 'side-nav-item']) ?>
                <?= $this->Form->postLink(__('Excluir pedido'), ['action' => 'delete', $order->id_orders], ['confirm' => __('Você quer mesmo deletar o pedido {0}?', $order->id_orders), 'class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('Lista de pedidos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                <!-- <?= $this->Html->link(__('New Order'), ['action' => 'add'], ['class' => 'side-nav-item']) ?> -->
            </div>
        </aside>
        <div class="column-responsive column-80">
            <div class="orders view content">
                <h3><?= h($order->id_orders) ?></h3>
                <table>
                    <tr>
                        <th><?= __('Status') ?></th>
                        <td><?= h($order->status) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Cliente') ?></th>
                        <td><?= $order->has('client') ? $this->Html->link($order->client->name, ['controller' => 'Clients', 'action' => 'view', $order->client->id_clients]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('ID') ?></th>
                        <td><?= $this->Number->format($order->id_orders) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Total') ?></th>
                        <td><?= $this->Number->format($order->total) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Criado em') ?></th>
                        <td><?= h($order->created_at) ?></td>
                    </tr>
                </table>
                <div class="related">
                    <h4><?= __('Produtos relacionados') ?></h4>
                    <?php if (!empty($order->products)) : ?>
                        <div class="table-responsive">
                            <table>
                                <tr>
                                    <th><?= __('ID Produto') ?></th>
                                    <th><?= __('Nome') ?></th>
                                    <th><?= __('Descrição') ?></th>
                                    <th><?= __('Preço') ?></th>
                                    <th><?= __('Quantidade') ?></th>
                                    <!-- <th class="actions"><?= __('Ações') ?></th> -->
                                </tr>
                                <?php foreach ($order->products as $products) : ?>
                                    <tr>
                                        <td><?= h($products->id_product) ?></td>
                                        <td><?= h($products->name) ?></td>
                                        <td><?= h($products->description) ?></td>
                                        <td><?= h($products->price) ?></td>
                                        <td><?= h($products->_joinData->quantity) ?></td>
                                        <!-- <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $products->id_product]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $products->id_product]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $products->id_product], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id_product)]) ?>
                            </td> -->
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