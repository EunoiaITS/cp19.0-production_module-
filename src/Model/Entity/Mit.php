<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Mit Entity
 *
 * @property int $id
 * @property string $po_no
 * @property string $sales_order_no
 * @property string $date
 * @property string $location
 * @property string $part_no
 * @property string $description
 * @property string $used_quantity
 * @property string $requested_quantity
 * @property string $stock_quantity
 * @property string $availability
 * @property string $status
 * @property string $verified_by
 * @property string $approved_by
 * @property string $acknowledged_by
 * @property string $remark
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Mit extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'po_no' => true,
        'sales_order_no' => true,
        'date' => true,
        'location' => true,
        'part_no' => true,
        'description' => true,
        'used_quantity' => true,
        'requested_quantity' => true,
        'stock_quantity' => true,
        'availability' => true,
        'status' => true,
        'verified_by' => true,
        'approved_by' => true,
        'acknowledged_by' => true,
        'remark' => true,
        'created' => true,
        'modified' => true
    ];
}
