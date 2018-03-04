<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SerialNumber Model
 *
 * @method \App\Model\Entity\SerialNumber get($primaryKey, $options = [])
 * @method \App\Model\Entity\SerialNumber newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SerialNumber[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SerialNumber|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SerialNumber patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SerialNumber[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SerialNumber findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SerialNumberTable extends Table
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

        $this->setTable('serial_number');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('date')
            ->maxLength('date', 255)
            ->notEmpty('date');

        $validator
            ->scalar('so_no')
            ->maxLength('so_no', 255)
            ->notEmpty('so_no');

        $validator
            ->scalar('model')
            ->maxLength('model', 255)
            ->notEmpty('model');

        $validator
            ->scalar('version')
            ->maxLength('version', 255)
            ->allowEmpty('version');

        $validator
            ->scalar('type1')
            ->maxLength('type1', 255)
            ->allowEmpty('type1');

        $validator
            ->scalar('type2')
            ->maxLength('type2', 255)
            ->allowEmpty('type2');

        $validator
            ->scalar('quantity')
            ->maxLength('quantity', 255)
            ->notEmpty('quantity');

        $validator
            ->scalar('created_by')
            ->maxLength('created_by', 255)
            ->notEmpty('created_by');

        $validator
            ->scalar('model_code')
            ->maxLength('model_code', 255)
            ->allowEmpty('model_code');

        $validator
            ->scalar('reject_remark')
            ->maxLength('reject_remark', 255)
            ->allowEmpty('reject_remark');

        $validator
            ->scalar('remark')
            ->maxLength('remark', 255)
            ->allowEmpty('remark');

        $validator
            ->scalar('status')
            ->maxLength('status', 255)
            ->allowEmpty('status');

        $validator
            ->scalar('verified_by')
            ->maxLength('verified_by', 255)
            ->allowEmpty('verified_by');

        $validator
            ->scalar('approved_by')
            ->maxLength('approved_by', 255)
            ->allowEmpty('approved_by');

        return $validator;
    }
}
