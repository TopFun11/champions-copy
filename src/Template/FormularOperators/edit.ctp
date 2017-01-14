<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $formularOperator->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $formularOperator->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Formular Operators'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Formular'), ['controller' => 'Formular', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Formular'), ['controller' => 'Formular', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $formularOperator->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $formularOperator->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Formular Operators'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Formular'), ['controller' => 'Formular', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Formular'), ['controller' => 'Formular', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($formularOperator); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Formular Operator']) ?></legend>
    <?php
    echo $this->Form->input('formular_id', ['options' => $formular]);
    echo $this->Form->input('operator');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
