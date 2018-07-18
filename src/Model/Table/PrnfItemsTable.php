<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PrnfItems Model
 *
 * @property \App\Model\Table\PrnfsTable|\Cake\ORM\Association\BelongsTo $Prnfs
 *
 * @method \App\Model\Entity\PrnfItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\PrnfItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PrnfItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PrnfItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PrnfItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PrnfItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PrnfItem findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PrnfItemsTable extends Table
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

        $this->setTable('prnf_items');
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
            ->scalar('part_no')
            ->maxLength('part_no', 255)
            ->allowEmpty('part_no');

        $validator
            ->scalar('part_name')
            ->maxLength('part_name', 255)
            ->allowEmpty('part_name');

        $validator
            ->scalar('quantity')
            ->maxLength('quantity', 255)
            ->notEmpty('quantity');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmpty('description');

        $validator
            ->scalar('document')
            ->maxLength('document', 255)
            ->allowEmpty('document');

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
}
