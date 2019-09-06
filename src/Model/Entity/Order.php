<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property string $recipientname
 * @property \Cake\I18n\FrozenTime $orderdate
 * @property string $address
 * @property string $state
 * @property string $postcode
 * @property string $paidstatus
 * @property float $totalprice
 * @property string|null $comments
 * @property int $phone
 *
 * @property \App\Model\Entity\Organisation $organisation
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Variant[] $variants
 */
class Order extends Entity
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
        'customer_id' => true,
        'recipientname' => true,
        'orderdate' => true,
        'address' => true,
        'state' => true,
        'postcode' => true,
        'paidstatus' => true,
        'totalprice' => true,
        'comments' => true,
        'phone' => true,
        'paypal' => true,
        'organisation' => true,
        'customer' => true,
        'variants' => true
    ];
}
