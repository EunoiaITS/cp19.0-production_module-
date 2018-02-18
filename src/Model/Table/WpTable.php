<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Wp Model
 *
 * @method \App\Model\Entity\Wp get($primaryKey, $options = [])
 * @method \App\Model\Entity\Wp newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Wp[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Wp|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Wp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Wp[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Wp findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WpTable extends Table
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

        $this->setTable('wp');
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
            ->scalar('model')
            ->maxLength('model', 255)
            ->allowEmpty('model');
        $validator
            ->scalar('version')
            ->maxLength('version', 255)
            ->allowEmpty('version');
        $validator
            ->scalar('wp_no')
            ->maxLength('wp_no', 255)
            ->allowEmpty('wp_no');

        $validator
            ->scalar('wld1_on')
            ->maxLength('wld1_on', 255)
            ->allowEmpty('wld1_on');

        $validator
            ->scalar('wld1_sn')
            ->maxLength('wld1_sn', 255)
            ->allowEmpty('wld1_sn');

        $validator
            ->scalar('wld1_document')
            ->maxLength('wld1_document', 255)
            ->allowEmpty('wld1_document');

        $validator
            ->scalar('mlt_on')
            ->maxLength('mlt_on', 255)
            ->allowEmpty('mlt_on');

        $validator
            ->scalar('mlt_sn')
            ->maxLength('mlt_sn', 255)
            ->allowEmpty('mlt_sn');

        $validator
            ->scalar('mlt_document')
            ->maxLength('mlt_document', 255)
            ->allowEmpty('mlt_document');

        $validator
            ->scalar('dm_on')
            ->maxLength('dm_on', 255)
            ->allowEmpty('dm_on');

        $validator
            ->scalar('dm_sn')
            ->maxLength('dm_sn', 255)
            ->allowEmpty('dm_sn');

        $validator
            ->scalar('dm_document')
            ->maxLength('dm_document', 255)
            ->allowEmpty('dm_document');

        $validator
            ->scalar('vc_on')
            ->maxLength('vc_on', 255)
            ->allowEmpty('vc_on');

        $validator
            ->scalar('vc_sn')
            ->maxLength('vc_sn', 255)
            ->allowEmpty('vc_sn');

        $validator
            ->scalar('vc_document')
            ->maxLength('vc_document', 255)
            ->allowEmpty('vc_document');

        $validator
            ->scalar('wld2_on')
            ->maxLength('wld2_on', 255)
            ->allowEmpty('wld2_on');

        $validator
            ->scalar('wld2_sn')
            ->maxLength('wld2_sn', 255)
            ->allowEmpty('wld2_sn');

        $validator
            ->scalar('wld2_document')
            ->maxLength('wld2_document', 255)
            ->allowEmpty('wld2_document');

        $validator
            ->scalar('bta_on')
            ->maxLength('bta_on', 255)
            ->allowEmpty('bta_on');

        $validator
            ->scalar('bta_sn')
            ->maxLength('bta_sn', 255)
            ->allowEmpty('bta_sn');

        $validator
            ->scalar('bta_document')
            ->maxLength('bta_document', 255)
            ->allowEmpty('bta_document');

        $validator
            ->scalar('mc_on')
            ->maxLength('mc_on', 255)
            ->allowEmpty('mc_on');

        $validator
            ->scalar('mc_sn')
            ->maxLength('mc_sn', 255)
            ->allowEmpty('mc_sn');

        $validator
            ->scalar('mc_document')
            ->maxLength('mc_document', 255)
            ->allowEmpty('mc_document');

        $validator
            ->scalar('wir_on')
            ->maxLength('wir_on', 255)
            ->allowEmpty('wir_on');

        $validator
            ->scalar('wir_sn')
            ->maxLength('wir_sn', 255)
            ->allowEmpty('wir_sn');

        $validator
            ->scalar('wir_document')
            ->maxLength('wir_document', 255)
            ->allowEmpty('wir_document');

        $validator
            ->scalar('test_on')
            ->maxLength('test_on', 255)
            ->allowEmpty('test_on');

        $validator
            ->scalar('test_sn')
            ->maxLength('test_sn', 255)
            ->allowEmpty('test_sn');

        $validator
            ->scalar('test_document')
            ->maxLength('test_document', 255)
            ->allowEmpty('test_document');

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
}
