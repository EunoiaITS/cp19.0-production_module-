<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Wip Model
 *
 * @property \App\Model\Table\WipSectionTable|\Cake\ORM\Association\HasMany $WipSection
 *
 * @method \App\Model\Entity\Wip get($primaryKey, $options = [])
 * @method \App\Model\Entity\Wip newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Wip[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Wip|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Wip patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Wip[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Wip findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WipTable extends Table
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

        $this->setTable('wip');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('WipSection', [
            'foreignKey' => 'wip_id'
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
            ->allowEmpty('date');

        $validator
            ->scalar('so_no')
            ->maxLength('so_no', 255)
            ->allowEmpty('so_no');

        $validator
            ->scalar('serial_no')
            ->maxLength('serial_no', 255)
            ->allowEmpty('serial_no');

        $validator
            ->scalar('created_by')
            ->maxLength('created_by', 255)
            ->allowEmpty('created_by');

        return $validator;
    }
}
