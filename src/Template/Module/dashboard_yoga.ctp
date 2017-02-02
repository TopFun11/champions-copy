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
  $accHeader = "<div class='panel-heading'><h4 class='panel-title'><a data-toggle='collapse' data-parent='#accordion' href='#a%s'>%s</a></h4></div>";
  return sprintf($accHeader,$id,$title);
}
function makeAccordionBody($id, $content) {
  $accBody = "<div id='a%s' class='panel-collapse collapse'><div class='panel-body'>%s</div></div>";
  return sprintf($accBody, $id, $content);
}
?>

  <div class="row">
    <div class="c4h-home-jumbo jumbotron" style="background-image:url('<?= ($module->banner) ?>')">
        <h1><?= ($module->title) ?></h1>
        <p> <?= ($module->description) ?> </p>
    </div>
  </div>
    <?php
        //echo "<pre>".h($module)."</pre>";
        foreach($module->sections as $section){
          echo startModal($section->title);
          echo makeModalHeader($section->title);
          echo $section->content;

          $firstTab = true;
          foreach($section->sections as $l1child) {
            echo("<div class='panel-group' id='accordion'><div class='panel panel-default'>"); //1
            echo makeAccordionHeader($l1child->id,$l1child->title);
            if($firstTab) {
              echo sprintf("<div id='a%s' class='panel-collapse collapse in'><div class='panel-body'>",$l1child->id); //2,3
              $firstTab=false;
            } else {
              echo sprintf("<div id='a%s' class='panel-collapse collapse'><div class='panel-body'>",$l1child->id); //2,3
            }
            echo("<ul class='nav nav-tabs'>");
            $expand = true;

            //generates tabs
            foreach($l1child->sections as $l2child) {
              if($expand) {
                echo(sprintf("<li class='active'><a data-toggle='tab' href='#b%s'>%s</a></li>",$l2child->id,$l2child->title));
                $expand = false;
              } else {
                echo(sprintf("<li><a data-toggle='tab' href='#b%s'>%s</a></li>",$l2child->id,$l2child->title));
              }
            }
            echo("</ul>");
            echo("<div class='tab-content'>"); //4

            //this generates the content within said tabs

            foreach($l1child->sections as $l2child) {
              if(!$expand){
                echo(sprintf("<div id='b%s' class='tab-pane fade in active'>",$l2child->id)); //5
                $expand=true;
              } else {
                echo(sprintf("<div id='b%s' class='tab-pane fade'>",$l2child->id)); //5
              }
              echo($l2child->content);
              if(isset($l2child->exercises->question)) {
                echo("<form id='exerciseForm' class='section-exercises' name='exerciseForm'>");
                echo("<input type='hidden' name='exercise_id' value='".$l2child->exercises->id."'/>");
                $qnum = 1;
                foreach($l2child->exercises->question as $question){

                  echo("<h4>Question ".$qnum."</h4>");
                  $qnum++;
                  echo($question->question);
                  echo $this->QuestionAnswer->display($question);
                }
                echo("<div class='text-center'><button type='submit' class='btn btn-success' id='".$l2child->exercises->id."'>Save answers</button></div><hr/>");
                echo("</form>");
              }

              echo("</div>");
            }
            echo("</div>");//1
            echo("</div>");//2
            echo("</div>");//3
            echo("</div>");//4
            echo("</div>");//4

          }
          echo endModal();
        } ?>
