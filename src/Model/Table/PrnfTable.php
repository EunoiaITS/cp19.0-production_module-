<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Prnf Model
 *
 * @method \App\Model\Entity\Prnf get($primaryKey, $options = [])
 * @method \App\Model\Entity\Prnf newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Prnf[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Prnf|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Prnf patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Prnf[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Prnf findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PrnfTable extends Table
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

        $this->setTable('prnf');
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
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->scalar('part_name')
            ->maxLength('part_name', 255)
            ->requirePresence('part_name', 'create')
            ->notEmpty('part_name');

        $validator
            ->scalar('part_no')
            ->maxLength('part_no', 255)
            ->requirePresence('part_no', 'create')
            ->notEmpty('part_no');

        $validator
            ->scalar('quantity')
            ->maxLength('quantity', 255)
            ->requirePresence('quantity', 'create')
            ->notEmpty('quantity');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->scalar('reason')
            ->maxLength('reason', 255)
            ->requirePresence('reason', 'create')
            ->notEmpty('reason');

        $validator
            ->scalar('document')
            ->maxLength('document', 255)
            ->requirePresence('document', 'create')
            ->notEmpty('document');

        $validator
            ->scalar('created_by')
            ->maxLength('created_by', 255)
            ->requirePresence('created_by', 'create')
            ->notEmpty('created_by');

        $validator
            ->scalar('remark')
            ->maxLength('remark', 255)
            ->allowEmpty('remark');

        $validator
            ->scalar('approved_by')
            ->maxLength('approved_by', 255)
            ->allowEmpty('approved_by');

        $validator
            ->scalar('approved2_investigation')
            ->maxLength('approved2_investigation', 255)
            ->allowEmpty('approved2_investigation');

        $validator
            ->scalar('approved2_reason')
            ->maxLength('approved2_reason', 255)
            ->allowEmpty('approved2_reason');

        $validator
            ->scalar('approved2_document')
            ->maxLength('approved2_document', 255)
            ->allowEmpty('approved2_document');

        $validator
            ->scalar('approved2_remark')
            ->maxLength('approved2_remark', 255)
            ->allowEmpty('approved2_remark');

        $validator
            ->scalar('approved3_correction')
            ->maxLength('approved3_correction', 255)
            ->allowEmpty('approved3_correction');

        $validator
            ->scalar('approved3_reason')
            ->maxLength('approved3_reason', 255)
            ->allowEmpty('approved3_reason');

        $validator
            ->scalar('approved3_document')
            ->maxLength('approved3_document', 255)
            ->allowEmpty('approved3_document');

        $validator
            ->scalar('approved3_remark')
            ->maxLength('approved3_remark', 255)
            ->allowEmpty('approved3_remark');

        $validator
            ->scalar('approved4_conclusion')
            ->maxLength('approved4_conclusion', 255)
            ->allowEmpty('approved4_conclusion');

        $validator
            ->scalar('approved4_reason')
            ->maxLength('approved4_reason', 255)
            ->allowEmpty('approved4_reason');

        $validator
            ->scalar('approved4_document')
            ->maxLength('approved4_document', 255)
            ->allowEmpty('approved4_document');

        $validator
            ->scalar('approved4_remark')
            ->maxLength('approved4_remark', 255)
            ->allowEmpty('approved4_remark');

        return $validator;
    }
}
