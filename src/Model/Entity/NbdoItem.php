<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * NbdoItem Entity
 *
 * @property int $id
 * @property string $nbdo_id
 * @property string $part_no
 * @property string $part_desc
 * @property string $quantity
 * @property string $document
 * @property string $remark
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Nbdo $nbdo
 */
class NbdoItem extends Entity
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
        'nbdo_id' => true,
        'part_no' => true,
        'part_desc' => true,
        'quantity' => true,
        'document' => true,
        'remark' => true,
        'created' => true,
        'modified' => true,
        'nbdo' => true
    ];
}
