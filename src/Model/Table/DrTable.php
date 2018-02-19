<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dr Model
 *
 * @method \App\Model\Entity\Dr get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dr newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Dr[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dr|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dr patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dr[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dr findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DrTable extends Table
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

        $this->setTable('dr');
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
            ->scalar('ps_id')
            ->maxLength('ps_id', 255)
            ->allowEmpty('ps_id');

        $validator
            ->scalar('so_no')
            ->maxLength('so_no', 255)
            ->allowEmpty('so_no');

        $validator
            ->scalar('quantity')
            ->maxLength('quantity', 255)
            ->allowEmpty('quantity');


        return $validator;
    }
}
