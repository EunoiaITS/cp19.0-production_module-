<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * P Entity
 *
 * @property int $id
 * @property string $date
 * @property string $created_by
 * @property string $total
 * @property string $status
 * @property string $remark
 */
class P extends Entity
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
        'created_by' => true,
        'total' => true,
        'status' => true,
        'remark' => true
    ];
}
