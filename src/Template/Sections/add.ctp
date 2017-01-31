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
      <h1>Add a section</h1>
    </div>


  </div>
</div>

<?= $this->Form->create($section); ?>
<div class="form-group">
  <!--TODO: Add code to allow editing of questions, options, etc-->
  <div class="row">
    <div class="col-xs-12">
      <!--TODO: Add code to display questions attached to screener along with edit and delete options-->
      <h3>Add Section</h3>
    </div>
    <div class="col-xs-12">
      <label for="module_id">Section title</label>
      <?php echo $this->Form->input('title', ['class="form-control"','label'=>false]) ?>
    </div>
    <div class="col-xs-12">
      <?= $this->Form->input('content',['id'=>'description_text']) ?>
    </div>
    <div class="col-xs-6">
      <label for="module_id">Associate with module:</label>
      <?php
      $mods = [];
      foreach($module as $i => $mod){
        $mods[$i+1] = ['value' => $mod->id, 'text'=> $mod->title];
      }
      echo $this->Form->select('module_id', $mods, ['empty' => true,'class'=>'form-control','id'=>'module_id']);
      ?>
    </div>
    <div class="col-xs-6">
      <label for="module_id">Make child of section:</label>
      <?php
      $secs = [];
      foreach($module as $i => $section){
        $secs[$i * count($module)] = ['value' => $section->id, 'text' => $section->title];
      }
      echo $this->Form->select('section_id',  $secs,['empty' => true,'class'=>'form-control','id'=>'section_id']);
      ?>
    </div>
    <div class="col-xs-12 text-center">
      <br/>
      <div class="btn btn-lg btn-success" onClick="submitTinymce(this)">
        Save section
      </div>
      <div class="btn btn-lg btn-success" onClick="createSection()">
        Add exercise to section
      </div>
    </div>
  </div>
</div>
</div>
<?= $this->Form->end() ?>
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
