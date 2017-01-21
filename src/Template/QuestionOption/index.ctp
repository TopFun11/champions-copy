<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Question Option'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Question'), ['controller' => 'Question', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Question'), ['controller' => 'Question', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('description'); ?></th>
            <th><?= $this->Paginator->sort('value'); ?></th>
            <th><?= $this->Paginator->sort('orderNumber'); ?></th>
            <th><?= $this->Paginator->sort('question_id'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($questionOption as $questionOption): ?>
        <tr>
            <td><?= $this->Number->format($questionOption->id) ?></td>
            <td><?= h($questionOption->description) ?></td>
            <td><?= $this->Number->format($questionOption->value) ?></td>
            <td><?= $this->Number->format($questionOption->orderNumber) ?></td>
            <td>
                <?= $questionOption->has('question') ? $this->Html->link($questionOption->question->question, ['controller' => 'Question', 'action' => 'view', $questionOption->question->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $questionOption->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $questionOption->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $questionOption->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionOption->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
