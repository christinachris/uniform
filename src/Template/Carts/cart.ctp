<div>
    <?= $this->Flash->render() ?>
</div>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Basket</title>
</head>

<body class="cartbody">
<main class="cartmain">
    <div class="basket">
        <div class="basket-labels">
            <ul class="cartlabel">
                <li class="item item-heading">Item</li>
                <li class="price">Price</li>
                <li class="quantity">Quantity</li>
                <li class="subtotal">Subtotal</li>
            </ul>
        </div>
        <?php $sum=0; ?>
        <?php foreach($products as $product){ ?>
        <div class="basket-product">
            <div class="item">
                <div class="product-image">
                    <!--<?php var_dump($product['variant']); ?>-->
                    <?php echo $this->Html->image("../files/uniforms/heroimagepath/{$product['variant']['uniform']->heroimagepath}")?>
                </div>
                <div class="product-details">
                    <h5><strong><span class="item-quantity"><?php echo $product->quantity ?></span> x <?php echo $product['variant']['uniform']->uniformname; ?></strong></h5>
                    <p><strong> <?php echo $product['variant']->colour.', Size '. $product['variant']->size; ?></strong></p>
                </div>
            </div>
            <div class="price"><?php echo $this->Number->precision($product['variant']->price,2) ?></div>
            <div class="quantity">
                <?= $this->Form->create(null, ['url' => ['controller' => 'carts', 'action' => 'update' , $product->id]]);?>
                <fieldset>
                 <?=  $this->Form->text('quantity', ['class' => 'quantity-field','type' => 'number', 'value' =>$product->quantity]);?>
                <br><br>
                </fieldset>
                <?= $this->Form->submit(__('Update'),['class' => 'btn-sm btn-info'])?>
                <?= $this->Form->end() ?>
            </div>
            <div class="subtotal"><?php echo $this->Number->precision($product->quantity * $product['variant']->price,2) ?></div>
            <div class="remove">
                <?= $this->Html->link(__('Remove'), ['action' => 'remove', $product->id], ['class'=>'btn-link'], ['confirm' => __('Are you sure you want to remove this item from your cart?')]) ?>
            </div>
        </div>
        <?php $sum+= $product->quantity * $product['variant']->price; ?>
        <?php } ?>
    </div>
    <aside class="order-2">
        <div class="summary">
            <div class="summary-total-items"><span class="total-items"></span> Items in your Cart</div>
            <div class="summary-subtotal">
                <div class="subtotal-title">Subtotal</div>
                <div class="subtotal-value final-value" id="basket-subtotal"><?php echo $this->Number->precision($sum,2) ?></div>
            </div>
            <div class="shipping">
                <div class="shipping-title">Shipping</div>
                <div class="shipping-value" id="basket-shipping"><?php echo $this->Number->precision($shippingnumber,2) ?></div>
            </div>

            <div class="summary-total">
                <div class="total-title">Total</div>
                <div class="total-value final-value" id="basket-total"><?php echo $this->Number->precision($sum+$shippingnumber,2) ?></div>
            </div>
            <div class="summary-checkout">
                <?php echo $this->Html->link('Checkout','/carts/shippinginfo',['class' => 'btn akame-btn active checkout-cta']);?>
            </div>
            <br><br>

            <div class="shipping">
                <?= $this->Html->link("Bypass Checkout", ['controller'=>'checkout','action' => 'bypasscheckout'], ['class' => 'logintext logintext:active']); ?>
                <br>
               Enter a valid code to bypass the online checkout, submit your order and receive an invoice later.
            </div>

        </div>
    </aside>
</main>
</body>

</html>