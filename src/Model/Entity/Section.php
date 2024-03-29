<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Section Entity
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $module_id
 *
 * @property \App\Model\Entity\Module $module
 */
class Section extends Entity
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

    public function getModule(){
      if($this->module_id === null){
        echo "<pre>" . h($this) . "</pre>";
        die();
        return $this->section->getModule();
      }else{
        return $this->module;
      }
    }

    public function isLocked(){
      if($this->unlock_date == null){
        return false;
      }
      if(new DateTime() > $this->unlock_date){
        return false;
      }
      return true;
    }
}
