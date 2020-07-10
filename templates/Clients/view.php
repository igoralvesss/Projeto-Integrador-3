<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Editar cliente'), ['action' => 'edit', $client->id_clients], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Deletar cliente'), ['action' => 'delete', $client->id_clients], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id_clients), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista de clientes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Novo cliente'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="clients view content">
            <h3><?= h($client->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($client->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('E-mail') ?></th>
                    <td><?= h($client->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Senha') ?></th>
                    <td><?= h($client->password) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sobrenome') ?></th>
                    <td><?= h($client->surname) ?></td>
                </tr>
                <tr>
                    <th><?= __('CPF') ?></th>
                    <td><?= h($client->cpf) ?></td>
                </tr>
                <tr>
                    <th><?= __('CEP') ?></th>
                    <td><?= h($client->cep) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rua') ?></th>
                    <td><?= h($client->rua) ?></td>
                </tr>
                <tr>
                    <th><?= __('Bairro') ?></th>
                    <td><?= h($client->bairro) ?></td>
                </tr>
                <tr>
                    <th><?= __('Número') ?></th>
                    <td><?= h($client->numero) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cidade') ?></th>
                    <td><?= h($client->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estado') ?></th>
                    <td><?= h($client->uf) ?></td>
                </tr>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= $this->Number->format($client->id_clients) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Pedidos relacionados') ?></h4>
                <?php if (!empty($client->orders)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('ID') ?></th>
                            <th><?= __('Total') ?></th>
                            <th><?= __('Criado em') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Client ID') ?></th>
                            <th class="actions"><?= __('Ações') ?></th>
                        </tr>
                        <?php foreach ($client->orders as $orders) : ?>
                        <tr>
                            <td><?= h($orders->id_orders) ?></td>
                            <td><?= h($orders->total) ?></td>
                            <td><?= h($orders->created_at) ?></td>
                            <td><?= h($orders->status) ?></td>
                            <td><?= h($orders->client_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Vizualizar'), ['controller' => 'Orders', 'action' => 'view', $orders->id_orders]) ?>
                                <?= $this->Html->link(__('Editar'), ['controller' => 'Orders', 'action' => 'edit', $orders->id_orders]) ?>
                                <?= $this->Form->postLink(__('Excluir'), ['controller' => 'Orders', 'action' => 'delete', $orders->id_orders], ['confirm' => __('Você quer mesmo deletar o pedido {0}?', $orders->id_orders)]) ?>
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
