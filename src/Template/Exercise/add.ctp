<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Exercise'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Recordset'), ['controller' => 'Recordset', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Recordset'), ['controller' => 'Recordset', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Question'), ['controller' => 'Question', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Question'), ['controller' => 'Question', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Exercise'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Recordset'), ['controller' => 'Recordset', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Recordset'), ['controller' => 'Recordset', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Question'), ['controller' => 'Question', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Question'), ['controller' => 'Question', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($exercise); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Exercise']) ?></legend>
    <?php
    echo $this->Form->input('section_id', ['options' => $sections]);
    echo $this->Form->input('type');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
