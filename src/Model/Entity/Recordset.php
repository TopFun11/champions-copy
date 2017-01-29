<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Recordset Entity
 *
 * @property int $id
 * @property int $screener_id
 *
 * @property \App\Model\Entity\Screener $screener
 */
class Recordset extends Entity
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

    public function getRecord($question_id){
      if($this->record == null)return;
      foreach($this->record as $record){

        if($record->question_id == $question_id){
          return $record;
        }
      }
      return null;
    }
}
