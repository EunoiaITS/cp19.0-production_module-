<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Wip Entity
 *
 * @property int $id
 * @property string $date
 * @property string $so_no
 * @property string $serial_no
 * @property string $created_by
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\WipSection[] $wip_section
 */
class Wip extends Entity
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
        'so_no' => true,
        'serial_no' => true,
        'created_by' => true,
        'created' => true,
        'modified' => true,
        'wip_section' => true
    ];
}
