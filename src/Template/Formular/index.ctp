<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Formular'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Screener'), ['controller' => 'Screener', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Screener'), ['controller' => 'Screener', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Formular-operators'), ['controller' => 'Formular-operators', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Formular Operator'), ['controller' => 'Formular-operators', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Formular-variables'), ['controller' => 'Formular-variables', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Formular Variable'), ['controller' => 'Formular-variables', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('name'); ?></th>
            <th><?= $this->Paginator->sort('screener_id'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($formular as $formular): ?>
        <tr>
            <td><?= $this->Number->format($formular->id) ?></td>
            <td><?= h($formular->name) ?></td>
            <td>
                <?= $formular->has('screener') ? $this->Html->link($formular->screener->Name, ['controller' => 'Screener', 'action' => 'view', $formular->screener->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $formular->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $formular->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $formular->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formular->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
