<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Websitecontent $websitecontent
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Websitecontent'), ['action' => 'edit', $websitecontent->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Websitecontent'), ['action' => 'delete', $websitecontent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $websitecontent->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Websitecontents'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Websitecontent'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="websitecontents view large-9 medium-8 columns content">
    <h3><?= h($websitecontent->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Contentname') ?></th>
            <td><?= h($websitecontent->contentname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contentvalue') ?></th>
            <td><?= h($websitecontent->contentvalue) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($websitecontent->id) ?></td>
        </tr>
    </table>
</div>
