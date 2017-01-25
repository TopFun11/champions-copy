<?php

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $module->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $module->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Module'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $module->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $module->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Module'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
  <?php
  //$this->extend('../Layout/TwitterBootstrap/dashboard');
  $this->start('tb_actions');
  ?>
      <li><?= $this->Html->link(__('List Module'), ['action' => 'index']) ?></li>
      <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
      <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
  <?php
  $this->end();
  $this->start('tb_sidebar');
  ?>

  <ul class="nav nav-sidebar">
      <li><?= $this->Html->link(__('List Module'), ['action' => 'index']) ?></li>
      <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
      <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
  </ul>
  <?php
  $this->end();
  ?>
  <pre><?= h($module) ?></pre>
  <div class="container">
    <?= $this->Form->create($module); ?>
    <div class="row">
      <div class="col-xs-12">
        <h3>Module editor</h3>
      </div>
      <div class="col-xs-4">
        <div class="form-group">
          <label for="usr">Module name:</label>
          <?php
          echo $this->Form->input('title',['class="form-control"','label'=>false]);
          ?>
        </div>
      </div>
      <div class="col-xs-4">
        <div class="form-group">
          <label for="usr">Icon path:</label>
          <?php
          echo $this->Form->input('icon',['class="form-control"','label'=>false]);
          ?>
        </div>
      </div>
      <div class="col-xs-4">
        <div class="form-group">
          <label for="usr">Banner path:</label>
          <?php
          echo $this->Form->input('banner',['class="form-control"','label'=>false]);
          ?>
        </div>
      </div>
    </div>
    <div class="row" id="md">
      <div class="col-xs-12 ed-display">
        <div class="ed-preview">
          <label for="comment">Module description:</label>
          <?php
          echo $this->Form->textarea('description_text',['class="form-control"','label'=>false, 'id' => 'description_text']);
          ?>
        </div>
      </div>
    </div>
    <hr/>
    <?= $this->Form->end() ?>
    <div class="row" id="sc">
      <div class="col-xs-6 ed-display">
        <h4>Screener questionnaire:</h4>
      </div>
      <div class="col-xs-6 ed-display text-right">
        <div class="btn btn-success">
          Add a screener to this module
        </div>
      </div>
    </div>
    <div class="row" id="sc">
      <div class="col-xs-6 ed-display">
        <h4>Module sections:</h4>
      </div>
      <div class="col-xs-6 ed-display text-right">
        <div class="btn btn-success">
          Add a section
        </div>
      </div>
      <div class="col-xs-12">
        <div class="panel panel-default">
            <!-- Panel header -->
            <h1>lol</h1>
        </div>
      </div>
    </div>


    <div class="row" id="sda">
      <label for="usr">Module sections:</label>
      <div class="col-xs-11 ed-display">
        <div class="module-section ed-preview">
          <div id="tree"></div>
        </div>
      </div>
    </div>
  </div>
