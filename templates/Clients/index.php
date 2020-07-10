<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client[]|\Cake\Collection\CollectionInterface $clients
 */
?>

<div id="titulo_home" class="d-flex  flex-wrap justify-content-center">

    <div style="margin-left: 20px;">
        <h3 style="color: white;">Página destinada a gestão de clientes.</h3>
    </div>
</div>
<div class="container">


    <div class="clients index content">
        <!-- <?= $this->Html->link(__('Novo cliente'), ['action' => 'add'], ['class' => 'button float-right']) ?> -->
        <h3><?= __('Clientes') ?></h3>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('id_clients', ['label' => 'ID']) ?></th>
                        <th><?= $this->Paginator->sort('name', ['label' => 'Nome']) ?></th>
                        <th><?= $this->Paginator->sort('email', ['label' => 'E-mail']) ?></th>
                        <th><?= $this->Paginator->sort('password', ['label' => 'Senha']) ?></th>
                        <th><?= $this->Paginator->sort('surname', ['label' => 'Sobrenome']) ?></th>
                        <th><?= $this->Paginator->sort('cpf', ['label' => 'CPF']) ?></th>
                        <th><?= $this->Paginator->sort('cep', ['label' => 'CEP']) ?></th>
                        <th><?= $this->Paginator->sort('rua', ['label' => 'Rua']) ?></th>
                        <th><?= $this->Paginator->sort('bairro', ['label' => 'Bairro']) ?></th>
                        <th><?= $this->Paginator->sort('numero', ['label' => 'Número']) ?></th>
                        <th><?= $this->Paginator->sort('city', ['label' => 'Cidade']) ?></th>
                        <th><?= $this->Paginator->sort('uf', ['label' => 'Estado']) ?></th>
                        <th class="actions"><?= __('Ações') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clients as $client) : ?>
                        <tr>
                            <td><?= $this->Number->format($client->id_clients) ?></td>
                            <td><?= h($client->name) ?></td>
                            <td><?= h($client->email) ?></td>
                            <td><?= h($client->password) ?></td>
                            <td><?= h($client->surname) ?></td>
                            <td><?= h($client->cpf) ?></td>
                            <td><?= h($client->cep) ?></td>
                            <td><?= h($client->rua) ?></td>
                            <td><?= h($client->bairro) ?></td>
                            <td><?= h($client->numero) ?></td>
                            <td><?= h($client->city) ?></td>
                            <td><?= h($client->uf) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Vizualizar'), ['action' => 'view', $client->id_clients]) ?>
                                <!-- <?= $this->Html->link(__('Editar'), ['action' => 'edit', $client->id_clients]) ?> -->
                                <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $client->id_clients], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id_clients)]) ?>
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
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('Próximo') . ' >') ?>
                <?= $this->Paginator->last(__('Último') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registros(s) do total de {{count}}')) ?></p>
        </div>
    </div>
</div>