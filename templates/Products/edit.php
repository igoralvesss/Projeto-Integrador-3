<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Form->postLink(
                __('Deletar'),
                ['action' => 'delete', $product->id_product],
                ['confirm' => __('Você quer mesmo deletar o {0}?', $product->name), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Lista de produtos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="products form content">
            <?= $this->Form->create($product) ?>
            <fieldset>
                <legend><?= __('Edição de Produto') ?></legend>
                <?php
                    echo $this->Form->control('name', ['label'=>'Nome']);
                    echo $this->Form->control('description', ['label'=>'Descrição']);
                    echo $this->Form->control('price', ['label'=>'Preço']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salvar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
