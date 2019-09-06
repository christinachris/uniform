<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Orderitem $orderitem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Orderitem'), ['action' => 'edit', $orderitem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Orderitem'), ['action' => 'delete', $orderitem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderitem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Orderitems'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orderitem'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orderitems view large-9 medium-8 columns content">
    <h3><?= h($orderitem->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Order') ?></th>
            <td><?= $orderitem->has('order') ? $this->Html->link($orderitem->order->id, ['controller' => 'Orders', 'action' => 'view', $orderitem->order->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($orderitem->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Orderprice') ?></th>
            <td><?= $this->Number->format($orderitem->orderprice) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Orderquantity') ?></th>
            <td><?= $this->Number->format($orderitem->orderquantity) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Orderuniformname') ?></h4>
        <?= $this->Text->autoParagraph(h($orderitem->orderuniformname)); ?>
    </div>
    <div class="row">
        <h4><?= __('Ordercolour') ?></h4>
        <?= $this->Text->autoParagraph(h($orderitem->ordercolour)); ?>
    </div>
    <div class="row">
        <h4><?= __('Ordersize') ?></h4>
        <?= $this->Text->autoParagraph(h($orderitem->ordersize)); ?>
    </div>
</div>
