<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Wp $wp
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Wp'), ['action' => 'edit', $wp->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Wp'), ['action' => 'delete', $wp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wp->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Wp'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Wp'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="wp view large-9 medium-8 columns content">
    <h3><?= h($wp->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($wp->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('So No') ?></th>
            <td><?= h($wp->so_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Serial No') ?></th>
            <td><?= h($wp->serial_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wld1 On') ?></th>
            <td><?= h($wp->wld1_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wld1 Sn') ?></th>
            <td><?= h($wp->wld1_sn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wld1 Document') ?></th>
            <td><?= h($wp->wld1_document) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mlt On') ?></th>
            <td><?= h($wp->mlt_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mlt Sn') ?></th>
            <td><?= h($wp->mlt_sn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mlt Document') ?></th>
            <td><?= h($wp->mlt_document) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dm On') ?></th>
            <td><?= h($wp->dm_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dm Sn') ?></th>
            <td><?= h($wp->dm_sn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dm Document') ?></th>
            <td><?= h($wp->dm_document) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vc On') ?></th>
            <td><?= h($wp->vc_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vc Sn') ?></th>
            <td><?= h($wp->vc_sn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vc Document') ?></th>
            <td><?= h($wp->vc_document) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wld2 On') ?></th>
            <td><?= h($wp->wld2_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wld2 Sn') ?></th>
            <td><?= h($wp->wld2_sn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wld2 Document') ?></th>
            <td><?= h($wp->wld2_document) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bta On') ?></th>
            <td><?= h($wp->bta_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bta Sn') ?></th>
            <td><?= h($wp->bta_sn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bta Document') ?></th>
            <td><?= h($wp->bta_document) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mc On') ?></th>
            <td><?= h($wp->mc_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mc Sn') ?></th>
            <td><?= h($wp->mc_sn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mc Document') ?></th>
            <td><?= h($wp->mc_document) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wir On') ?></th>
            <td><?= h($wp->wir_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wir Sn') ?></th>
            <td><?= h($wp->wir_sn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wir Document') ?></th>
            <td><?= h($wp->wir_document) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Test On') ?></th>
            <td><?= h($wp->test_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Test Sn') ?></th>
            <td><?= h($wp->test_sn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Test Document') ?></th>
            <td><?= h($wp->test_document) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($wp->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Remark') ?></th>
            <td><?= h($wp->remark) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Acknowledged By') ?></th>
            <td><?= h($wp->acknowledged_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($wp->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($wp->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($wp->modified) ?></td>
        </tr>
    </table>
</div>
