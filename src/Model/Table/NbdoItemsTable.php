<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NbdoItems Model
 *
 * @property \App\Model\Table\NbdosTable|\Cake\ORM\Association\BelongsTo $Nbdos
 *
 * @method \App\Model\Entity\NbdoItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\NbdoItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\NbdoItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NbdoItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NbdoItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\NbdoItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\NbdoItem findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NbdoItemsTable extends Table
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

        $this->setTable('nbdo_items');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Nbdo', [
            'foreignKey' => 'nbdo_id',
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
            ->requirePresence('part_no', 'create')
            ->notEmpty('part_no');

        $validator
            ->scalar('part_desc')
            ->maxLength('part_desc', 255)
            ->requirePresence('part_desc', 'create')
            ->notEmpty('part_desc');

        $validator
            ->scalar('quantity')
            ->maxLength('quantity', 255)
            ->requirePresence('quantity', 'create')
            ->notEmpty('quantity');

        $validator
            ->scalar('document')
            ->maxLength('document', 255)
            ->allowEmpty('document');

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
        $rules->add($rules->existsIn(['nbdo_id'], 'Nbdo'));

        return $rules;
    }
}
