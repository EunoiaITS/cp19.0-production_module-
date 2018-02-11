<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MaterialRequest $materialRequest
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Material Request'), ['action' => 'edit', $materialRequest->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Material Request'), ['action' => 'delete', $materialRequest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $materialRequest->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Material Request'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material Request'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="materialRequest view large-9 medium-8 columns content">
    <h3><?= h($materialRequest->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($materialRequest->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($materialRequest->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($materialRequest->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Remark') ?></th>
            <td><?= h($materialRequest->remark) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($materialRequest->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Verified By') ?></th>
            <td><?= h($materialRequest->verified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved By') ?></th>
            <td><?= h($materialRequest->approved_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($materialRequest->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($materialRequest->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($materialRequest->modified) ?></td>
        </tr>
    </table>
</div>
