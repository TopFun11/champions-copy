<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Formular Operator'), ['action' => 'edit', $formularOperator->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Formular Operator'), ['action' => 'delete', $formularOperator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formularOperator->id)]) ?> </li>
<li><?= $this->Html->link(__('List Formular Operators'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Formular Operator'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Formular'), ['controller' => 'Formular', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Formular'), ['controller' => 'Formular', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Formular Operator'), ['action' => 'edit', $formularOperator->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Formular Operator'), ['action' => 'delete', $formularOperator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formularOperator->id)]) ?> </li>
<li><?= $this->Html->link(__('List Formular Operators'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Formular Operator'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Formular'), ['controller' => 'Formular', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Formular'), ['controller' => 'Formular', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($formularOperator->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Formular') ?></td>
            <td><?= $formularOperator->has('formular') ? $this->Html->link($formularOperator->formular->name, ['controller' => 'Formular', 'action' => 'view', $formularOperator->formular->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Operator') ?></td>
            <td><?= h($formularOperator->operator) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($formularOperator->id) ?></td>
        </tr>
    </table>
</div>

