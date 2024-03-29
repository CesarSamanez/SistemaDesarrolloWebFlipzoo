<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TableUse $tableUse
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tableUse->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tableUse->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Table Uses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tables'), ['controller' => 'Tables', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Table'), ['controller' => 'Tables', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tableUses form large-9 medium-8 columns content">
    <?= $this->Form->create($tableUse) ?>
    <fieldset>
        <legend><?= __('Edit Table Use') ?></legend>
        <?php
            echo $this->Form->control('tables_id', ['options' => $tables]);
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('time');
            echo $this->Form->control('total');
            echo $this->Form->control('initial_date');
            echo $this->Form->control('final_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
