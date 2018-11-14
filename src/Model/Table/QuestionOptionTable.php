<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QuestionOption Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Question
 *
 * @method \App\Model\Entity\QuestionOption get($primaryKey, $options = [])
 * @method \App\Model\Entity\QuestionOption newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\QuestionOption[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\QuestionOption|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QuestionOption patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\QuestionOption[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\QuestionOption findOrCreate($search, callable $callback = null, $options = [])
 */
class QuestionOptionTable extends Table
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

        $this->table('question_option');
        $this->displayField('id');
        $this->primaryKey('id');

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

        $validator
            ->requirePresence('text', 'create')
            ->notEmpty('text');

        $validator
            ->integer('value')
            ->requirePresence('value', 'create')
            ->notEmpty('value');

        $validator
            ->integer('orderNumber')
            ->requirePresence('orderNumber', 'create')
            ->notEmpty('orderNumber');

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
        $rules->add($rules->existsIn(['question_id'], 'Question'));

        return $rules;
    }
}
