<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cart $cart
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cart'), ['action' => 'edit', $cart->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cart'), ['action' => 'delete', $cart->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cart->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Carts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cart'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Variants'), ['controller' => 'Variants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Variant'), ['controller' => 'Variants', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders Variants'), ['controller' => 'OrdersVariants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orders Variant'), ['controller' => 'OrdersVariants', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="carts view large-9 medium-8 columns content">
    <h3><?= h($cart->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Variant') ?></th>
            <td><?= $cart->has('variant') ? $this->Html->link($cart->variant->_id, ['controller' => 'Variants', 'action' => 'view', $cart->variant->_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $cart->has('customer') ? $this->Html->link($cart->customer->id, ['controller' => 'Customers', 'action' => 'view', $cart->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cart->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($cart->quantity) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Orders Variants') ?></h4>
        <?php if (!empty($cart->orders_variants)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Order Id') ?></th>
                <th scope="col"><?= __('Variant Id') ?></th>
                <th scope="col"><?= __('Cart Id') ?></th>
                <th scope="col"><?= __('Orderprice') ?></th>
                <th scope="col"><?= __('Ordercolour') ?></th>
                <th scope="col"><?= __('Ordersize') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cart->orders_variants as $ordersVariants): ?>
            <tr>
                <td><?= h($ordersVariants->id) ?></td>
                <td><?= h($ordersVariants->order_id) ?></td>
                <td><?= h($ordersVariants->variant_id) ?></td>
                <td><?= h($ordersVariants->cart_id) ?></td>
                <td><?= h($ordersVariants->orderprice) ?></td>
                <td><?= h($ordersVariants->ordercolour) ?></td>
                <td><?= h($ordersVariants->ordersize) ?></td>
                <td><?= h($ordersVariants->quantity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OrdersVariants', 'action' => 'view', $ordersVariants->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OrdersVariants', 'action' => 'edit', $ordersVariants->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OrdersVariants', 'action' => 'delete', $ordersVariants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ordersVariants->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
