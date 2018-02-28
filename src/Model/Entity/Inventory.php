<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Inventory Entity
 *
 * @property int $id
 * @property string $part_no
 * @property string $part_name
 * @property string $drawing_no
 * @property string $section
 * @property string $uom
 * @property string $current_quantity
 * @property string $zon
 * @property string $rack_no
 * @property string $bin_no
 * @property string $level
 * @property string $min_stock
 * @property string $max_stock
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Inventory extends Entity
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
        'id' =>false
    ];
}
