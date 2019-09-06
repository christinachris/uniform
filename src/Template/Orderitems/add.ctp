<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Orderitem $orderitem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Orderitems'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orderitems form large-9 medium-8 columns content">
    <?= $this->Form->create($orderitem) ?>
    <fieldset>
        <legend><?= __('Add Orderitem') ?></legend>
        <?php
            echo $this->Form->control('order_id', ['options' => $orders]);
            echo $this->Form->control('orderuniformname');
            echo $this->Form->control('orderprice');
            echo $this->Form->control('ordercolour');
            echo $this->Form->control('ordersize');
            echo $this->Form->control('orderquantity');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
