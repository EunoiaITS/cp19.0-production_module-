<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prnf $prnf
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Prnf'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="prnf form large-9 medium-8 columns content">
    <?= $this->Form->create($prnf) ?>
    <fieldset>
        <legend><?= __('Add Prnf') ?></legend>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('part_name');
            echo $this->Form->control('part_no');
            echo $this->Form->control('quantity');
            echo $this->Form->control('description');
            echo $this->Form->control('reason');
            echo $this->Form->control('document');
            echo $this->Form->control('created_by');
            echo $this->Form->control('remark');
            echo $this->Form->control('approved_by');
            echo $this->Form->control('approved2_investigation');
            echo $this->Form->control('approved2_reason');
            echo $this->Form->control('approved2_document');
            echo $this->Form->control('approved2_remark');
            echo $this->Form->control('approved3_correction');
            echo $this->Form->control('approved3_reason');
            echo $this->Form->control('approved3_document');
            echo $this->Form->control('approved3_remark');
            echo $this->Form->control('approved4_conclusion');
            echo $this->Form->control('approved4_reason');
            echo $this->Form->control('approved4_document');
            echo $this->Form->control('approved4_remark');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
