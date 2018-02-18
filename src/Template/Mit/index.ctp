<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mit[]|\Cake\Collection\CollectionInterface $mit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mit'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mit index large-9 medium-8 columns content">
    <h3><?= __('Mit') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('po_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sales_order_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location') ?></th>
                <th scope="col"><?= $this->Paginator->sort('part_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('used_quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requested_quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stock_quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('availability') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('verified_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('acknowledged_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('remark') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mit as $mit): ?>
            <tr>
                <td><?= $this->Number->format($mit->id) ?></td>
                <td><?= h($mit->po_no) ?></td>
                <td><?= h($mit->sales_order_no) ?></td>
                <td><?= h($mit->date) ?></td>
                <td><?= h($mit->location) ?></td>
                <td><?= h($mit->part_no) ?></td>
                <td><?= h($mit->description) ?></td>
                <td><?= h($mit->used_quantity) ?></td>
                <td><?= h($mit->requested_quantity) ?></td>
                <td><?= h($mit->stock_quantity) ?></td>
                <td><?= h($mit->availability) ?></td>
                <td><?= h($mit->status) ?></td>
                <td><?= h($mit->verified_by) ?></td>
                <td><?= h($mit->approved_by) ?></td>
                <td><?= h($mit->acknowledged_by) ?></td>
                <td><?= h($mit->remark) ?></td>
                <td><?= h($mit->created) ?></td>
                <td><?= h($mit->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mit->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mit->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mit->id)]) ?>
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
