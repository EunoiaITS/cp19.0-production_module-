<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WipSection Model
 *
 * @property \App\Model\Table\WipsTable|\Cake\ORM\Association\BelongsTo $Wips
 *
 * @method \App\Model\Entity\WipSection get($primaryKey, $options = [])
 * @method \App\Model\Entity\WipSection newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WipSection[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WipSection|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WipSection patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WipSection[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WipSection findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WipSectionTable extends Table
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

        $this->setTable('wip_section');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Wips', [
            'foreignKey' => 'wip_id',
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
            ->scalar('operator_name')
            ->maxLength('operator_name', 255)
            ->allowEmpty('operator_name');

        $validator
            ->scalar('supervisor_name')
            ->maxLength('supervisor_name', 255)
            ->allowEmpty('supervisor_name');

        $validator
            ->scalar('section')
            ->maxLength('section', 255)
            ->allowEmpty('section');

        $validator
            ->scalar('status')
            ->maxLength('status', 255)
            ->allowEmpty('status');

        $validator
            ->scalar('remark')
            ->maxLength('remark', 255)
            ->allowEmpty('remark');

        $validator
            ->scalar('acknowledged_by')
            ->maxLength('acknowledged_by', 255)
            ->allowEmpty('acknowledged_by');

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
        $rules->add($rules->existsIn(['wip_id'], 'Wips'));

        return $rules;
    }
}
