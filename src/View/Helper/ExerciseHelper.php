<?php
/* src/View/Helper/QuestionAnswerHelper.php */
namespace App\View\Helper;

use Cake\View\Helper;

class ExerciseHelper extends Helper{
  public $helpers = ['QuestionAnswer', 'Form'];

  function display($exercise){
    echo "<div class='panel'><h4>Exercise</h4>";
    if(is_array($exercise->recordset)){
      if(count($exercise->recordset) > 0){
          $recordset = $exercise->recordset[0];
      }
    }
    echo $this->Form->create(@$recordset, ["url" =>['action' => 'exercise/'. $exercise->id, "controller" => "recordset"]]);
    echo  $this->Form->hidden('exercise_id', ['value' => $exercise->id]);

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
  //a  die(var_dump($recordset));
    foreach($exercise->question as $question){
      echo "<div><p>$question->question</p></div>";
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
        echo $this->QuestionAnswer->display($question, $ops);
      }
    }
    echo $this->Form->button(__("Complete"));
    echo $this->Form->end();
    echo "</div>";
  }
}
?>
