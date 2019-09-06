<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Orderitem[]|\Cake\Collection\CollectionInterface $orderitems
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Orderitem'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orderitems index large-9 medium-8 columns content">
    <h3><?= __('Orderitems') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('orderprice') ?></th>
                <th scope="col"><?= $this->Paginator->sort('orderquantity') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderitems as $orderitem): ?>
            <tr>
                <td><?= $this->Number->format($orderitem->id) ?></td>
                <td><?= $orderitem->has('order') ? $this->Html->link($orderitem->order->id, ['controller' => 'Orders', 'action' => 'view', $orderitem->order->id]) : '' ?></td>
                <td><?= $this->Number->format($orderitem->orderprice) ?></td>
                <td><?= $this->Number->format($orderitem->orderquantity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $orderitem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orderitem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orderitem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderitem->id)]) ?>
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
