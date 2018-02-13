<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inventory[]|\Cake\Collection\CollectionInterface $inventory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Inventory'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="inventory index large-9 medium-8 columns content">
    <h3><?= __('Inventory') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('part_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('part_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('drawing_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('section') ?></th>
                <th scope="col"><?= $this->Paginator->sort('uom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('current_quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zon') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rack_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bin_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('level') ?></th>
                <th scope="col"><?= $this->Paginator->sort('min_stock') ?></th>
                <th scope="col"><?= $this->Paginator->sort('max_stock') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inventory as $inventory): ?>
            <tr>
                <td><?= $this->Number->format($inventory->id) ?></td>
                <td><?= h($inventory->part_no) ?></td>
                <td><?= h($inventory->part_name) ?></td>
                <td><?= h($inventory->drawing_no) ?></td>
                <td><?= h($inventory->section) ?></td>
                <td><?= h($inventory->uom) ?></td>
                <td><?= h($inventory->current_quantity) ?></td>
                <td><?= h($inventory->zon) ?></td>
                <td><?= h($inventory->rack_no) ?></td>
                <td><?= h($inventory->bin_no) ?></td>
                <td><?= h($inventory->level) ?></td>
                <td><?= h($inventory->min_stock) ?></td>
                <td><?= h($inventory->max_stock) ?></td>
                <td><?= h($inventory->created) ?></td>
                <td><?= h($inventory->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $inventory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $inventory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $inventory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inventory->id)]) ?>
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
