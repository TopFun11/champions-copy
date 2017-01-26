<?php
$this->layout = 'adminDefault';

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $recordset->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $recordset->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Recordset'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Screener'), ['controller' => 'Screener', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Screener'), ['controller' => 'Screener', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $recordset->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $recordset->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Recordset'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Screener'), ['controller' => 'Screener', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Screener'), ['controller' => 'Screener', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($recordset); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Recordset']) ?></legend>
    <?php
    echo $this->Form->input('screener_id', ['options' => $screener]);
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
