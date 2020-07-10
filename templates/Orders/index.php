<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order[]|\Cake\Collection\CollectionInterface $orders
 */
?>
<div id="titulo_home" class="d-flex  flex-wrap justify-content-center">

    <div style="margin-left: 20px;">
        <h3 style="color: white;">Página destinada a gestão de Pedidos.</h3>
    </div>
</div>
<div class="container">
    <div class="orders index content">
        <!-- <?= $this->Html->link(__('Novo Pedido'), ['action' => 'add'], ['class' => 'button float-right']) ?> -->
        <h3><?= __('Pedidos') ?></h3>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('id_orders', ['label' => 'ID']) ?></th>
                        <th><?= $this->Paginator->sort('total', ['label' => 'Total']) ?></th>
                        <th><?= $this->Paginator->sort('created_at', ['label' => 'Criado em']) ?></th>
                        <th><?= $this->Paginator->sort('status', ['label' => 'Status']) ?></th>
                        <th><?= $this->Paginator->sort('client_id', ['label' => 'Cliente ID']) ?></th>
                        <th class="actions"><?= __('Ações') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order) : ?>
                        <tr>
                            <td><?= $this->Number->format($order->id_orders) ?></td>
                            <td><?= $this->Number->format($order->total) ?></td>
                            <td><?= h($order->created_at) ?></td>
                            <td><?= h($order->status) ?></td>
                            <td><?= $order->has('client') ? $this->Html->link($order->client->name, ['controller' => 'Clients', 'action' => 'view', $order->client->id_clients]) : '' ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Vizualizar'), ['action' => 'view', $order->id_orders]) ?>
                                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $order->id_orders]) ?>
                                <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $order->id_orders], ['confirm' => __('Você quer mesmo deletar o pedido {0}?', $order->id_orders)]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="paginator">
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