<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit File'), ['action' => 'edit', $file->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete File'), ['action' => 'delete', $file->id], ['confirm' => __('Are you sure you want to delete # {0}?', $file->id)]) ?> </li>
<li><?= $this->Html->link(__('List Files'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New File'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Module'), ['controller' => 'Module', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Module'), ['controller' => 'Module', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit File'), ['action' => 'edit', $file->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete File'), ['action' => 'delete', $file->id], ['confirm' => __('Are you sure you want to delete # {0}?', $file->id)]) ?> </li>
<li><?= $this->Html->link(__('List Files'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New File'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Module'), ['controller' => 'Module', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Module'), ['controller' => 'Module', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($file->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($file->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Path') ?></td>
            <td><?= h($file->path) ?></td>
        </tr>
        <tr>
            <td><?= __('Module') ?></td>
            <td><?= $file->has('module') ? $this->Html->link($file->module->title, ['controller' => 'Module', 'action' => 'view', $file->module->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($file->id) ?></td>
        </tr>
    </table>
</div>

