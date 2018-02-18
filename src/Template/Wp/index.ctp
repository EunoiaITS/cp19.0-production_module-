<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Wp[]|\Cake\Collection\CollectionInterface $wp
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Wp'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="wp index large-9 medium-8 columns content">
    <h3><?= __('Wp') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('so_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('serial_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('wld1_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('wld1_sn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('wld1_document') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mlt_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mlt_sn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mlt_document') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dm_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dm_sn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dm_document') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vc_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vc_sn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vc_document') ?></th>
                <th scope="col"><?= $this->Paginator->sort('wld2_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('wld2_sn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('wld2_document') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bta_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bta_sn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bta_document') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mc_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mc_sn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mc_document') ?></th>
                <th scope="col"><?= $this->Paginator->sort('wir_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('wir_sn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('wir_document') ?></th>
                <th scope="col"><?= $this->Paginator->sort('test_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('test_sn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('test_document') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('remark') ?></th>
                <th scope="col"><?= $this->Paginator->sort('acknowledged_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($wp as $wp): ?>
            <tr>
                <td><?= $this->Number->format($wp->id) ?></td>
                <td><?= h($wp->date) ?></td>
                <td><?= h($wp->so_no) ?></td>
                <td><?= h($wp->serial_no) ?></td>
                <td><?= h($wp->wld1_on) ?></td>
                <td><?= h($wp->wld1_sn) ?></td>
                <td><?= h($wp->wld1_document) ?></td>
                <td><?= h($wp->mlt_on) ?></td>
                <td><?= h($wp->mlt_sn) ?></td>
                <td><?= h($wp->mlt_document) ?></td>
                <td><?= h($wp->dm_on) ?></td>
                <td><?= h($wp->dm_sn) ?></td>
                <td><?= h($wp->dm_document) ?></td>
                <td><?= h($wp->vc_on) ?></td>
                <td><?= h($wp->vc_sn) ?></td>
                <td><?= h($wp->vc_document) ?></td>
                <td><?= h($wp->wld2_on) ?></td>
                <td><?= h($wp->wld2_sn) ?></td>
                <td><?= h($wp->wld2_document) ?></td>
                <td><?= h($wp->bta_on) ?></td>
                <td><?= h($wp->bta_sn) ?></td>
                <td><?= h($wp->bta_document) ?></td>
                <td><?= h($wp->mc_on) ?></td>
                <td><?= h($wp->mc_sn) ?></td>
                <td><?= h($wp->mc_document) ?></td>
                <td><?= h($wp->wir_on) ?></td>
                <td><?= h($wp->wir_sn) ?></td>
                <td><?= h($wp->wir_document) ?></td>
                <td><?= h($wp->test_on) ?></td>
                <td><?= h($wp->test_sn) ?></td>
                <td><?= h($wp->test_document) ?></td>
                <td><?= h($wp->status) ?></td>
                <td><?= h($wp->remark) ?></td>
                <td><?= h($wp->acknowledged_by) ?></td>
                <td><?= h($wp->created) ?></td>
                <td><?= h($wp->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $wp->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $wp->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $wp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wp->id)]) ?>
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
