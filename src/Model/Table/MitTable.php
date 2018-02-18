<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Mit Model
 *
 * @method \App\Model\Entity\Mit get($primaryKey, $options = [])
 * @method \App\Model\Entity\Mit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Mit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Mit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Mit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Mit findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MitTable extends Table
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

        $this->setTable('mit');
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
            ->scalar('po_no')
            ->maxLength('po_no', 255)
            ->requirePresence('po_no', 'create')
            ->notEmpty('po_no');

        $validator
            ->scalar('sales_order_no')
            ->maxLength('sales_order_no', 255)
            ->requirePresence('sales_order_no', 'create')
            ->notEmpty('sales_order_no');

        $validator
            ->scalar('date')
            ->maxLength('date', 255)
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->scalar('location')
            ->maxLength('location', 255)
            ->requirePresence('location', 'create')
            ->notEmpty('location');

        $validator
            ->scalar('part_no')
            ->maxLength('part_no', 255)
            ->requirePresence('part_no', 'create')
            ->notEmpty('part_no');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->scalar('used_quantity')
            ->maxLength('used_quantity', 255)
            ->requirePresence('used_quantity', 'create')
            ->notEmpty('used_quantity');

        $validator
            ->scalar('requested_quantity')
            ->maxLength('requested_quantity', 255)
            ->requirePresence('requested_quantity', 'create')
            ->notEmpty('requested_quantity');

        $validator
            ->scalar('stock_quantity')
            ->maxLength('stock_quantity', 255)
            ->requirePresence('stock_quantity', 'create')
            ->notEmpty('stock_quantity');

        $validator
            ->scalar('availability')
            ->maxLength('availability', 255)
            ->requirePresence('availability', 'create')
            ->notEmpty('availability');

        $validator
            ->scalar('status')
            ->maxLength('status', 255)
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->scalar('verified_by')
            ->maxLength('verified_by', 255)
            ->requirePresence('verified_by', 'create')
            ->notEmpty('verified_by');

        $validator
            ->scalar('approved_by')
            ->maxLength('approved_by', 255)
            ->requirePresence('approved_by', 'create')
            ->notEmpty('approved_by');

        $validator
            ->scalar('acknowledged_by')
            ->maxLength('acknowledged_by', 255)
            ->requirePresence('acknowledged_by', 'create')
            ->notEmpty('acknowledged_by');

        $validator
            ->scalar('remark')
            ->maxLength('remark', 255)
            ->requirePresence('remark', 'create')
            ->notEmpty('remark');

        return $validator;
    }
}
