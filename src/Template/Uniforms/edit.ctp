<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Uniform $uniform
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $uniform->_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $uniform->_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Uniforms'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Organisations'), ['controller' => 'Organisations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Organisation'), ['controller' => 'Organisations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pictures'), ['controller' => 'Pictures', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Picture'), ['controller' => 'Pictures', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Variants'), ['controller' => 'Variants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Variant'), ['controller' => 'Variants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="uniforms form large-9 medium-8 columns content">
    <?= $this->Form->create($uniform) ?>
    <fieldset>
        <legend><?= __('Edit Uniform') ?></legend>
        <?php
            echo $this->Form->control('organisation_id', ['options' => $organisations, 'empty' => true]);
            echo $this->Form->control('uniformname');
            echo $this->Form->control('type');
            echo $this->Form->control('uniformdescription');
            echo $this->Form->control('gender');
            echo $this->Form->control('heroimagepath');
            echo $this->Form->control('sizechartpath');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
