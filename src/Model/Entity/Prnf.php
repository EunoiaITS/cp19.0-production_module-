<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Prnf Entity
 *
 * @property int $id
 * @property string $date
 * @property string $part_name
 * @property string $part_no
 * @property string $quantity
 * @property string $description
 * @property string $reason
 * @property string $document
 * @property string $created_by
 * @property string $remark
 * @property string $approved_by
 * @property string $approved2_investigation
 * @property string $approved2_reason
 * @property string $approved2_document
 * @property string $approved2_remark
 * @property string $approved3_correction
 * @property string $approved3_reason
 * @property string $approved3_document
 * @property string $approved3_remark
 * @property string $approved4_conclusion
 * @property string $approved4_reason
 * @property string $approved4_document
 * @property string $approved4_remark
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Prnf extends Entity
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
        'id' => false,
    ];
}
