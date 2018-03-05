<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PsScheduler Model
 *
 * @property \App\Model\Table\SoItemsTable|\Cake\ORM\Association\BelongsTo $SoItems
 *
 * @method \App\Model\Entity\PsScheduler get($primaryKey, $options = [])
 * @method \App\Model\Entity\PsScheduler newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PsScheduler[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PsScheduler|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PsScheduler patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PsScheduler[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PsScheduler findOrCreate($search, callable $callback = null, $options = [])
 */
class PsSchedulerTable extends Table
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

        $this->setTable('ps_scheduler');
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
            ->scalar('month_year')
            ->maxLength('month_year', 255)
            ->requirePresence('month_year', 'create')
            ->notEmpty('month_year');

        $validator
            ->scalar('actual_plan')
            ->maxLength('actual_plan', 255)
            ->allowEmpty('actual_plan');

        return $validator;
    }
}
