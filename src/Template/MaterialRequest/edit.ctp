<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MaterialRequest $materialRequest
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $materialRequest->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $materialRequest->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Material Request'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="materialRequest form large-9 medium-8 columns content">
    <?= $this->Form->create($materialRequest) ?>
    <fieldset>
        <legend><?= __('Edit Material Request') ?></legend>
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
