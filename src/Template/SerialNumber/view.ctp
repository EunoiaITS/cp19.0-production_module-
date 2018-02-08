<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SerialNumber $serialNumber
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Serial Number'), ['action' => 'edit', $serialNumber->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Serial Number'), ['action' => 'delete', $serialNumber->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serialNumber->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Serial Number'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Serial Number'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="serialNumber view large-9 medium-8 columns content">
    <h3><?= h($serialNumber->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($serialNumber->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Model') ?></th>
            <td><?= h($serialNumber->model) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Version') ?></th>
            <td><?= h($serialNumber->version) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type1') ?></th>
            <td><?= h($serialNumber->type1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type2') ?></th>
            <td><?= h($serialNumber->type2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= h($serialNumber->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($serialNumber->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Department') ?></th>
            <td><?= h($serialNumber->department) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Section') ?></th>
            <td><?= h($serialNumber->section) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Remark') ?></th>
            <td><?= h($serialNumber->remark) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($serialNumber->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Verified By') ?></th>
            <td><?= h($serialNumber->verified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved By') ?></th>
            <td><?= h($serialNumber->approved_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($serialNumber->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($serialNumber->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($serialNumber->modified) ?></td>
        </tr>
    </table>
</div>
