<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Formular Variables'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Formular'), ['controller' => 'Formular', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Formular'), ['controller' => 'Formular', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Question'), ['controller' => 'Question', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Question'), ['controller' => 'Question', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Formular Variables'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Formular'), ['controller' => 'Formular', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Formular'), ['controller' => 'Formular', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Question'), ['controller' => 'Question', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Question'), ['controller' => 'Question', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($formularVariable); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Formular Variable']) ?></legend>
    <?php
    echo $this->Form->input('formular_id', ['options' => $formular]);
    echo $this->Form->input('question_id', ['options' => $question]);
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
