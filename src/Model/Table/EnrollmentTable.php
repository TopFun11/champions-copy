<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Enrollment Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Module
 *
 * @method \App\Model\Entity\Enrollment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Enrollment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Enrollment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Enrollment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Enrollment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Enrollment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Enrollment findOrCreate($search, callable $callback = null, $options = [])
 */

class EnrollmentTable extends Table
{
  public function initialize(array $config)
  {
      parent::initialize($config);
    
      $this->table('enrollment');
      $this->displayField('id');
      $this->primaryKey('id');
    

      $this->belongsTo('Module');
      $this->belongsTo('Users');
  }
}
