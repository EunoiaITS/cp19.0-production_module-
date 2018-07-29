<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StockOut Model
 *
 * @method \App\Model\Entity\StockOut get($primaryKey, $options = [])
 * @method \App\Model\Entity\StockOut newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StockOut[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StockOut|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StockOut patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StockOut[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StockOut findOrCreate($search, callable $callback = null, $options = [])
 */
class StockOutTable extends Table
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

        $this->table('stock_out');
        $this->displayField('id');
        $this->primaryKey('id');
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
            ->notEmpty('date', 'date field is required!');

        $validator
            ->notEmpty('part_no', 'part no field is required!');

        $validator
            ->notEmpty('part_name', 'part name field is required!');

        $validator
            ->notEmpty('mit_no', 'mit no field is required!');

        $validator
            ->allowEmpty('tender_no');

        $validator
            ->notEmpty('prn_no', 'prn no field is required!');

        $validator
            ->notEmpty('pr_no', 'pr no field is required!');

        $validator
            ->integer('quantity', 'Quantity should be numeric!')
            ->notEmpty('quantity', 'quantity field is required!');

        $validator
            ->notEmpty('pic_store', 'pic store field is required!');

        $validator
            ->notEmpty('so_no', 'so no field is required!');

        $validator
            ->notEmpty('section', 'section field is required!');

        return $validator;
    }
}
