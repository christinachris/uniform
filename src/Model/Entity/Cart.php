<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cart Entity
 *
 * @property int $id
 * @property int $variant_id
 * @property int $customer_id
 * @property int $quantity
 *
 * @property \App\Model\Entity\Variant $variant
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\OrdersVariant[] $orders_variants
 */
class Cart extends Entity
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
        'variant_id' => true,
        'customer_id' => true,
        'quantity' => true,
        'variant' => true,
        'customer' => true,
        'orders_variants' => true
    ];
}
