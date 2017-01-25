<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Sections'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Module'), ['controller' => 'Module', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Module'), ['controller' => 'Module', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Sections'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Module'), ['controller' => 'Module', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Module'), ['controller' => 'Module', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($section); ?>

<fieldset>
    <legend><?= __('Add {0}', ['Section']) ?></legend>
    <?php
    echo $this->Form->input('title');
    echo $this->Form->input('content');
    $mods = [];
    foreach($module as $i => $mod){
      $mods[$i] = ['value' => $mod->id, 'text'=> $mod->title];
    }
    echo $this->Form->input('module_id', ['options' => $mods]);
    $secs = [''=>'null'];
    foreach($module as $i => $mod){
      echo $mod;
      foreach($mod->sections as $j => $sec){
        echo $sec;
        $secs[$j + $i * count($module)] = ['value' => $sec->id, 'text' => $sec->title];

      }
    }
    echo $this->Form->input('section_id', ['options' => $secs]);
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
