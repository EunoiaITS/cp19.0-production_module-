<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prnf[]|\Cake\Collection\CollectionInterface $prnf
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Prnf'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="prnf index large-9 medium-8 columns content">
    <h3><?= __('Prnf') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('part_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('part_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reason') ?></th>
                <th scope="col"><?= $this->Paginator->sort('document') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('remark') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved2_investigation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved2_reason') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved2_document') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved2_remark') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved3_correction') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved3_reason') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved3_document') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved3_remark') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved4_conclusion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved4_reason') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved4_document') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved4_remark') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prnf as $prnf): ?>
            <tr>
                <td><?= $this->Number->format($prnf->id) ?></td>
                <td><?= h($prnf->date) ?></td>
                <td><?= h($prnf->part_name) ?></td>
                <td><?= h($prnf->part_no) ?></td>
                <td><?= h($prnf->quantity) ?></td>
                <td><?= h($prnf->description) ?></td>
                <td><?= h($prnf->reason) ?></td>
                <td><?= h($prnf->document) ?></td>
                <td><?= h($prnf->created_by) ?></td>
                <td><?= h($prnf->remark) ?></td>
                <td><?= h($prnf->approved_by) ?></td>
                <td><?= h($prnf->approved2_investigation) ?></td>
                <td><?= h($prnf->approved2_reason) ?></td>
                <td><?= h($prnf->approved2_document) ?></td>
                <td><?= h($prnf->approved2_remark) ?></td>
                <td><?= h($prnf->approved3_correction) ?></td>
                <td><?= h($prnf->approved3_reason) ?></td>
                <td><?= h($prnf->approved3_document) ?></td>
                <td><?= h($prnf->approved3_remark) ?></td>
                <td><?= h($prnf->approved4_conclusion) ?></td>
                <td><?= h($prnf->approved4_reason) ?></td>
                <td><?= h($prnf->approved4_document) ?></td>
                <td><?= h($prnf->approved4_remark) ?></td>
                <td><?= h($prnf->created) ?></td>
                <td><?= h($prnf->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $prnf->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $prnf->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $prnf->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prnf->id)]) ?>
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
