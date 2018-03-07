<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ScnItems Model
 *
 * @property \App\Model\Table\ScnsTable|\Cake\ORM\Association\BelongsTo $Scns
 *
 * @method \App\Model\Entity\ScnItems get($primaryKey, $options = [])
 * @method \App\Model\Entity\ScnItems newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ScnItems[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ScnItems|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ScnItems patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ScnItems[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ScnItems findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ScnItemsTable extends Table
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

        $this->setTable('scn_items');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Scn', [
            'foreignKey' => 'scn_id',
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
            ->scalar('part_no')
            ->maxLength('part_no', 255)
            ->allowEmpty('part_no');

        $validator
            ->scalar('part_desc')
            ->maxLength('part_desc', 255)
            ->allowEmpty('part_desc');

        $validator
            ->scalar('quantity')
            ->maxLength('quantity', 255)
            ->allowEmpty('quantity');

        $validator
            ->scalar('reason')
            ->maxLength('reason', 255)
            ->allowEmpty('reason');

        $validator
            ->scalar('remark')
            ->maxLength('remark', 255)
            ->allowEmpty('remark');

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
        $rules->add($rules->existsIn(['scn_id'], 'Scn'));

        return $rules;
    }
}
