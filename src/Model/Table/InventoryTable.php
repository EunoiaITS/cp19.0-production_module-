<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Inventory Model
 *
 * @method \App\Model\Entity\Inventory get($primaryKey, $options = [])
 * @method \App\Model\Entity\Inventory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Inventory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Inventory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Inventory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Inventory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Inventory findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InventoryTable extends Table
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

        $this->setTable('inventory');
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
            ->scalar('drawing_no')
            ->maxLength('drawing_no', 255)
            ->allowEmpty('drawing_no');

        $validator
            ->scalar('section')
            ->maxLength('section', 255)
            ->allowEmpty('section');
        $validator
            ->scalar('mit_no')
            ->maxLength('mit_no', 255)
            ->allowEmpty('mit_no');

        $validator
            ->scalar('uom')
            ->maxLength('uom', 255)
            ->allowEmpty('uom');

        $validator
            ->scalar('current_quantity')
            ->maxLength('current_quantity', 255)
            ->allowEmpty('current_quantity');

        $validator
            ->scalar('zon')
            ->maxLength('zon', 255)
            ->allowEmpty('zon');

        $validator
            ->scalar('rack_no')
            ->maxLength('rack_no', 255)
            ->allowEmpty('rack_no');

        $validator
            ->scalar('bin_no')
            ->maxLength('bin_no', 255)
            ->allowEmpty('bin_no');

        $validator
            ->scalar('level')
            ->maxLength('level', 255)
            ->allowEmpty('level');

        $validator
            ->scalar('min_stock')
            ->maxLength('min_stock', 255)
            ->allowEmpty('min_stock');

        $validator
            ->scalar('max_stock')
            ->maxLength('max_stock', 255)
            ->allowEmpty('max_stock');

        return $validator;
    }
}
