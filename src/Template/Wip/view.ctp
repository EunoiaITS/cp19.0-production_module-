<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Wip $wip
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Wip'), ['action' => 'edit', $wip->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Wip'), ['action' => 'delete', $wip->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wip->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Wip'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Wip'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Wip Section'), ['controller' => 'WipSection', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Wip Section'), ['controller' => 'WipSection', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="wip view large-9 medium-8 columns content">
    <h3><?= h($wip->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($wip->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('So No') ?></th>
            <td><?= h($wip->so_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Serial No') ?></th>
            <td><?= h($wip->serial_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($wip->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($wip->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($wip->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($wip->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Wip Section') ?></h4>
        <?php if (!empty($wip->wip_section)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Wip Id') ?></th>
                <th scope="col"><?= __('Operator Name') ?></th>
                <th scope="col"><?= __('Supervisor Name') ?></th>
                <th scope="col"><?= __('Section') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Remark') ?></th>
                <th scope="col"><?= __('Acknowledged By') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($wip->wip_section as $wipSection): ?>
            <tr>
                <td><?= h($wipSection->id) ?></td>
                <td><?= h($wipSection->wip_id) ?></td>
                <td><?= h($wipSection->operator_name) ?></td>
                <td><?= h($wipSection->supervisor_name) ?></td>
                <td><?= h($wipSection->section) ?></td>
                <td><?= h($wipSection->status) ?></td>
                <td><?= h($wipSection->remark) ?></td>
                <td><?= h($wipSection->acknowledged_by) ?></td>
                <td><?= h($wipSection->created) ?></td>
                <td><?= h($wipSection->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'WipSection', 'action' => 'view', $wipSection->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'WipSection', 'action' => 'edit', $wipSection->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'WipSection', 'action' => 'delete', $wipSection->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wipSection->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
