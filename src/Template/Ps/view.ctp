<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\P $p
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit P'), ['action' => 'edit', $p->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete P'), ['action' => 'delete', $p->id], ['confirm' => __('Are you sure you want to delete # {0}?', $p->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New P'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ps view large-9 medium-8 columns content">
    <h3><?= h($p->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($p->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($p->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total') ?></th>
            <td><?= h($p->total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($p->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Remark') ?></th>
            <td><?= h($p->remark) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($p->id) ?></td>
        </tr>
    </table>
</div>
