<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StockOut Entity
 *
 * @property int $id
 * @property string $date
 * @property string $part_no
 * @property string $part_name
 * @property string $mit_no
 * @property string $tender_no
 * @property string $quantity
 * @property string $pic_store
 * @property string $trans_code
 */
class StockOut extends Entity
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
