<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Nbdo Model
 *
 * @property \App\Model\Table\NbdoItemsTable|\Cake\ORM\Association\HasMany $NbdoItems
 *
 * @method \App\Model\Entity\Nbdo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Nbdo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Nbdo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Nbdo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Nbdo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Nbdo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Nbdo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NbdoTable extends Table
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

        $this->setTable('nbdo');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('NbdoItems', [
            'foreignKey' => 'nbdo_id'
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
            ->scalar('date')
            ->maxLength('date', 255)
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->scalar('cust_name')
            ->maxLength('cust_name', 255)
            ->requirePresence('cust_name', 'create')
            ->notEmpty('cust_name');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->allowEmpty('address');

        $validator
            ->scalar('contact_person')
            ->maxLength('contact_person', 255)
            ->allowEmpty('contact_person');

        $validator
            ->scalar('contact_no')
            ->maxLength('contact_no', 255)
            ->requirePresence('contact_no', 'create')
            ->notEmpty('contact_no');

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
