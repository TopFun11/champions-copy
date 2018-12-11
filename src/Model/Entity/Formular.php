<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Math\Parser;

/**
 * Formular Entity
 *
 * @property int $id
 * @property string $name
 *
 * @property \App\Model\Entity\Screener $screener
 * @property \App\Model\Entity\FormularOperator[] $formular_operators
 * @property \App\Model\Entity\FormularVariable[] $formular_variables
 */
class Formular extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    private function insertVariables($src, $records){
      $pos = strpos($src, "$");
      if($pos === false){
        return $src;
      }

      $posEnd = strpos($src, " ", $pos);
      if(!$posEnd){
        $posEnd = strlen($src);
      }
      $id = substr($src, $pos+1, $posEnd-$pos);
      $bob = "tree";
      $multichoice = false;
      $sum = 0;
      foreach($records as $record){
        //return $posEnd;
        if($id == $record->question_id){

          $val = $record->answer;
          if($val == ""){
            $total = 0;
            for($i = 0; $i < count($record->question->question_option);$i++){
              if($record->question_option_id == $record->question->question_option[$i]->id){
                $multichoice = true;
                $total = $record->question->question_option[$i]->value;
              }
            }
            $sum += $total;
          }
          if(!$multichoice){
            return $this->insertVariables(str_replace("$".$id, ' ' . $val . ' ', $src), $records);
          }
        }
      }
      if($multichoice){
        return $this->insertVariables(str_replace("$".$id, ' ' . $sum . ' ', $src), $records);
      }
      return $src;
    }

    public function calculate($records) {
      $parser = new Math\Parser();
      $vars = $this->insertVariables($this->formula, $records);
      return  $vars .' = '. $parser->evaluate($vars);
    }
}
