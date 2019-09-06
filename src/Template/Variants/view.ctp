<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Variant $variant
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Variant'), ['action' => 'edit', $variant->_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Variant'), ['action' => 'delete', $variant->_id], ['confirm' => __('Are you sure you want to delete # {0}?', $variant->_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Variants'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Variant'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Uniforms'), ['controller' => 'Uniforms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Uniform'), ['controller' => 'Uniforms', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="variants view large-9 medium-8 columns content">
    <h3><?= h($variant->_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Uniform') ?></th>
            <td><?= $variant->has('uniform') ? $this->Html->link($variant->uniform->_id, ['controller' => 'Uniforms', 'action' => 'view', $variant->uniform->_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Id') ?></th>
            <td><?= $this->Number->format($variant->_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($variant->price) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Colour') ?></h4>
        <?= $this->Text->autoParagraph(h($variant->colour)); ?>
    </div>
    <div class="row">
        <h4><?= __('Size') ?></h4>
        <?= $this->Text->autoParagraph(h($variant->size)); ?>
    </div>
</div>
