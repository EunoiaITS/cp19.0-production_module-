<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Wip[]|\Cake\Collection\CollectionInterface $wip
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Wip'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Wip Section'), ['controller' => 'WipSection', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Wip Section'), ['controller' => 'WipSection', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="wip index large-9 medium-8 columns content">
    <h3><?= __('Wip') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('so_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('serial_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($wip as $wip): ?>
            <tr>
                <td><?= $this->Number->format($wip->id) ?></td>
                <td><?= h($wip->date) ?></td>
                <td><?= h($wip->so_no) ?></td>
                <td><?= h($wip->serial_no) ?></td>
                <td><?= h($wip->created_by) ?></td>
                <td><?= h($wip->created) ?></td>
                <td><?= h($wip->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $wip->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $wip->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $wip->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wip->id)]) ?>
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
