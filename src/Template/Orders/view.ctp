<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Organisations'), ['controller' => 'Organisations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Organisation'), ['controller' => 'Organisations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Variants'), ['controller' => 'Variants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Variant'), ['controller' => 'Variants', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orders view large-9 medium-8 columns content">
    <h3><?= h($order->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $order->has('customer') ? $this->Html->link($order->customer->id, ['controller' => 'Customers', 'action' => 'view', $order->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($order->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Totalprice') ?></th>
            <td><?= $this->Number->format($order->totalprice) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= $this->Number->format($order->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Orderdate') ?></th>
            <td><?= h($order->orderdate) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Recipientname') ?></h4>
        <?= $this->Text->autoParagraph(h($order->recipientname)); ?>
    </div>
    <div class="row">
        <h4><?= __('Address') ?></h4>
        <?= $this->Text->autoParagraph(h($order->address)); ?>
    </div>
    <div class="row">
        <h4><?= __('State') ?></h4>
        <?= $this->Text->autoParagraph(h($order->state)); ?>
    </div>
    <div class="row">
        <h4><?= __('Postcode') ?></h4>
        <?= $this->Text->autoParagraph(h($order->postcode)); ?>
    </div>
    <div class="row">
        <h4><?= __('Paidstatus') ?></h4>
        <?= $this->Text->autoParagraph(h($order->paidstatus)); ?>
    </div>
    <div class="row">
        <h4><?= __('Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($order->comments)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Variants') ?></h4>
        <?php if (!empty($order->variants)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __(' Id') ?></th>
                <th scope="col"><?= __('Uniform Id') ?></th>
                <th scope="col"><?= __('Colour') ?></th>
                <th scope="col"><?= __('Size') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($order->variants as $variants): ?>
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
