<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inventory $inventory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $inventory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $inventory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Inventory'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="inventory form large-9 medium-8 columns content">
    <?= $this->Form->create($inventory) ?>
    <fieldset>
        <legend><?= __('Edit Inventory') ?></legend>
        <?php
            echo $this->Form->control('part_no');
            echo $this->Form->control('part_name');
            echo $this->Form->control('drawing_no');
            echo $this->Form->control('section');
            echo $this->Form->control('uom');
            echo $this->Form->control('current_quantity');
            echo $this->Form->control('zon');
            echo $this->Form->control('rack_no');
            echo $this->Form->control('bin_no');
            echo $this->Form->control('level');
            echo $this->Form->control('min_stock');
            echo $this->Form->control('max_stock');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
