<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Organisation $organisation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Organisations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Uniforms'), ['controller' => 'Uniforms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Uniform'), ['controller' => 'Uniforms', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="organisations form large-9 medium-8 columns content">
    <?= $this->Form->create($organisation) ?>
    <fieldset>
        <legend><?= __('Add Organisation') ?></legend>
        <?php
            echo $this->Form->control('organisationname');
            echo $this->Form->control('logopath');
            echo $this->Form->control('accesscode');
            echo $this->Form->control('bypasscode');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
