<?php
$this->layout = 'adminDefault';

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $record->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $record->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Record'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Recordset'), ['controller' => 'Recordset', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Recordset'), ['controller' => 'Recordset', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $record->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $record->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Record'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Recordset'), ['controller' => 'Recordset', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Recordset'), ['controller' => 'Recordset', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($record); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Record']) ?></legend>
    <?php
    echo $this->Form->input('recordset_id', ['options' => $recordset]);
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
