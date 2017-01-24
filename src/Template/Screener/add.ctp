<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Screener'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Module'), ['controller' => 'Module', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Module'), ['controller' => 'Module', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Screener'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Module'), ['controller' => 'Module', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Module'), ['controller' => 'Module', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($screener); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Screener']) ?></legend>
    <?php
    echo $this->Form->input('Name');
    echo $this->Form->input('module_id', ['options' => $module]);
    echo $this->Form->input('threshold');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
