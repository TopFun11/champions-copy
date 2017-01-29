<?php
$this->layout = 'adminDefault';
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Exercise'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Recordset'), ['controller' => 'Recordset', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Recordset'), ['controller' => 'Recordset', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Question'), ['controller' => 'Question', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Question'), ['controller' => 'Question', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Exercise'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Recordset'), ['controller' => 'Recordset', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Recordset'), ['controller' => 'Recordset', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Question'), ['controller' => 'Question', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Question'), ['controller' => 'Question', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>

<div class="row">
  <div class="col-xs-12">
    <h1>Exercise creator</h1>
  <?= $this->Form->create($exercise); ?>
  <fieldset>
      <legend><?= __('Add {0}', ['Exercise']) ?></legend>
      <?php
      echo $this->Form->input('section_id', ['options' => $sections, 'class'=>'form-control']);
      ?>
      <select class="form-control" id="type">
        <option value="1">Can take exercise once only</option>
        <option value="2">Exercise is done weekly</option>
      </select>
  </fieldset>
  <div class="btn btn-success" onClick="createExercise()">
    Add questions to exercise
  </div>
</div>
</div>
<?= $this->Form->end() ?>
