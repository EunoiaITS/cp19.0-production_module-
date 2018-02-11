<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scn[]|\Cake\Collection\CollectionInterface $scn
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Scn'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Scn Items'), ['controller' => 'ScnItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Scn Item'), ['controller' => 'ScnItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="scn index large-9 medium-8 columns content">
    <h3><?= __('Scn') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
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
            <?php foreach ($scn as $scn): ?>
            <tr>
                <td><?= $this->Number->format($scn->id) ?></td>
                <td><?= h($scn->date) ?></td>
                <td><?= h($scn->location) ?></td>
                <td><?= h($scn->created_by) ?></td>
                <td><?= h($scn->remark) ?></td>
                <td><?= h($scn->status) ?></td>
                <td><?= h($scn->verified_by) ?></td>
                <td><?= h($scn->approved_by) ?></td>
                <td><?= h($scn->created) ?></td>
                <td><?= h($scn->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $scn->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $scn->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $scn->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scn->id)]) ?>
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
