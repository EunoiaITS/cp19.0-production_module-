<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SerialNumberChild Entity
 *
 * @property int $id
 * @property string $serial_number_id
 * @property string $year
 * @property string $month
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\SerialNumber $serial_number
 */
class SerialNumberChild extends Entity
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
        'serial_number_id' => true,
        'year' => true,
        'month' => true,
        'created' => true,
        'modified' => true,
        'serial_number' => true
    ];
}
