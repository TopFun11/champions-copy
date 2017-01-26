<?php
$this->layout = 'adminDefault';
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
  <!--<pre><?=h($module)?></pre>
  <pre><?=$module->sections?></pre>-->
  <input type="hidden" value='<?= h($module) ?>' id="moduleDataSet"/>
  <div class="container">
    <?= $this->Form->create($module); ?>
    <div class="row">
      <div class="col-xs-6">
        <h1>Module editor</h1>
      </div>
      <div class="col-xs-6 text-right">
        <br/>
        <div onClick="submitModuleForm(this)"class="btn btn-success text-right">
           <span style="vertical-align:top;font-size:19px;" class="glyphicon glyphicon-ok-sign"></span> Save changes to module
        </div>
      </div>
    </div>
    <div class="row">
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
    <?= $this->Form->end() ?>

    <br/>
    <div class="row" id="sc">
      <div class="col-xs-6 ed-display">
        <h4>Screener questionnaire:</h4>
      </div>
      <div class="col-xs-6 ed-display text-right">
        <a class="btn btn-default" href="/screener/add">
           <span style="vertical-align:top;font-size:17px;" class="glyphicon glyphicon-plus"></span> Add a screener to this module
        </a>
      </div>
    </div>
    <br/>
    <div class="row" id="sc">
      <div class="col-xs-12">
        <h4>Module sections:</h4>
      </div>
      <div class="col-xs-12">
        <div class="panel panel-default">
            <div id="tree"></div>
        </div>
      </div>
      <div class="col-xs-12 ed-display text-right">
        <div class="btn btn-default">
           <span style="vertical-align:top;font-size:17px;" class="glyphicon glyphicon-plus"></span> Add a section
        </div>
      </div>
    </div>
  </div>
  <?php
    $treeData = [];
   ?>
<script type="text/javascript">
  var treeData = [<?php
  foreach($module->sections as $i => $section){
    echo "{ text: \"$section->title\",nodes: [";
    foreach ($section->sections as $j => $subsection) {
      echo "{text: \"$subsection->title\"}";
      if($j < count($section->sections)){
        echo ',';
      }
    }
    echo "]}";
    if($i < count($section->sections)){
      echo ',';
    }else{
      echo '';
    }
  }
   ?>];
</script>
