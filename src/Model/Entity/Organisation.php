<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Organisation Entity
 *
 * @property int $_id
 * @property string $organisationname
 * @property string $logopath
 * @property string|null $accesscode
 * @property string|null $bypasscode
 *
 * @property \App\Model\Entity\Uniform[] $uniforms
 */
class Organisation extends Entity
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
        'organisationname' => true,
        'logopath' => true,
        'accesscode' => true,
        'bypasscode' => true,
        'uniforms' => true
    ];
}
