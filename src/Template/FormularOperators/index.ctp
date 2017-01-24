<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Formular Operator'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Formular'), ['controller' => 'Formular', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Formular'), ['controller' => 'Formular', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('orderNumber'); ?></th>
            <th><?= $this->Paginator->sort('formular_id'); ?></th>
            <th><?= $this->Paginator->sort('operator'); ?></th>
            <th><?= $this->Paginator->sort('orderNumber'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($formularOperators as $formularOperator): ?>
        <tr>
            <td><?= $this->Number->format($formularOperator->id) ?></td>
            <td><?= $this->Number->format($formularOperator->orderNumber) ?></td>
            <td>
                <?= $formularOperator->has('formular') ? $this->Html->link($formularOperator->formular->name, ['controller' => 'Formular', 'action' => 'view', $formularOperator->formular->id]) : '' ?>
            </td>
            <td>
            <?php
            $upStyle = "";
            $downStyle = "";
            if ($this->Number->format($formularOperator->orderNumber) == 0){
                $upStyle = "disabled";
            }
            if ($this->Number->format($formularOperator->orderNumber) >= count($formularOperators) - 1){
                $downStyle = "disabled";
            }

             ?>
            <?= $this->Html->link('', ['action' => 'moveup', $formularOperator->id], ['title' => __('Up'), 'class' => 'btn btn-default glyphicon glyphicon-arrow-up ' . $upStyle])?>
            <?= $this->Html->link('', ['action' => 'movedown', $formularOperator->id], ['title' => __('Down'), 'class' => 'btn btn-default glyphicon glyphicon-arrow-down ' . $downStyle]) ?></td>
          </td>
            <td><?= h($formularOperator->operator) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $formularOperator->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $formularOperator->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $formularOperator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formularOperator->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
