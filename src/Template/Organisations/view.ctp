<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Organisation $organisation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Organisation'), ['action' => 'edit', $organisation->_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Organisation'), ['action' => 'delete', $organisation->_id], ['confirm' => __('Are you sure you want to delete # {0}?', $organisation->_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Organisations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Organisation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Uniforms'), ['controller' => 'Uniforms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Uniform'), ['controller' => 'Uniforms', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="organisations view large-9 medium-8 columns content">
    <h3><?= h($organisation->_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Organisationname') ?></th>
            <td><?= h($organisation->organisationname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Id') ?></th>
            <td><?= $this->Number->format($organisation->_id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Logopath') ?></h4>
        <?= $this->Text->autoParagraph(h($organisation->logopath)); ?>
    </div>
    <div class="row">
        <h4><?= __('Accesscode') ?></h4>
        <?= $this->Text->autoParagraph(h($organisation->accesscode)); ?>
    </div>
    <div class="row">
        <h4><?= __('Bypasscode') ?></h4>
        <?= $this->Text->autoParagraph(h($organisation->bypasscode)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Uniforms') ?></h4>
        <?php if (!empty($organisation->uniforms)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __(' Id') ?></th>
                <th scope="col"><?= __('Organisation Id') ?></th>
                <th scope="col"><?= __('Uniformname') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Uniformdescription') ?></th>
                <th scope="col"><?= __('Gender') ?></th>
                <th scope="col"><?= __('Heroimagepath') ?></th>
                <th scope="col"><?= __('Sizechartpath') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($organisation->uniforms as $uniforms): ?>
            <tr>
                <td><?= h($uniforms->_id) ?></td>
                <td><?= h($uniforms->organisation_id) ?></td>
                <td><?= h($uniforms->uniformname) ?></td>
                <td><?= h($uniforms->type) ?></td>
                <td><?= h($uniforms->uniformdescription) ?></td>
                <td><?= h($uniforms->gender) ?></td>
                <td><?= h($uniforms->heroimagepath) ?></td>
                <td><?= h($uniforms->sizechartpath) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Uniforms', 'action' => 'view', $uniforms->_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Uniforms', 'action' => 'edit', $uniforms->_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Uniforms', 'action' => 'delete', $uniforms->_id], ['confirm' => __('Are you sure you want to delete # {0}?', $uniforms->_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
