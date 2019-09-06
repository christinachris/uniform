<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Variant Entity
 *
 * @property int $_id
 * @property int $uniform_id
 * @property string $colour
 * @property string $size
 * @property float $price
 *
 * @property \App\Model\Entity\Uniform $uniform
 */
class Variant extends Entity
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
        'uniform_id' => true,
        'colour' => true,
        'size' => true,
        'price' => true,
        'uniform' => true
    ];
}
