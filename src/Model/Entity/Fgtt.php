<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fgtt Entity
 *
 * @property int $id
 * @property string $date
 * @property string $so_no
 * @property string $location
 * @property string $created_by
 * @property string $remark
 * @property string $status
 * @property string $verified_by
 * @property string $approved_by
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Fgtt extends Entity
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
        'location' => true,
        'created_by' => true,
        'remark' => true,
        'status' => true,
        'verified_by' => true,
        'approved_by' => true,
        'created' => true,
        'modified' => true
    ];
}
