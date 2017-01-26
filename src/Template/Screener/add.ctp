<?php
$this->layout = 'adminDefault';

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Screener'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Module'), ['controller' => 'Module', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Module'), ['controller' => 'Module', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Screener'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Module'), ['controller' => 'Module', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Module'), ['controller' => 'Module', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($screener); ?>
<div class="form-group">
  <!--TODO: Add code to allow editing of questions, options, etc-->
  <div class="row">
    <div class="col-xs-12">
      <!--TODO: Add code to display questions attached to screener along with edit and delete options-->
      <h3>Step 1: Create a screener</h3>
    </div>
    <div class="col-xs-9">
      <label for="module_id">Module to associate this screener with:</label>
      <?=  $this->Form->input('module_id', ['options' => $module,'class="form-control"','label'=>false]) ?>
    </div>
    <div class="col-xs-3">
      <label for="module_id">Threshold for pass:</label>
      <input type="number" id="threshold" name="threshold" class="form-control" placeholder="Pass threshold"/>
      <input type="hidden" id="Name" name="Name" value="Screener"/>
    </div>
    <div class="col-xs-12 text-center">
      <br/>
      <?= $this->Form->button("Add questions to this Screener", ['class="btn btn-success btn-lg"']); ?>
    </div>
  </div>
</div>
</div>
<?= $this->Form->end() ?>
