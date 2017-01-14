<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FormularOperators Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Formular
 *
 * @method \App\Model\Entity\FormularOperator get($primaryKey, $options = [])
 * @method \App\Model\Entity\FormularOperator newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FormularOperator[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FormularOperator|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FormularOperator patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FormularOperator[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FormularOperator findOrCreate($search, callable $callback = null, $options = [])
 */
class FormularOperatorsTable extends Table
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

        $this->table('formular_operators');
        $this->displayField('operator');
        $this->primaryKey('id');

        $this->belongsTo('Formular', [
            'foreignKey' => 'formular_id',
            'joinType' => 'INNER'
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
            ->requirePresence('operator', 'create')
            ->notEmpty('operator');

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
        $rules->add($rules->existsIn(['formular_id'], 'Formular'));

        return $rules;
    }
}
