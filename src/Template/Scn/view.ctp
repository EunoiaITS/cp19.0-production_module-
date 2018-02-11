<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scn $scn
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Scn'), ['action' => 'edit', $scn->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Scn'), ['action' => 'delete', $scn->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scn->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Scn'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Scn'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Scn Items'), ['controller' => 'ScnItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Scn Item'), ['controller' => 'ScnItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="scn view large-9 medium-8 columns content">
    <h3><?= h($scn->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($scn->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($scn->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($scn->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Remark') ?></th>
            <td><?= h($scn->remark) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($scn->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Verified By') ?></th>
            <td><?= h($scn->verified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved By') ?></th>
            <td><?= h($scn->approved_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($scn->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($scn->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($scn->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Scn Items') ?></h4>
        <?php if (!empty($scn->scn_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Scn Id') ?></th>
                <th scope="col"><?= __('Part No') ?></th>
                <th scope="col"><?= __('Part Desc') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Reason') ?></th>
                <th scope="col"><?= __('Remark') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($scn->scn_items as $scnItems): ?>
            <tr>
                <td><?= h($scnItems->id) ?></td>
                <td><?= h($scnItems->scn_id) ?></td>
                <td><?= h($scnItems->part_no) ?></td>
                <td><?= h($scnItems->part_desc) ?></td>
                <td><?= h($scnItems->quantity) ?></td>
                <td><?= h($scnItems->reason) ?></td>
                <td><?= h($scnItems->remark) ?></td>
                <td><?= h($scnItems->created) ?></td>
                <td><?= h($scnItems->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ScnItems', 'action' => 'view', $scnItems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ScnItems', 'action' => 'edit', $scnItems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ScnItems', 'action' => 'delete', $scnItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scnItems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
