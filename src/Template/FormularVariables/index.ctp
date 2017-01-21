<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Formular Variable'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Formular'), ['controller' => 'Formular', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Formular'), ['controller' => 'Formular', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Question'), ['controller' => 'Question', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Question'), ['controller' => 'Question', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
          <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('order'); ?></th>
            <th><?= $this->Paginator->sort('formular_id'); ?></th>
            <th><?= $this->Paginator->sort('question_id'); ?></th>
            <th><?= $this->Paginator->sort('orderNumber'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($formularVariables as $formularVariable): ?>
        <tr>
          <td><?= $this->Number->format($formularVariable->id) ?></td>
            <td><?= $this->Number->format($formularVariable->orderNumber) ?></td>
            <td>
                <?= $formularVariable->has('formular') ? $this->Html->link($formularVariable->formular->name, ['controller' => 'Formular', 'action' => 'view', $formularVariable->formular->id]) : '' ?>
            </td>
            <td>
                <?= $formularVariable->has('question') ? $this->Html->link($formularVariable->question->id, ['controller' => 'Question', 'action' => 'view', $formularVariable->question->id]) : '' ?>
            </td>

              <td>
                <?php
                $upStyle = "";
                $downStyle = "";
                if ($this->Number->format($formularVariable->orderNumber) == 0){
                    $upStyle = "disabled";
                }
                if ($this->Number->format($formularVariable->orderNumber) >= count($formularVariables) - 1){
                    $downStyle = "disabled";
                }

                 ?>
                <?= $this->Html->link('', ['action' => 'moveup', $formularVariable->id], ['title' => __('Up'), 'class' => 'btn btn-default glyphicon glyphicon-arrow-up ' . $upStyle])?>
                <?= $this->Html->link('', ['action' => 'movedown', $formularVariable->id], ['title' => __('Down'), 'class' => 'btn btn-default glyphicon glyphicon-arrow-down ' . $downStyle]) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $formularVariable->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $formularVariable->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $formularVariable->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formularVariable->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
