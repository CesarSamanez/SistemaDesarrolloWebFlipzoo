<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TableUse $tableUse
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Table Use'), ['action' => 'edit', $tableUse->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Table Use'), ['action' => 'delete', $tableUse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tableUse->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Table Uses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Table Use'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tables'), ['controller' => 'Tables', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Table'), ['controller' => 'Tables', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tableUses view large-9 medium-8 columns content">
    <h3><?= h($tableUse->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Table') ?></th>
            <td><?= $tableUse->has('table') ? $this->Html->link($tableUse->table->id, ['controller' => 'Tables', 'action' => 'view', $tableUse->table->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $tableUse->has('user') ? $this->Html->link($tableUse->user->name, ['controller' => 'Users', 'action' => 'view', $tableUse->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tableUse->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total') ?></th>
            <td><?= $this->Number->format($tableUse->total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Time') ?></th>
            <td><?= h($tableUse->time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Initial Date') ?></th>
            <td><?= h($tableUse->initial_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Final Date') ?></th>
            <td><?= h($tableUse->final_date) ?></td>
        </tr>
    </table>
</div>
