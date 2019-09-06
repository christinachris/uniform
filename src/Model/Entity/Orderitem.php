<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Orderitem Entity
 *
 * @property int $id
 * @property int $order_id
 * @property string $orderuniformname
 * @property float $orderprice
 * @property string $ordercolour
 * @property string $ordersize
 * @property int $orderquantity
 *
 * @property \App\Model\Entity\Order $order
 */
class Orderitem extends Entity
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
        'order_id' => true,
        'orderuniformname' => true,
        'orderprice' => true,
        'ordercolour' => true,
        'ordersize' => true,
        'orderquantity' => true,
        'order' => true
    ];
}
