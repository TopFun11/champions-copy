<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Section'), ['action' => 'edit', $section->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Section'), ['action' => 'delete', $section->id], ['confirm' => __('Are you sure you want to delete # {0}?', $section->id)]) ?> </li>
<li><?= $this->Html->link(__('List Sections'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Section'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Module'), ['controller' => 'Module', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Module'), ['controller' => 'Module', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Section'), ['action' => 'edit', $section->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Section'), ['action' => 'delete', $section->id], ['confirm' => __('Are you sure you want to delete # {0}?', $section->id)]) ?> </li>
<li><?= $this->Html->link(__('List Sections'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Section'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Module'), ['controller' => 'Module', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Module'), ['controller' => 'Module', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($section->title) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Title') ?></td>
            <td><?= h($section->title) ?></td>
        </tr>
        <tr>
            <td><?= __('Content') ?></td>
            <td><?= h($section->content) ?></td>
        </tr>
        <tr>
            <td><?= __('Module') ?></td>
            <td><?= $section->has('module') ? $this->Html->link($section->module->title, ['controller' => 'Module', 'action' => 'view', $section->module->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($section->id) ?></td>
        </tr>
    </table>
</div>

