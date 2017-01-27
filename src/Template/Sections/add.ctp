<?php
$this->layout = 'adminDefault';
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
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h1>Add a screener</h1>
    </div>


  </div>
</div>

<?= $this->Form->create($section); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Section']) ?></legend>
    <?php
    echo $this->Form->input('title');
    echo $this->Form->input('content');
    $mods = [];
    foreach($module as $i => $mod){
      $mods[$i+1] = ['value' => $mod->id, 'text'=> $mod->title];
    }
    echo $this->Form->select('module_id', $mods, ['empty' => true,'class'=>'form-control']);
    $secs = [];
    foreach($module as $i => $mod){

      foreach($mod->sections as $j => $sec){

        $secs[$j + $i * count($module)] = ['value' => $sec->id, 'text' => $sec->title];

      }
    }
    echo $this->Form->select('section_id',  $secs,['empty' => true]);
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>


<div class="form-group">
  <!--TODO: Add code to allow editing of questions, options, etc-->
  <div class="row">
    <div class="col-xs-12">
      <!--TODO: Add code to display questions attached to screener along with edit and delete options-->
      <h3>Add Section</h3>
    </div>
    <div class="col-xs-12">
      <label for="module_id">Section title</label>
      <?=  $this->Form->input('title', ['options' => $module,'class="form-control"','label'=>false]) ?>
    </div>
    <div class="col-xs-12">
      <?= $this->Form->input('content',['id'=>'description_text']) ?>
    </div>
    <div class="col-xs-6">
      <label for="module_id">Associate with module:</label>
      <?=
      $mods = [];
      foreach($module as $i => $mod){
        $mods[$i+1] = ['value' => $mod->id, 'text'=> $mod->title];
      }
      echo $this->Form->select('module_id', $mods, ['empty' => true,'class'=>'form-control']);
      ?>
    </div>
    <div class="col-xs-6">
      <label for="module_id">Associate with module:</label>
      <?=
      $secs = [];
      foreach($module as $i => $mod){
        foreach($mod->sections as $j => $sec){
          $secs[$j + $i * count($module)] = ['value' => $sec->id, 'text' => $sec->title];
        }
      }
      echo $this->Form->select('section_id',  $secs,['empty' => true,'class'=>'form-control']);
      ?>
    </div>
    <div class="col-xs-12 text-center">
      <br/>
      <?= $this->Form->button("Save changes", ['class="btn btn-success btn-lg"']); ?>
    </div>
  </div>
</div>
</div>
<?= $this->Form->end() ?>
