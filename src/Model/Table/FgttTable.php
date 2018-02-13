<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fgtt Model
 *
 * @method \App\Model\Entity\Fgtt get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fgtt newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Fgtt[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fgtt|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fgtt patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fgtt[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fgtt findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FgttTable extends Table
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

        $this->setTable('fgtt');
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
            ->scalar('so_no')
            ->maxLength('so_no', 255)
            ->requirePresence('so_no', 'create')
            ->notEmpty('so_no');

        $validator
            ->scalar('location')
            ->maxLength('location', 255)
            ->requirePresence('location', 'create')
            ->notEmpty('location');

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
