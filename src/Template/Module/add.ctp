<?php
$this->layout = 'adminDefault';
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Module'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
<?php
$this->end();
$this->start('tb_sidebar');
?>
    <li><?= $this->Html->link(__('List Module'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
<?php
$this->end();


?>
<div class="container">
  <?= $this->Form->create($module); ?>
  <div class="row">
    <div class="col-xs-12">
      <h1>Module creator</h1>
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
    <label for="usr">Module description:</label>
    <div class="col-xs-11 ed-display">
      <div class="module-section ed-preview">
        No description
      </div>
      <div class="ed-editor">
        <label for="comment">Module description:</label>
        <?php
        echo $this->Form->textarea('description_text',['class="form-control"','label'=>false, 'id' => 'description_text']);
        ?>
      </div>
    </div>
    <div class="col-xs-1 text-right">
      <div class="btn btn-sm btn-success md-button" onclick="toggleModuleCreatorField(this)">
        Add/Edit
      </div>
    </div>
  </div>
  <?= $this->Form->end() ?>
</div>
<!--tinymc-->

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
