<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FormularVariables Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Formular
 * @property \Cake\ORM\Association\BelongsTo $Question
 *
 * @method \App\Model\Entity\FormularVariable get($primaryKey, $options = [])
 * @method \App\Model\Entity\FormularVariable newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FormularVariable[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FormularVariable|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FormularVariable patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FormularVariable[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FormularVariable findOrCreate($search, callable $callback = null, $options = [])
 */
class FormularVariablesTable extends Table
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

        $this->table('formular_variables');
        $this->displayField('question_id');
        $this->primaryKey('id');

        $this->belongsTo('Formular', [
            'foreignKey' => 'formular_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Question', [
            'foreignKey' => 'question_id',
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
        $rules->add($rules->existsIn(['question_id'], 'Question'));

        return $rules;
    }
}
