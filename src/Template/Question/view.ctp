<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Question'), ['action' => 'edit', $question->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Question'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]) ?> </li>
<li><?= $this->Html->link(__('List Question'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Question'), ['action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Question'), ['action' => 'edit', $question->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Question'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]) ?> </li>
<li><?= $this->Html->link(__('List Question'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Question'), ['action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($question->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Question') ?></td>
            <td><?= h($question->question) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($question->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Screener Id') ?></td>
            <td><?= $this->Number->format($question->screener_id) ?></td>
        </tr>
    </table>
</div>

