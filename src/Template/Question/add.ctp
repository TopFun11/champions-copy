<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Question'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Question'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($question); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Question']) ?></legend>
    <?php
    echo $this->Form->input('question');
    echo $this->Form->input('screener_id', ['options' => $screener]);
    echo $this->Form->input('type', ['options' => ['Amount', 'Yes/No', 'Number range']]);
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
