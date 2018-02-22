<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WipSection Entity
 *
 * @property int $id
 * @property string $wip_id
 * @property string $operator_name
 * @property string $supervisor_name
 * @property string $section
 * @property string $status
 * @property string $remark
 * @property string $acknowledged_by
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Wip $wip
 */
class WipSection extends Entity
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
        'wip_id' => true,
        'operator_name' => true,
        'supervisor_name' => true,
        'section' => true,
        'status' => true,
        'remark' => true,
        'acknowledged_by' => true,
        'created' => true,
        'modified' => true,
        'wip' => true
    ];
}
