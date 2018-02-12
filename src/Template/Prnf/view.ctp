<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prnf $prnf
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Prnf'), ['action' => 'edit', $prnf->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Prnf'), ['action' => 'delete', $prnf->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prnf->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Prnf'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prnf'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="prnf view large-9 medium-8 columns content">
    <h3><?= h($prnf->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($prnf->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Part Name') ?></th>
            <td><?= h($prnf->part_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Part No') ?></th>
            <td><?= h($prnf->part_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= h($prnf->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($prnf->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reason') ?></th>
            <td><?= h($prnf->reason) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Document') ?></th>
            <td><?= h($prnf->document) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($prnf->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Remark') ?></th>
            <td><?= h($prnf->remark) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved By') ?></th>
            <td><?= h($prnf->approved_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved2 Investigation') ?></th>
            <td><?= h($prnf->approved2_investigation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved2 Reason') ?></th>
            <td><?= h($prnf->approved2_reason) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved2 Document') ?></th>
            <td><?= h($prnf->approved2_document) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved2 Remark') ?></th>
            <td><?= h($prnf->approved2_remark) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved3 Correction') ?></th>
            <td><?= h($prnf->approved3_correction) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved3 Reason') ?></th>
            <td><?= h($prnf->approved3_reason) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved3 Document') ?></th>
            <td><?= h($prnf->approved3_document) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved3 Remark') ?></th>
            <td><?= h($prnf->approved3_remark) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved4 Conclusion') ?></th>
            <td><?= h($prnf->approved4_conclusion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved4 Reason') ?></th>
            <td><?= h($prnf->approved4_reason) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved4 Document') ?></th>
            <td><?= h($prnf->approved4_document) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved4 Remark') ?></th>
            <td><?= h($prnf->approved4_remark) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($prnf->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($prnf->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($prnf->modified) ?></td>
        </tr>
    </table>
</div>
