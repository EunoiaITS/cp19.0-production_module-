<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Wip $wip
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $wip->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $wip->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Wip'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Wip Section'), ['controller' => 'WipSection', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Wip Section'), ['controller' => 'WipSection', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="wip form large-9 medium-8 columns content">
    <?= $this->Form->create($wip) ?>
    <fieldset>
        <legend><?= __('Edit Wip') ?></legend>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('so_no');
            echo $this->Form->control('serial_no');
            echo $this->Form->control('created_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
