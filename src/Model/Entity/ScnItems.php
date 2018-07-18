<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ScnItems Entity
 *
 * @property int $id
 * @property string $scn_id
 * @property string $part_no
 * @property string $part_desc
 * @property string $quantity
 * @property string $reason
 * @property string $remark
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Scn $scn
 */
class ScnItems extends Entity
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
        'id' => false
    ];
}
