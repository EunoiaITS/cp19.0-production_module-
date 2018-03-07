<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PsItems Model
 *
 * @property \App\Model\Table\PsTable|\Cake\ORM\Association\BelongsTo $Ps
 *
 * @method \App\Model\Entity\PsItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\PsItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PsItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PsItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PsItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PsItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PsItem findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PsItemsTable extends Table
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

        $this->setTable('ps_items');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Ps', [
            'foreignKey' => 'ps_id',
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
            ->scalar('so_item_no')
            ->maxLength('so_item_no', 255)
            ->notEmpty('so_item_no');

        $validator
            ->scalar('quantity')
            ->maxLength('quantity', 255)
            ->allowEmpty('quantity');

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
        $rules->add($rules->existsIn(['ps_id'], 'Ps'));

        return $rules;
    }
}
