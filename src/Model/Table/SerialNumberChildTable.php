<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SerialNumberChild Model
 *
 * @property \App\Model\Table\SerialNumbersTable|\Cake\ORM\Association\BelongsTo $SerialNumbers
 *
 * @method \App\Model\Entity\SerialNumberChild get($primaryKey, $options = [])
 * @method \App\Model\Entity\SerialNumberChild newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SerialNumberChild[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SerialNumberChild|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SerialNumberChild patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SerialNumberChild[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SerialNumberChild findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SerialNumberChildTable extends Table
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

        $this->setTable('serial_number_child');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('SerialNumber', [
            'foreignKey' => 'serial_number_id',
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
            ->scalar('year')
            ->maxLength('year', 255)
            ->requirePresence('year', 'create')
            ->notEmpty('year');

        $validator
            ->scalar('month')
            ->maxLength('month', 255)
            ->requirePresence('month', 'create')
            ->notEmpty('month');

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
        $rules->add($rules->existsIn(['serial_number_id'], 'SerialNumber'));

        return $rules;
    }
}
