<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fgtt $fgtt
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fgtt'), ['action' => 'edit', $fgtt->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fgtt'), ['action' => 'delete', $fgtt->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fgtt->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fgtt'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fgtt'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fgtt view large-9 medium-8 columns content">
    <h3><?= h($fgtt->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($fgtt->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('So No') ?></th>
            <td><?= h($fgtt->so_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($fgtt->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($fgtt->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Remark') ?></th>
            <td><?= h($fgtt->remark) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($fgtt->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Verified By') ?></th>
            <td><?= h($fgtt->verified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved By') ?></th>
            <td><?= h($fgtt->approved_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fgtt->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($fgtt->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($fgtt->modified) ?></td>
        </tr>
    </table>
</div>
