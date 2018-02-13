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
        'date' => true,
        'part_no' => true,
        'quantity' => true,
        'description' => true,
        'reason' => true,
        'document' => true,
        'created_by' => true,
        'status' => true,
        'verified_by' => true,
        'remark' => true,
        'approved1_by' => true,
        'approved2_by' => true,
        'approved3_by' => true,
        'approved4_by' => true,
        'approved2_investigation' => true,
        'approved2_reason' => true,
        'approved2_document' => true,
        'approved2_remark' => true,
        'approved3_correction' => true,
        'approved3_reason' => true,
        'approved3_document' => true,
        'approved3_remark' => true,
        'approved4_conclusion' => true,
        'approved4_reason' => true,
        'approved4_document' => true,
        'approved4_remark' => true,
        'created' => true,
        'modified' => true
    ];
}
