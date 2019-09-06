<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Websitecontent $websitecontent
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Websitecontents'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="websitecontents form large-9 medium-8 columns content">
    <?= $this->Form->create($websitecontent) ?>
    <fieldset>
        <legend><?= __('Add Websitecontent') ?></legend>
        <?php
            echo $this->Form->control('contentname');
            echo $this->Form->control('contentvalue');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
