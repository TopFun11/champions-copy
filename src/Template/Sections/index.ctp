<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Section'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Module'), ['controller' => 'Module', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Module'), ['controller' => 'Module', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<pre><?php
foreach($sections as $sec){
  echo h($sec) . '<hr />';
}
 ?></pre>
<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('title'); ?></th>
            <th><?= $this->Paginator->sort('content'); ?></th>
            <th><?= $this->Paginator->sort('module_id'); ?></th>
            <th><?= $this->Paginator->sort('section_id'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($sections as $section): ?>
        <tr>
            <td><?= $this->Number->format($section->id) ?></td>
            <td><?= h($section->title) ?></td>
            <td><?= h($section->content) ?></td>
            <td>
                <?= $section->has('module') ? $this->Html->link($section->module->title, ['controller' => 'Module', 'action' => 'view', $section->module->id]) : '' ?>
            </td>
            <td>
                <?= $section->has('section') ? $this->Html->link($section->section->title, ['controller' => 'Sections', 'action' => 'view', $section->section_id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $section->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $section->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $section->id], ['confirm' => __('Are you sure you want to delete # {0}?', $section->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>
