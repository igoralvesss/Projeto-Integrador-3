<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Orders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="orders form content">
            <?= $this->Form->create($order) ?>
            <fieldset>
                <legend><?= __('Add Order') ?></legend>
                <?php
                    // echo $this->Form->control('total');
                    // echo $this->Form->control('created_at');
                    echo $this->Form->control('status');
                    echo $this->Form->control('client_id', ['options' => $clients, 'empty' => true]);
                    echo $this->Form->control('produto', ['label'=>['text'=>'Produto'],'options' => $products]);
                    echo $this->Form->control('quantity', ['type'=>'number']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
