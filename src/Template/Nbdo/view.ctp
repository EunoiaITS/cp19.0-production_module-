<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nbdo $nbdo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Nbdo'), ['action' => 'edit', $nbdo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Nbdo'), ['action' => 'delete', $nbdo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nbdo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Nbdo'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nbdo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Nbdo Items'), ['controller' => 'NbdoItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nbdo Item'), ['controller' => 'NbdoItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="nbdo view large-9 medium-8 columns content">
    <h3><?= h($nbdo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($nbdo->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cust Name') ?></th>
            <td><?= h($nbdo->cust_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($nbdo->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact Person') ?></th>
            <td><?= h($nbdo->contact_person) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact No') ?></th>
            <td><?= h($nbdo->contact_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($nbdo->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($nbdo->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Remark') ?></th>
            <td><?= h($nbdo->remark) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($nbdo->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Verified By') ?></th>
            <td><?= h($nbdo->verified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved By') ?></th>
            <td><?= h($nbdo->approved_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($nbdo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($nbdo->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($nbdo->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Nbdo Items') ?></h4>
        <?php if (!empty($nbdo->nbdo_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nbdo Id') ?></th>
                <th scope="col"><?= __('Part No') ?></th>
                <th scope="col"><?= __('Part Desc') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Document') ?></th>
                <th scope="col"><?= __('Remark') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($nbdo->nbdo_items as $nbdoItems): ?>
            <tr>
                <td><?= h($nbdoItems->id) ?></td>
                <td><?= h($nbdoItems->nbdo_id) ?></td>
                <td><?= h($nbdoItems->part_no) ?></td>
                <td><?= h($nbdoItems->part_desc) ?></td>
                <td><?= h($nbdoItems->quantity) ?></td>
                <td><?= h($nbdoItems->document) ?></td>
                <td><?= h($nbdoItems->remark) ?></td>
                <td><?= h($nbdoItems->created) ?></td>
                <td><?= h($nbdoItems->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'NbdoItems', 'action' => 'view', $nbdoItems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'NbdoItems', 'action' => 'edit', $nbdoItems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'NbdoItems', 'action' => 'delete', $nbdoItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nbdoItems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
