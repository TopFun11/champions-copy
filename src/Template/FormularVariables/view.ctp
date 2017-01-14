<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Formular Variable'), ['action' => 'edit', $formularVariable->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Formular Variable'), ['action' => 'delete', $formularVariable->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formularVariable->id)]) ?> </li>
<li><?= $this->Html->link(__('List Formular Variables'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Formular Variable'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Formular'), ['controller' => 'Formular', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Formular'), ['controller' => 'Formular', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Question'), ['controller' => 'Question', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Question'), ['controller' => 'Question', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Formular Variable'), ['action' => 'edit', $formularVariable->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Formular Variable'), ['action' => 'delete', $formularVariable->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formularVariable->id)]) ?> </li>
<li><?= $this->Html->link(__('List Formular Variables'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Formular Variable'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Formular'), ['controller' => 'Formular', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Formular'), ['controller' => 'Formular', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Question'), ['controller' => 'Question', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Question'), ['controller' => 'Question', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($formularVariable->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Formular') ?></td>
            <td><?= $formularVariable->has('formular') ? $this->Html->link($formularVariable->formular->name, ['controller' => 'Formular', 'action' => 'view', $formularVariable->formular->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Question') ?></td>
            <td><?= $formularVariable->has('question') ? $this->Html->link($formularVariable->question->id, ['controller' => 'Question', 'action' => 'view', $formularVariable->question->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($formularVariable->id) ?></td>
        </tr>
    </table>
</div>
