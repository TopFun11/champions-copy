<?php
if($module->theme) {
  $this->layout = $module->theme;
}
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
<?php
function startModal($title) {
  $titleId = strtolower(str_replace(' ','-',$title));
  $modalStart = "<div id='%s' class='modal fade' tabindex='-1'><div class='modal-dialog modal-xl'><div class='modal-content'>";
  return sprintf($modalStart,$titleId);
}
function endModal() {
  return "<div class='modal-footer'><button class='btn btn-default' type='button' data-dismiss='modal'>Close</button></div></div></div></div>";
}
function makeModalHeader($title) {
  $modalWrapper = "<div class='modal-header'><button class='close' type='button' data-dismiss='modal'>&times;</button><h2 id='myModalLabel' class='modal-title'>%s</h2></div>";
  return sprintf($modalWrapper,$title);
}
function makeAccordionHeader($id, $title) {
  $accHeader = "<div class='panel-heading'><h4 class='panel-title'><a data-toggle='collapse' data-parent='#a%s' href='#a%s'>%s</a></h4></div>";
  return sprintf($accHeader,$id,$id,$title);
}
function makeAccordionBody($id, $content) {
  $accBody = "<div id='a%s' class='panel-collapse collapse'><div class='panel-body'>%s</div></div>";
  return sprintf($accBody, $id, $content);
}
?>

  <div class="row">
    <div class="c4h-home-jumbo jumbotron" style="background-image:url('<?= ($module->banner) ?>')">
        <h1><?= ($module->title) ?></h1>
        <p> Tagline here </p>
    </div>
  </div>
    <?php
        //echo "<pre>".h($module)."</pre>";
        foreach($module->sections as $section){
          echo startModal($section->title);
          echo makeModalHeader($section->title);
          echo $section->content;
          echo("<div class='panel-group' id='accordion'><div class='panel panel-default'>");
          foreach($section->sections as $l1child) {
            echo makeAccordionHeader($l1child->id,$l1child->title);
            echo sprintf("<div id='a%s' class='panel-collapse collapse'><div class='panel-body'>",$l1child->id);
            echo("<ul class='nav nav-tabs'>");
            foreach($l1child->sections as $l2child) {
              echo(sprintf("<li><a data-toggle='tab' href='#b%s'>%s</a></li>",$l2child->id,$l2child->title));
            }
            echo("</ul>");
            echo("<div class='tab-content'>");
            foreach($l1child->sections as $l2child) {
              echo(sprintf("<div id='b%s' class='tab-pane fade'>",$l2child->id));
              echo($l2child->content);
              echo("</div>");
            }
            echo("</div></div></div>");
          }
          echo("</div></div>");
          echo endModal();
        } ?>
