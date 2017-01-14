<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Formular Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Screener
 * @property \Cake\ORM\Association\HasMany $FormularOperators
 * @property \Cake\ORM\Association\HasMany $FormularVariables
 *
 * @method \App\Model\Entity\Formular get($primaryKey, $options = [])
 * @method \App\Model\Entity\Formular newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Formular[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Formular|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Formular patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Formular[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Formular findOrCreate($search, callable $callback = null, $options = [])
 */
class FormularTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('formular');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Screener', [
            'foreignKey' => 'screener_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('FormularOperators', [
            'foreignKey' => 'formular_id'
        ]);
        $this->hasMany('FormularVariables', [
            'foreignKey' => 'formular_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['screener_id'], 'Screener'));

        return $rules;
    }
}
