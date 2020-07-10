<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Form->postLink(
                __('Excluir'),
                ['action' => 'delete', $order->id_orders],
                ['confirm' => __('Voc~e quer mesmo excluir o pedido {0}?', $order->id_orders), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Lista de pedidos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="orders form content">
            <?= $this->Form->create($order) ?>
            <fieldset>
                <legend><?= __('Edição de pedido') ?></legend>
                <h5>Apenas defina o status do pedido que está sendo acompanhado pelo cliente.</h5>
                <h6>Por padrão: PENDENTE - SENDO FEITO - SENDO ENTREGUE</h6>
                <?php
                    // echo $this->Form->control('total');
                    // echo $this->Form->control('created_at');
                    echo $this->Form->control('status');
                    // echo $this->Form->control('client_id', ['options' => $clients]);
                    // echo $this->Form->control('products._ids', ['options' => $products]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salvar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
