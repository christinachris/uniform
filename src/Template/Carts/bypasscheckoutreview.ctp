<div class="section-heading text-center"></div>
<div class="row">
<div class="col-md-6 offset-md-3">
    <?= $this->Flash->render() ?>
    <div class="card">
        <?= $this->Form->create('',['url' => ['controller' => 'carts', 'action' => 'placeByPassOrder']]); ?>
        <h3 class="card-header">Shipping address</h3>
        <div class="card-body">

            <div class="form-group">
                <label>Name<span class="required">*</span></label><?php echo $this->Form->name('name', ['class'=>'form-control', 'required']) ?>
            </div>
            <div class="form-group">
                <label>Email<span class="required">*</span></label><?php echo $this->Form->text('email', ['class'=>'form-control', 'required', 'type'=>'email']) ?>
            </div>
            <div class="form-group">
                <label>Phone<span class="required">*</span></label><?php echo $this->Form->phone('phone', ['class'=>'form-control', 'required']) ?>
            </div>
            <div class="form-group">
                <label>Address<span class="required">*</span></label><?php echo $this->Form->address('address', ['class'=>'form-control', 'required']) ?>
            </div>
            <div class="form-group">
                <label>Suburb<span class="required">*</span></label><?php echo $this->Form->suburb('suburb', ['class'=>'form-control', 'required']) ?>
            </div>
            <div class="form-group">
                <label>Postcode<span class="required">*</span></label><?php echo $this->Form->postcode('postcode', ['class'=>'form-control', 'required']) ?>
            </div>
            <div class="form-group">
                <label>State<span class="required">*</span></label><?php echo $this->Form->state('state', ['class'=>'form-control', 'required']) ?>
            </div>
            <div class="form-group">
                <label>Order Comments</label><?php echo $this->Form->comments('comments', ['class'=>'form-control']) ?>
            </div>

        </div>
    </div>
    <br>

</div>

<div class="col-md-6 offset-md-3">
    <div class="card">
        <h3 class="card-header">Order Summary</h3>
        <div class="card-body">
            <div class="basket" style="width: 100%; padding: 0;">
                <div class="basket-labels">
                    <ul class="cartlabel">
                        <li class="item item-heading">Item</li>
                        <li class="price">Price</li>
                        <li class="subtotal">Subtotal</li>
                    </ul>
                </div>
                <?php $sum=0; ?>
                <?php foreach($products as $product){ ?>
                <div class="basket-product">
                    <div class="item">
                        <div class="product-details">
                            <h5><strong><span class="item-quantity"><?php echo $product->quantity ?></span> x <?php echo $product['variant']['uniform']->uniformname; ?></strong></h5>
                            <p><strong> <?php echo $product['variant']->colour.', Size '. $product['variant']->size; ?></strong></p>
                        </div>
                    </div>
                    <div class="price"><?php echo $this->Number->precision($product['variant']->price,2) ?></div>
                    <div class="subtotal"><?php echo $this->Number->precision($product->quantity * $product['variant']->price,2) ?></div>
                </div>
                <?php $sum+= $product->quantity * $product['variant']->price; ?>
                <?php } ?>
            </div>

            <div class="summary-subtotal">
                <div class="subtotal-title" style="padding: 5px 10px;">Subtotal</div>
                <div class="subtotal-value final-value" id="basket-subtotal" style="padding: 5px 10px;"><?php echo $this->Number->precision($sum,2) ?></div>
            </div>

            <div class="shipping">
                <div class="shipping-title" style="padding: 10px 10px;">Shipping</div>
                <div class="shipping-value" id="basket-shipping" style="padding: 10px 10px;"><?php echo $this->Number->precision($shippingnumber,2) ?></div>
            </div>
            <div class="summary-total">
                <div class="total-title" style="padding: 10px 10px;"><b>Total</b></div>
                <div class="total-value final-value" id="basket-total" style=" padding: 10px 10px;"><?php echo $this->Number->precision($sum+$shippingnumber,2) ?></div>
            </div>
            <br>



            <?php echo $this->Form->submit('Confirm Order', ['class'=>'btn akame-btn active','style'=>'margin-left:35%']); ?>
            <?php echo $this->Form->end(); ?>

        </div>
    </div>

</div>
