<?php
/* src/View/Helper/QuestionAnswerHelper.php */
namespace App\View\Helper;

use Cake\View\Helper;

class QuestionAnswerHelper extends Helper{
  public $helpers = ['Form'];

  public function display($question){
    $html = (string)$question->type;

    switch($question->type){
      //Amount type
      case 0:
        $html = $this->displayAmount($question);
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

  private function displayAmount($question){
    return $this->Form->text('answer');
  }

  private function displayRadio($question){
    $options = [];
    for($i = 0; $i < count($question->question_option);$i++){
      $op = $question->question_option[$i];
      $options[$i] = ['value' => $op->value, 'text' => $op->text];
    }

    return $this->Form->radio('answer', $options);
  }

  private function displayMultipleChoice($question){
    $html = "";

    foreach($question->question_option as $op){
      $html = $html . "<label>".$op->text. $this->Form->checkbox('answer', ['hiddenField' => false, 'label' => 'bob']) . "</label>";
    }

    return $html;
  }

}
?>
