<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Wp Entity
 *
 * @property int $id
 * @property string $date
 * @property string $so_no
 * @property string $serial_no
 * @property string $wld1_on
 * @property string $wld1_sn
 * @property string $wld1_document
 * @property string $mlt_on
 * @property string $mlt_sn
 * @property string $mlt_document
 * @property string $dm_on
 * @property string $dm_sn
 * @property string $dm_document
 * @property string $vc_on
 * @property string $vc_sn
 * @property string $vc_document
 * @property string $wld2_on
 * @property string $wld2_sn
 * @property string $wld2_document
 * @property string $bta_on
 * @property string $bta_sn
 * @property string $bta_document
 * @property string $mc_on
 * @property string $mc_sn
 * @property string $mc_document
 * @property string $wir_on
 * @property string $wir_sn
 * @property string $wir_document
 * @property string $test_on
 * @property string $test_sn
 * @property string $test_document
 * @property string $status
 * @property string $remark
 * @property string $acknowledged_by
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Wp extends Entity
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
        'model' => true,
        'version' => true,
        'wp_no' => true,
        'wld1_on' => true,
        'wld1_sn' => true,
        'wld1_document' => true,
        'mlt_on' => true,
        'mlt_sn' => true,
        'mlt_document' => true,
        'dm_on' => true,
        'dm_sn' => true,
        'dm_document' => true,
        'vc_on' => true,
        'vc_sn' => true,
        'vc_document' => true,
        'wld2_on' => true,
        'wld2_sn' => true,
        'wld2_document' => true,
        'bta_on' => true,
        'bta_sn' => true,
        'bta_document' => true,
        'mc_on' => true,
        'mc_sn' => true,
        'mc_document' => true,
        'wir_on' => true,
        'wir_sn' => true,
        'wir_document' => true,
        'test_on' => true,
        'test_sn' => true,
        'test_document' => true,
        'status' => true,
        'remark' => true,
        'acknowledged_by' => true,
        'created' => true,
        'modified' => true
    ];
}
