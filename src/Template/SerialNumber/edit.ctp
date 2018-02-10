<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SerialNumber $serialNumber
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $serialNumber->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $serialNumber->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Serial Number'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="serialNumber form large-9 medium-8 columns content">
    <?= $this->Form->create($serialNumber) ?>
    <fieldset>
        <legend><?= __('Edit Serial Number') ?></legend>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('model');
            echo $this->Form->control('version');
            echo $this->Form->control('type1');
            echo $this->Form->control('type2');
            echo $this->Form->control('quantity');
            echo $this->Form->control('created_by');
            echo $this->Form->control('department');
            echo $this->Form->control('section');
            echo $this->Form->control('remark');
            echo $this->Form->control('status');
            echo $this->Form->control('verified_by');
            echo $this->Form->control('approved_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
