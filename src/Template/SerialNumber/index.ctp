<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SerialNumber[]|\Cake\Collection\CollectionInterface $serialNumber
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Serial Number'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="serialNumber index large-9 medium-8 columns content">
    <h3><?= __('Serial Number') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('model') ?></th>
                <th scope="col"><?= $this->Paginator->sort('version') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('department') ?></th>
                <th scope="col"><?= $this->Paginator->sort('section') ?></th>
                <th scope="col"><?= $this->Paginator->sort('remark') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('verified_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($serialNumber as $serialNumber): ?>
            <tr>
                <td><?= $this->Number->format($serialNumber->id) ?></td>
                <td><?= h($serialNumber->date) ?></td>
                <td><?= h($serialNumber->model) ?></td>
                <td><?= h($serialNumber->version) ?></td>
                <td><?= h($serialNumber->type1) ?></td>
                <td><?= h($serialNumber->type2) ?></td>
                <td><?= h($serialNumber->quantity) ?></td>
                <td><?= h($serialNumber->created_by) ?></td>
                <td><?= h($serialNumber->department) ?></td>
                <td><?= h($serialNumber->section) ?></td>
                <td><?= h($serialNumber->remark) ?></td>
                <td><?= h($serialNumber->status) ?></td>
                <td><?= h($serialNumber->verified_by) ?></td>
                <td><?= h($serialNumber->approved_by) ?></td>
                <td><?= h($serialNumber->created) ?></td>
                <td><?= h($serialNumber->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $serialNumber->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $serialNumber->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $serialNumber->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serialNumber->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
