<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $formular->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $formular->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Formular'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Screener'), ['controller' => 'Screener', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Screener'), ['controller' => 'Screener', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Formular Operators'), ['controller' => 'FormularOperators', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Formular Operator'), ['controller' => 'FormularOperators', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Formular Variables'), ['controller' => 'FormularVariables', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Formular Variable'), ['controller' => 'FormularVariables', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $formular->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $formular->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Formular'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Screener'), ['controller' => 'Screener', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Screener'), ['controller' => 'Screener', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Formular Operators'), ['controller' => 'FormularOperators', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Formular Operator'), ['controller' => 'FormularOperators', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Formular Variables'), ['controller' => 'FormularVariables', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Formular Variable'), ['controller' => 'FormularVariables', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($formular); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Formular']) ?></legend>
    <?php
    echo $this->Form->input('name');
    echo $this->Form->input('screener_id', ['options' => $screener]);
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
