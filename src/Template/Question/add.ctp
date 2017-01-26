<?php
$this->layout = 'adminDefault';

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

    //Section stuff
    $screens = ["null" => "null"];
    foreach($screener as $i => $screen){
      $tmp = [$screen->id =>$screen->Name];
      $screens[$screen->id] = $screen->Name ;

    }


    //Exercise stuff
    $exe = ['value' => 'null'];
    foreach($exercise as $i => $ex){
      $exe[$ex->id] = $ex->section->title;

    }


    echo $this->Form->input('question');
    echo $this->Form->input('screener_id', ['options' =>   $screens]);
    echo $this->Form->input('exercise_id', ['options' => $exe]);
    echo $this->Form->input('type', ['options' => ['Amount', 'Range', 'Multiple choice']]);
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
