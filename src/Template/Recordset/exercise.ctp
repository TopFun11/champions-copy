<?php
$this->layout = 'adminDefault';


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Screener'), ['action' => 'edit', $exercise->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Screener'), ['action' => 'delete', $exercise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exercise->id)]) ?> </li>
<li><?= $this->Html->link(__('List Screener'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Screener'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Module'), ['controller' => 'Module', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Module'), ['controller' => 'Module', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Screener'), ['action' => 'edit', $exercise->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Screener'), ['action' => 'delete', $exercise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exercise->id)]) ?> </li>
<li><?= $this->Html->link(__('List Screener'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Screener'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Module'), ['controller' => 'Module', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Module'), ['controller' => 'Module', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?php
//die("<pre>" . h($recordset) . "</pre>");
  //Mapping Records to a map[Question_ID][Record]
  $map = [];
  if(isset($recordset)){
    if(isset($recordset->record)){
      foreach($recordset->record as $record){
        if($record->question_option_id == null){
            $map[$record->question_id] = $record;
        }else{
          $map["$record->question_id-$record->question_option_id"] = $record;
        }
      }
    }
  }

//die("<pre>" . var_dump($map) . "</pre>");
 ?>
<?= $this->Form->create($recordset); ?>
<?=  $this->Form->hidden('exercise_id', ['value' => $exercise->id]); ?>
<div class="panel panel-default">
    <!-- Panel header -->
      <div class="panel-heading">
        <h3 class="panel-title"><?= h($exercise->section->title . ' exercise') ?></h3>
    </div>

<!--<?= $exercise ?>-->
  <?php foreach($exercise->question as $question): ?>
      <div>
          <p><?= $question->question ?></p>
        </div>
        <div>
          <?php
          if($question->type != 2){
            if(array_key_exists($question->id, $map)){
              echo $this->QuestionAnswer->display($question, $map[$question->id]->answer);
            }else{
              echo $this->QuestionAnswer->display($question);
            }

          }else{
            $ops = [];
            foreach($question->question_option as $i => $op){
              if(array_key_exists("$question->id-$op->id", $map)){
                $ops[$op->id] = $map["$question->id-$op->id"]->answer;
              }
            }
            //die("ops: " . $ops);
            echo $this->QuestionAnswer->display($question, $ops);
          }?>
        </div>

  <?php endforeach;?>
</div>
<?= $this->Form->button(__("Complete")); ?>
<?= $this->Form->end() ?>
