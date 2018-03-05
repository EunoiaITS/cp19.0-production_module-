<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PsScheduler Entity
 *
 * @property int $id
 * @property string $so_item_id
 * @property string $month_year
 * @property string $actual_plan
 *
 * @property \App\Model\Entity\SoItem $so_item
 */
class PsScheduler extends Entity
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
