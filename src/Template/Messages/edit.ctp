<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $message->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $message->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Messages'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $message->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $message->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Messages'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($message); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Message']) ?></legend>
    <?php
    echo $this->Form->input('type');
    echo $this->Form->input('subject');
    echo $this->Form->input('content');
    echo $this->Form->input('sent');
    echo $this->Form->input('scheduled_time');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
