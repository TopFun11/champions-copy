<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Screener'), ['action' => 'edit', $screener->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Screener'), ['action' => 'delete', $screener->id], ['confirm' => __('Are you sure you want to delete # {0}?', $screener->id)]) ?> </li>
<li><?= $this->Html->link(__('List Screener'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Screener'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Module'), ['controller' => 'Module', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Module'), ['controller' => 'Module', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Screener'), ['action' => 'edit', $screener->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Screener'), ['action' => 'delete', $screener->id], ['confirm' => __('Are you sure you want to delete # {0}?', $screener->id)]) ?> </li>
<li><?= $this->Html->link(__('List Screener'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Screener'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Module'), ['controller' => 'Module', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Module'), ['controller' => 'Module', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($screener->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($screener->Name) ?></td>
        </tr>
        <tr>
            <td><?= __('Module') ?></td>
            <td><?= $screener->has('module') ? $this->Html->link($screener->module->title, ['controller' => 'Module', 'action' => 'view', $screener->module->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($screener->id) ?></td>
        </tr>
        <tr>
            <td>Threshold value</td>
            <td><?= $this->Number->format($screener->threshold)?> </td>
    </table>
</div>
