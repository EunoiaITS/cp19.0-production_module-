<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PsMonthly Entity
 *
 * @property int $id
 * @property string $date
 * @property string $location
 * @property string $year
 * @property string $month
 * @property string $total_items
 * @property string $created_by
 * @property string $approval1_by
 * @property string $approval2_by
 * @property string $status
 * @property string $remark
 */
class PsMonthly extends Entity
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
        '*' => true,
        'id'=> false
    ];
}
