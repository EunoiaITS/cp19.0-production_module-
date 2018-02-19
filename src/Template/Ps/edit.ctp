<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ps $p
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $p->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $p->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ps'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ps form large-9 medium-8 columns content">
    <?= $this->Form->create($p) ?>
    <fieldset>
        <legend><?= __('Edit P') ?></legend>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('created_by');
            echo $this->Form->control('total');
            echo $this->Form->control('status');
            echo $this->Form->control('remark');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
