<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Uniform $uniform
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Uniform'), ['action' => 'edit', $uniform->_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Uniform'), ['action' => 'delete', $uniform->_id], ['confirm' => __('Are you sure you want to delete # {0}?', $uniform->_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Uniforms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Uniform'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Organisations'), ['controller' => 'Organisations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Organisation'), ['controller' => 'Organisations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pictures'), ['controller' => 'Pictures', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Picture'), ['controller' => 'Pictures', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Variants'), ['controller' => 'Variants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Variant'), ['controller' => 'Variants', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="uniforms view large-9 medium-8 columns content">
    <h3><?= h($uniform->_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Organisation') ?></th>
            <td><?= $uniform->has('organisation') ? $this->Html->link($uniform->organisation->_id, ['controller' => 'Organisations', 'action' => 'view', $uniform->organisation->_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Uniformname') ?></th>
            <td><?= h($uniform->uniformname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($uniform->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Uniformdescription') ?></th>
            <td><?= h($uniform->uniformdescription) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= h($uniform->gender) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Id') ?></th>
            <td><?= $this->Number->format($uniform->_id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Heroimagepath') ?></h4>
        <?= $this->Text->autoParagraph(h($uniform->heroimagepath)); ?>
    </div>
    <div class="row">
        <h4><?= __('Sizechartpath') ?></h4>
        <?= $this->Text->autoParagraph(h($uniform->sizechartpath)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pictures') ?></h4>
        <?php if (!empty($uniform->pictures)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __(' Id') ?></th>
                <th scope="col"><?= __('Uniform Id') ?></th>
                <th scope="col"><?= __('Extraphotopath') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($uniform->pictures as $pictures): ?>
            <tr>
                <td><?= h($pictures->_id) ?></td>
                <td><?= h($pictures->uniform_id) ?></td>
                <td><?= h($pictures->extraphotopath) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Pictures', 'action' => 'view', $pictures->_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Pictures', 'action' => 'edit', $pictures->_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pictures', 'action' => 'delete', $pictures->_id], ['confirm' => __('Are you sure you want to delete # {0}?', $pictures->_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Variants') ?></h4>
        <?php if (!empty($uniform->variants)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __(' Id') ?></th>
                <th scope="col"><?= __('Uniform Id') ?></th>
                <th scope="col"><?= __('Colour') ?></th>
                <th scope="col"><?= __('Size') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($uniform->variants as $variants): ?>
            <tr>
                <td><?= h($variants->_id) ?></td>
                <td><?= h($variants->uniform_id) ?></td>
                <td><?= h($variants->colour) ?></td>
                <td><?= h($variants->size) ?></td>
                <td><?= h($variants->price) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Variants', 'action' => 'view', $variants->_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Variants', 'action' => 'edit', $variants->_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Variants', 'action' => 'delete', $variants->_id], ['confirm' => __('Are you sure you want to delete # {0}?', $variants->_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
