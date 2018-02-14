<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mit $mit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Mit'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mit form large-9 medium-8 columns content">
    <?= $this->Form->create($mit) ?>
    <fieldset>
        <legend><?= __('Add Mit') ?></legend>
        <?php
            echo $this->Form->control('po_no');
            echo $this->Form->control('sales_order_no');
            echo $this->Form->control('date');
            echo $this->Form->control('location');
            echo $this->Form->control('part_no');
            echo $this->Form->control('description');
            echo $this->Form->control('used_quantity');
            echo $this->Form->control('requested_quantity');
            echo $this->Form->control('stock_quantity');
            echo $this->Form->control('availability');
            echo $this->Form->control('status');
            echo $this->Form->control('verified_by');
            echo $this->Form->control('approved_by');
            echo $this->Form->control('acknowledged_by');
            echo $this->Form->control('remark');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
