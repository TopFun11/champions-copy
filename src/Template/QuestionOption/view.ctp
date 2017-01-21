<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Question Option'), ['action' => 'edit', $questionOption->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Question Option'), ['action' => 'delete', $questionOption->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionOption->id)]) ?> </li>
<li><?= $this->Html->link(__('List Question Option'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Question Option'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Question'), ['controller' => 'Question', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Question'), ['controller' => 'Question', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Question Option'), ['action' => 'edit', $questionOption->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Question Option'), ['action' => 'delete', $questionOption->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionOption->id)]) ?> </li>
<li><?= $this->Html->link(__('List Question Option'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Question Option'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Question'), ['controller' => 'Question', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Question'), ['controller' => 'Question', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($questionOption->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Description') ?></td>
            <td><?= h($questionOption->description) ?></td>
        </tr>
        <tr>
            <td><?= __('Question') ?></td>
            <td><?= $questionOption->has('question') ? $this->Html->link($questionOption->question->question, ['controller' => 'Question', 'action' => 'view', $questionOption->question->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($questionOption->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Value') ?></td>
            <td><?= $this->Number->format($questionOption->value) ?></td>
        </tr>
        <tr>
            <td><?= __('OrderNumber') ?></td>
            <td><?= $this->Number->format($questionOption->orderNumber) ?></td>
        </tr>
    </table>
</div>

