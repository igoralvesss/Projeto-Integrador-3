<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div id="titulo_home" class="d-flex  flex-wrap justify-content-center">

    <div style="margin-left: 20px;">
        <h3 style="color: white;">Página destinada a gestão de usuários.</h3>
    </div>
</div>
<div class="container">

    <div class="users index content">
        <?= $this->Html->link(__('Novo usuário'), ['action' => 'add'], ['class' => 'button float-right']) ?>
        <h3><?= __('Usuários') ?></h3>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('id', ['label' => 'ID']) ?></th>
                        <th><?= $this->Paginator->sort('login', ['label' => 'Login']) ?></th>
                        <th><?= $this->Paginator->sort('password', ['label' => 'Senha']) ?></th>
                        <th class="actions"><?= __('Ações') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $this->Number->format($user->id) ?></td>
                            <td><?= h($user->login) ?></td>
                            <td><?= h($user->password) ?></td>
                            <td class="actions">
                                <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?> -->
                                <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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