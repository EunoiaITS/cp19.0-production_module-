<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nbdo[]|\Cake\Collection\CollectionInterface $nbdo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Nbdo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nbdo Items'), ['controller' => 'NbdoItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nbdo Item'), ['controller' => 'NbdoItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="nbdo index large-9 medium-8 columns content">
    <h3><?= __('Nbdo') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cust_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact_person') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact_no') ?></th>
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
            <?php foreach ($nbdo as $nbdo): ?>
            <tr>
                <td><?= $this->Number->format($nbdo->id) ?></td>
                <td><?= h($nbdo->date) ?></td>
                <td><?= h($nbdo->cust_name) ?></td>
                <td><?= h($nbdo->address) ?></td>
                <td><?= h($nbdo->contact_person) ?></td>
                <td><?= h($nbdo->contact_no) ?></td>
                <td><?= h($nbdo->location) ?></td>
                <td><?= h($nbdo->created_by) ?></td>
                <td><?= h($nbdo->remark) ?></td>
                <td><?= h($nbdo->status) ?></td>
                <td><?= h($nbdo->verified_by) ?></td>
                <td><?= h($nbdo->approved_by) ?></td>
                <td><?= h($nbdo->created) ?></td>
                <td><?= h($nbdo->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $nbdo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nbdo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nbdo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nbdo->id)]) ?>
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
