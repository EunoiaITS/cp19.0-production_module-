<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PsMonthly Model
 *
 * @method \App\Model\Entity\PsMonthly get($primaryKey, $options = [])
 * @method \App\Model\Entity\PsMonthly newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PsMonthly[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PsMonthly|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PsMonthly patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PsMonthly[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PsMonthly findOrCreate($search, callable $callback = null, $options = [])
 */
class PsMonthlyTable extends Table
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

        $this->setTable('ps_monthly');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->scalar('location')
            ->maxLength('location', 255)
            ->requirePresence('location', 'create')
            ->notEmpty('location');

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

        $validator
            ->scalar('total_items')
            ->maxLength('total_items', 255)
            ->requirePresence('total_items', 'create')
            ->notEmpty('total_items');

        $validator
            ->scalar('created_by')
            ->maxLength('created_by', 255)
            ->allowEmpty('created_by');

        $validator
            ->scalar('approval1_by')
            ->maxLength('approval1_by', 255)
            ->allowEmpty('approval1_by');

        $validator
            ->scalar('approval2_by')
            ->maxLength('approval2_by', 255)
            ->allowEmpty('approval2_by');

        $validator
            ->scalar('status')
            ->maxLength('status', 255)
            ->allowEmpty('status');

        $validator
            ->scalar('remark')
            ->maxLength('remark', 255)
            ->allowEmpty('remark');

        return $validator;
    }
}
