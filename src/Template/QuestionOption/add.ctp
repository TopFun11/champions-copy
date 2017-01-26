<?php
$this->layout = 'adminDefault';
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Question Option'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Question'), ['controller' => 'Question', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Question'), ['controller' => 'Question', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Question Option'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Question'), ['controller' => 'Question', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Question'), ['controller' => 'Question', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($questionOption); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Question Option']) ?></legend>
    <?php
    echo $this->Form->input('text');
    echo $this->Form->input('value');
    echo $this->Form->input('orderNumber');
    echo $this->Form->input('question_id', ['options' => $question]);
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
