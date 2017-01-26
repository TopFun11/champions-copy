<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Message'), ['action' => 'edit', $message->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Message'), ['action' => 'delete', $message->id], ['confirm' => __('Are you sure you want to delete # {0}?', $message->id)]) ?> </li>
<li><?= $this->Html->link(__('List Messages'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Message'), ['action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Message'), ['action' => 'edit', $message->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Message'), ['action' => 'delete', $message->id], ['confirm' => __('Are you sure you want to delete # {0}?', $message->id)]) ?> </li>
<li><?= $this->Html->link(__('List Messages'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Message'), ['action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($message->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Subject') ?></td>
            <td><?= h($message->subject) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($message->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Type') ?></td>
            <td><?= $this->Number->format($message->type) ?></td>
        </tr>
        <tr>
            <td><?= __('Scheduled Time') ?></td>
            <td><?= h($message->scheduled_time) ?></td>
        </tr>
        <tr>
            <td><?= __('Sent') ?></td>
            <td><?= $message->sent ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td><?= __('Content') ?></td>
            <td><?= $this->Text->autoParagraph(h($message->content)); ?></td>
        </tr>
    </table>
</div>

