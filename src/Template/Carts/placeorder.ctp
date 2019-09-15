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

            <?php //echo $this->Form->submit('Confirm & Pay with Paypal', ['class'=>'btn akame-btn active']); ?>

            <script src="https://www.paypal.com/sdk/js?currency=AUD&client-id=AVjXzMtV5nZcy-jFuMojzuETOIXZCpA5nQX0H79GYBDRrvotASDAU26Utl7H1VBIMRDnQycEpKRruXpo"></script>
            <div id="paypal-button-container"></div>
            <script>
                paypal.Buttons({
                    createOrder: function(data, actions) {
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: '<?php echo $sum + $shippingnumber; ?>'
                                }
                            }]
                        });
                    },
                    onApprove: function(data, actions) {

                        return actions.order.capture().then(function(details) {
                            $.ajax({
                                url: '<?php echo $this->Url->build("/Carts/saveorder", true); ?>',

                                headers: {
                                    'X-CSRF-TOKEN':'<?php echo $this->request->getParam("_csrfToken"); ?>',
                                },
                                type: "post",
                                dataType: "json",
                                data: {
                                    orderID:details.id,
                                    status:details.status
                                }
                            });


                            setTimeout(myFunction, 3000);

                            function myFunction() {
                                window.location.href = '<?php echo $this->Url->build("/Carts/orderconfirmed", true); ?>/'+details.id;
                            }

                        });


                    }
                }).render('#paypal-button-container');
            </script>


        </div>
        <?php echo $this->Form->end(); ?>
    </div>

</div>