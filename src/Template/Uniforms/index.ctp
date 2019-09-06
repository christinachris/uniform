<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Uniform[]|\Cake\Collection\CollectionInterface $uniforms
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Uniform'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Organisations'), ['controller' => 'Organisations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Organisation'), ['controller' => 'Organisations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pictures'), ['controller' => 'Pictures', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Picture'), ['controller' => 'Pictures', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Variants'), ['controller' => 'Variants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Variant'), ['controller' => 'Variants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="uniforms index large-9 medium-8 columns content">
    <h3><?= __('Uniforms') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('organisation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('uniformname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('uniformdescription') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($uniforms as $uniform): ?>
            <tr>
                <td><?= $this->Number->format($uniform->_id) ?></td>
                <td><?= $uniform->has('organisation') ? $this->Html->link($uniform->organisation->_id, ['controller' => 'Organisations', 'action' => 'view', $uniform->organisation->_id]) : '' ?></td>
                <td><?= h($uniform->uniformname) ?></td>
                <td><?= h($uniform->type) ?></td>
                <td><?= h($uniform->uniformdescription) ?></td>
                <td><?= h($uniform->gender) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $uniform->_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $uniform->_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $uniform->_id], ['confirm' => __('Are you sure you want to delete # {0}?', $uniform->_id)]) ?>
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
