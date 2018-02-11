<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MrItem Entity
 *
 * @property int $id
 * @property string $mr_id
 * @property string $part_no
 * @property string $part_desc
 * @property string $quantity
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Mr $mr
 */
class MrItem extends Entity
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
        'mr_id' => true,
        'part_no' => true,
        'part_desc' => true,
        'quantity' => true,
        'created' => true,
        'modified' => true,
        'mr' => true
    ];
}
