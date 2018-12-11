<?php
$this->layout = 'adminDefault';


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Recordset'), ['action' => 'edit', $recordset->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Recordset'), ['action' => 'delete', $recordset->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recordset->id)]) ?> </li>
<li><?= $this->Html->link(__('List Recordset'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Recordset'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Screener'), ['controller' => 'Screener', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Screener'), ['controller' => 'Screener', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Recordset'), ['action' => 'edit', $recordset->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Recordset'), ['action' => 'delete', $recordset->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recordset->id)]) ?> </li>
<li><?= $this->Html->link(__('List Recordset'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Recordset'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Screener'), ['controller' => 'Screener', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Screener'), ['controller' => 'Screener', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $recordset ?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($recordset->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Screener') ?></td>
            <td><?= $recordset->has('screener') ? $this->Html->link($recordset->screener->Name, ['controller' => 'Screener', 'action' => 'view', $recordset->screener->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($recordset->id) ?></td>
        </tr>
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $recordset->has('user') ? $this->Html->link($recordset->user->username, ['controller' => 'user', 'action' => 'view', $recordset->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Screener Score') ?></td>
            <td><?= $recordset->has('screener') ? $recordset->screener->formular->calculate($recordset->record) : '' ?></td>
        </tr>
    </table>
    <?php foreach($recordset->Record as $record){
    echo $record;
} ?>
</div>
