<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Screener'), ['action' => 'edit', $exercise->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Screener'), ['action' => 'delete', $exercise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exercise->id)]) ?> </li>
<li><?= $this->Html->link(__('List Screener'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Screener'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Module'), ['controller' => 'Module', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Module'), ['controller' => 'Module', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Screener'), ['action' => 'edit', $exercise->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Screener'), ['action' => 'delete', $exercise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exercise->id)]) ?> </li>
<li><?= $this->Html->link(__('List Screener'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Screener'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Module'), ['controller' => 'Module', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Module'), ['controller' => 'Module', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($recordset); ?>
<?=  $this->Form->hidden('exercise_id', ['value' => $exercise->id]); ?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($exercise->section->title . ' exercise') ?></h3>
    </div>
<!--<?= $exercise ?>-->
  <?php foreach($exercise->question as $question): ?>
      <div>
          <p><?= $question->question ?></p>
        </div>
        <div>
          <?= $this->QuestionAnswer->display($question);?>
        </div>

  <?php endforeach;?>
</div>
<?= $this->Form->button(__("Complete")); ?>
<?= $this->Form->end() ?>
