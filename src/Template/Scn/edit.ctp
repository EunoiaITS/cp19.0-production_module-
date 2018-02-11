<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scn $scn
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $scn->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $scn->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Scn'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Scn Items'), ['controller' => 'ScnItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Scn Item'), ['controller' => 'ScnItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="scn form large-9 medium-8 columns content">
    <?= $this->Form->create($scn) ?>
    <fieldset>
        <legend><?= __('Edit Scn') ?></legend>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('location');
            echo $this->Form->control('created_by');
            echo $this->Form->control('remark');
            echo $this->Form->control('status');
            echo $this->Form->control('verified_by');
            echo $this->Form->control('approved_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
