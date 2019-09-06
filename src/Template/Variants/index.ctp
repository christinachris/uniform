<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Variant[]|\Cake\Collection\CollectionInterface $variants
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Variant'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Uniforms'), ['controller' => 'Uniforms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Uniform'), ['controller' => 'Uniforms', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="variants index large-9 medium-8 columns content">
    <h3><?= __('Variants') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('uniform_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($variants as $variant): ?>
            <tr>
                <td><?= $this->Number->format($variant->_id) ?></td>
                <td><?= $variant->has('uniform') ? $this->Html->link($variant->uniform->_id, ['controller' => 'Uniforms', 'action' => 'view', $variant->uniform->_id]) : '' ?></td>
                <td><?= $this->Number->format($variant->price) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $variant->_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $variant->_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $variant->_id], ['confirm' => __('Are you sure you want to delete # {0}?', $variant->_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
