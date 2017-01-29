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
    <div class="row" id="md">
      <div class="col-xs-12 ed-display">
        <div class="con-preview">
          <label for="content">Module content:</label>
          <?php
          echo $this->Form->textarea('content',['class="form-control"','label'=>false, 'id' => 'content']);
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
        <?php if(!$module->has("screener")){
          echo("<a class='btn btn-default' href='/screener/add/".$module->id."'><span style='vertical-align:top;font-size:17px;' class='glyphicon glyphicon-plus'></span> Add a screener</a>");
        } else {
          echo("<a class='btn btn-default' href='/screener/edit/".$module->screener->id."'><span style='vertical-align:top;font-size:17px;' class='glyphicon glyphicon-cog'></span> Edit screener</a>");
         }?>
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
        <!--TODO: Pass module id to section adder-->
        <a href="/sections/add">
          <div class="btn btn-default">
           <span style="vertical-align:top;font-size:17px;" class="glyphicon glyphicon-plus"></span> Add a section
        </div>
      </a>
      </div>
    </div>
  </div>
  <script>
  $(document).ready(function(){
    tinymce.init({
      selector:'#description_text',
      height: 200,
      theme: 'modern',
      plugins: [
          'advlist autolink lists link image charmap print preview hr anchor pagebreak',
          'searchreplace wordcount visualblocks visualchars code fullscreen',
          'insertdatetime media nonbreaking save table contextmenu directionality',
          'template paste textcolor colorpicker textpattern imagetools'
        ],
      toolbar: 'fullscreen | undo redo | insert | styleselect | bold italic | alignleft \
                aligncenter alignright alignjustify | bullist numlist outdent \
                indent | forecolor backcolor | link image | print preview media ',
      image_advtab: true,
      });
  });
  </script>
  <input type="hidden" id="question-being-worked-on"/>
