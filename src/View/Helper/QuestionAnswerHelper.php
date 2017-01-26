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
        $html = $this->displayAmount($question, $value);
        break;
      //Radio
      case 1:
        $html = $this->displayRadio($question);
      break;
      case 2:
        $html = $this->displayMultipleChoice($question);
      break;
      default:
        //$html = $this->displayAmount($question);
      break;
    }

    return $html;
  }

  private function displayAmount($question, $value = null){
    return $this->Form->text('answer['.$question->id.']', ['value' => $value]);
  }

  private function displayRadio($question){
    $options = [];
    for($i = 0; $i < count($question->question_option);$i++){
      $op = $question->question_option[$i];
      $options[$i] = ['value' => $op->value, 'text' => $op->text];
    }

    return $this->Form->radio('answer['.$question->id.']', $options);
  }

  private function displayMultipleChoice($question){
    $html = "";

    foreach($question->question_option as $op){
      $html = $html . "<label>". $this->Form->checkbox('answer['.$question->id.'-'.$op->id.']', ['hiddenField' => false, 'label' => 'bob']).$op->text . "</label>";
    }

    return $html;
  }

}
?>
