<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SerialNumber Entity
 *
 * @property int $id
 * @property string $date
 * @property string $model
 * @property string $version
 * @property string $type1
 * @property string $type2
 * @property string $quantity
 * @property string $created_by
 * @property string $department
 * @property string $section
 * @property string $remark
 * @property string $status
 * @property string $verified_by
 * @property string $approved_by
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class SerialNumber extends Entity
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
        'date' => true,
        'model' => true,
        'version' => true,
        'type1' => true,
        'type2' => true,
        'quantity' => true,
        'created_by' => true,
        'model_code' => true,
        'reject_remark' => true,
        'remark' => true,
        'status' => true,
        'verified_by' => true,
        'approved_by' => true,
        'created' => true,
        'modified' => true
    ];
}
