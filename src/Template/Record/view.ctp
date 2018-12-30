<?php
$this->layout = 'adminDefault';


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Record'), ['action' => 'edit', $record->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Record'), ['action' => 'delete', $record->id], ['confirm' => __('Are you sure you want to delete # {0}?', $record->id)]) ?> </li>
<li><?= $this->Html->link(__('List Record'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Record'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Recordset'), ['controller' => 'Recordset', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Recordset'), ['controller' => 'Recordset', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Record'), ['action' => 'edit', $record->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Record'), ['action' => 'delete', $record->id], ['confirm' => __('Are you sure you want to delete # {0}?', $record->id)]) ?> </li>
<li><?= $this->Html->link(__('List Record'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Record'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Recordset'), ['controller' => 'Recordset', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Recordset'), ['controller' => 'Recordset', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>

<div class="panel panel-default">
  <?= $record ?>
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($record->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Recordset') ?></td>
            <td><?= $record->has('recordset') ? $this->Html->link($record->recordset->id, ['controller' => 'Recordset', 'action' => 'view', $record->recordset->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($record->id) ?></td>
        </tr>
        <tr>
          <td><?= __('Answer') ?></td>
          <td><?= $record->answer?></td>
        </tr>
        <tr>
          <td><?= __('Option') ?></td>
          <td><?= $record->question_option_id?></td>
        </tr>
        <tr>
          <td><?= __('Question') ?></td>
          <td><?= $record->question_id?></td>
        </tr>
    </table>
</div>
