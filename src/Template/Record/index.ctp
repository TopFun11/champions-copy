<?php
/* @var $this \Cake\View\View */
$this->layout = 'adminDefault';;
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Record'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Recordset'), ['controller' => 'Recordset', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Recordset'), ['controller' => 'Recordset', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('recordset_id'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($record as $record): ?>
        <tr>
            <td><?= $this->Number->format($record->id) ?></td>
            <td>
                <?= $record->has('recordset') ? $this->Html->link($record->recordset->id, ['controller' => 'Recordset', 'action' => 'view', $record->recordset->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $record->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $record->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $record->id], ['confirm' => __('Are you sure you want to delete # {0}?', $record->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
