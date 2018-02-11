<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nbdo $nbdo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $nbdo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $nbdo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Nbdo'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Nbdo Items'), ['controller' => 'NbdoItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nbdo Item'), ['controller' => 'NbdoItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="nbdo form large-9 medium-8 columns content">
    <?= $this->Form->create($nbdo) ?>
    <fieldset>
        <legend><?= __('Edit Nbdo') ?></legend>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('cust_name');
            echo $this->Form->control('address');
            echo $this->Form->control('contact_person');
            echo $this->Form->control('contact_no');
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
