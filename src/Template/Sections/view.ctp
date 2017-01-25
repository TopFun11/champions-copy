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
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h("Subsections") ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Title') ?></th>
            <th><?= __('Actions') ?></th>
        </tr>
        <?php foreach($section->sections as $section): ?>
          <tr>
              <td><?= $this->Number->format($section->id) ?></td>
              <td><?= h($section->title) ?></td>
              <td><?= h($section->content) ?></td>
              <td>
                  <?= $section->has('module') ? $this->Html->link($section->module->title, ['controller' => 'Module', 'action' => 'view', $section->module->id]) : '' ?>
              </td>
              <td class="actions">
                  <?= $this->Html->link('', ['action' => 'view', $section->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                  <?= $this->Html->link('', ['action' => 'edit', $section->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                  <?= $this->Form->postLink('', ['action' => 'delete', $section->id], ['confirm' => __('Are you sure you want to delete # {0}?', $section->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
              </td>
          </tr>
        <?php endforeach;?>
    </table>
</div>
