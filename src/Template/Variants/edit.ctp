<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Variant $variant
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $variant->_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $variant->_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Variants'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Uniforms'), ['controller' => 'Uniforms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Uniform'), ['controller' => 'Uniforms', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="variants form large-9 medium-8 columns content">
    <?= $this->Form->create($variant) ?>
    <fieldset>
        <legend><?= __('Edit Variant') ?></legend>
        <?php
            echo $this->Form->control('uniform_id', ['options' => $uniforms]);
            echo $this->Form->control('colour');
            echo $this->Form->control('size');
            echo $this->Form->control('price');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
