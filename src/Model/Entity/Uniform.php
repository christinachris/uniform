<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Uniform Entity
 *
 * @property int $_id
 * @property int|null $organisation_id
 * @property string $uniformname
 * @property string $type
 * @property string $uniformdescription
 * @property string $gender
 * @property string|null $heroimagepath
 * @property string|null $sizechartpath
 * @property bool $status
 *
 * @property \App\Model\Entity\Organisation $organisation
 * @property \App\Model\Entity\Picture[] $pictures
 * @property \App\Model\Entity\Variant[] $variants
 */
class Uniform extends Entity
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
        'organisation_id' => true,
        'uniformname' => true,
        'type' => true,
        'uniformdescription' => true,
        'gender' => true,
        'heroimagepath' => true,
        'sizechartpath' => true,
        'status' => true,
        'organisation' => true,
        'pictures' => true,
        'variants' => true
    ];
}
