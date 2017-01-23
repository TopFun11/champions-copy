<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Recordset Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Screener
 *
 * @method \App\Model\Entity\Recordset get($primaryKey, $options = [])
 * @method \App\Model\Entity\Recordset newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Recordset[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Recordset|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Recordset patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Recordset[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Recordset findOrCreate($search, callable $callback = null, $options = [])
 */
class RecordsetTable extends Table
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

        $this->table('recordset');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Screener', [
            'foreignKey' => 'screener_id',
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
        $rules->add($rules->existsIn(['screener_id'], 'Screener'));

        return $rules;
    }
}
