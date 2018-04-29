<?php
/* src/View/Helper/QuestionAnswerHelper.php */
namespace App\View\Helper;

use Cake\View\Helper;

class QuestionAnswerHelper extends Helper{
  public $helpers = ['Form'];

  public function display($question, $value = null){
    $html = (string)$question->type;

    switch($question->type){
      //Amount type
      case 0:
        $html = $this->displayText($question, $value);
        break;
      //Radio
      case 1:
        $html = $this->displayRadio($question, $value);
        break;
      case 2:
        $html = $this->displayMultipleChoice($question, $value);
        break;
      case 3:
        $html = $this->displayAmount($question, $value);
        break;
      default:
        //$html = $this->displayAmount($question);
        break;
    }

    return $html;
  }

  private function displayText($question, $value = null){
    return $this->Form->textarea('answer['.$question->id.']', ['value' => $value, 'class' => 'form-control']);
  }

  private function displayRadio($question, $value = null){
    $options = [];
    for($i = 0; $i < count($question->question_option);$i++){

      $op = $question->question_option[$i];
      if($value != null){
        if($value == $op->value){
            $options[$i] = ['value' => $op->value, 'text' => $op->text, 'checked'];
        }else{
        $options[$i] = ['value' => $op->value, 'text' => $op->text];
        }
      }else{
        $options[$i] = ['value' => $op->value, 'text' => $op->text];
      }

    }
    echo("<div class='col-xs-12'>");
    return $this->Form->radio('answer['.$question->id.']', $options,['class' => 'form-control']) ."</div>";
  }

  private function displayMultipleChoice($question, $values = null){
    $html = "";
    //die("values: ". ($values == null));
    foreach($question->question_option as $op){
      if($values != null){
        if(array_key_exists($op->id, $values)){
          if($values[$op->id]){
            $html = $html . "<div class='checkbox'><label>". $this->Form->checkbox('answer['.$question->id.'-'.$op->id.']', ['hiddenField' => false, "checked"]).$op->text . "</label></div>";
            continue;
          }
        }
      }
      $html = $html . "<div class='checkbox'><label>". $this->Form->checkbox('answer['.$question->id.'-'.$op->id.']', ['hiddenField' => false]).$op->text . "</label></div>";
    }
    return $html;
  }

  private function displayAmount($question, $value = null) {
    return $this->Form->input('answer['.$question->id.']', ['type' => 'number', 'value' => $value, 'class' => 'form-control', 'label' => false]);
  }

}
?>
