<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Wp $wp
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $wp->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $wp->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Wp'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="wp form large-9 medium-8 columns content">
    <?= $this->Form->create($wp) ?>
    <fieldset>
        <legend><?= __('Edit Wp') ?></legend>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('so_no');
            echo $this->Form->control('serial_no');
            echo $this->Form->control('wld1_on');
            echo $this->Form->control('wld1_sn');
            echo $this->Form->control('wld1_document');
            echo $this->Form->control('mlt_on');
            echo $this->Form->control('mlt_sn');
            echo $this->Form->control('mlt_document');
            echo $this->Form->control('dm_on');
            echo $this->Form->control('dm_sn');
            echo $this->Form->control('dm_document');
            echo $this->Form->control('vc_on');
            echo $this->Form->control('vc_sn');
            echo $this->Form->control('vc_document');
            echo $this->Form->control('wld2_on');
            echo $this->Form->control('wld2_sn');
            echo $this->Form->control('wld2_document');
            echo $this->Form->control('bta_on');
            echo $this->Form->control('bta_sn');
            echo $this->Form->control('bta_document');
            echo $this->Form->control('mc_on');
            echo $this->Form->control('mc_sn');
            echo $this->Form->control('mc_document');
            echo $this->Form->control('wir_on');
            echo $this->Form->control('wir_sn');
            echo $this->Form->control('wir_document');
            echo $this->Form->control('test_on');
            echo $this->Form->control('test_sn');
            echo $this->Form->control('test_document');
            echo $this->Form->control('status');
            echo $this->Form->control('remark');
            echo $this->Form->control('acknowledged_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
