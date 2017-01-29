<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
$this->layout = 'adminDefault';

?>
    <li><?= $this->Html->link(__('New Exercise'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Recordset'), ['controller' => 'Recordset', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Recordset'), ['controller' => 'Recordset', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Question'), ['controller' => 'Question', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Question'), ['controller' => 'Question', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('section_id'); ?></th>
            <th><?= $this->Paginator->sort('type'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($exercise as $exercise): ?>
        <tr>
            <td><?= $this->Number->format($exercise->id) ?></td>
            <td>
                <?= $exercise->has('section') ? $this->Html->link($exercise->section->title, ['controller' => 'Sections', 'action' => 'view', $exercise->section->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($exercise->type) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $exercise->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $exercise->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $exercise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exercise->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
