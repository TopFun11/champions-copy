<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class EnrollmentTable extends Table
{
  public function initialize(array $config)
  {
    //parent::initialize($config);
    
      $this->table('enrollment');
      $this->displayField('id');
      $this->primaryKey('id');
    

      $this->belongsTo('Module', [
        'foreignKey' = 'module_id',
      ]);
      $this->belongsTo('Users', [
        'foreignKey' = 'module_id',
      ]);
  }
}
