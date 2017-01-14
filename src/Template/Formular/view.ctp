<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Formular'), ['action' => 'edit', $formular->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Formular'), ['action' => 'delete', $formular->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formular->id)]) ?> </li>
<li><?= $this->Html->link(__('List Formular'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Formular'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Screener'), ['controller' => 'Screener', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Screener'), ['controller' => 'Screener', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Formular'), ['action' => 'edit', $formular->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Formular'), ['action' => 'delete', $formular->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formular->id)]) ?> </li>
<li><?= $this->Html->link(__('List Formular'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Formular'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Screener'), ['controller' => 'Screener', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Screener'), ['controller' => 'Screener', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($formular->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($formular->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($formular->id) ?></td>
        </tr>
    </table>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title">Variables</h3>
    </div>
</div>
