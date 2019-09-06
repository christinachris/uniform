<div class="card-header">
    <div class="row">
        <div class="col-lg-8 col-md-6 col-sm-4">
            <h3>Order No. <?= h($order->id) ?></h3>
        </div>
        <div class="lg-col-4 btn pull-right">
            <?php echo $this->Html->link('Admin Dashboard', ['controller'=>'Admins', 'action'=>'admindashboard'], ['escape' => false, 'class' => 'btn btn-link']); ?>
        </div>
    </div>
    <div class="row">
    <div class="lg-col-4 btn pull-right">
        <?php echo $this->Html->link('< Back to Orders List', ['controller'=>'Admins', 'action'=>'orderlist'], ['escape' => false, 'class' => 'btn btn-outline-dark']); ?>
    </div>
    </div>
</div>

<div class="section-heading text-center"></div>
<div class="col-md-6 offset-md-3">
    <?= $this->Flash->render() ?>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-sm-4">
                    <h3>Order Details</h3>
                    <?php echo $this->Html->link('Edit Order',
                            ['controller'=>'Admins', 'action'=>'orderedit',$order->id],
                            ['escape' => false, 'class' => 'btn btn-primary']); ?>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="form-group">
                <b style="color: #262261;">Order Number</b>
                <p><?= h($order->id) ?></p>
            </div>
            <div class="form-group">
                <b style="color: #262261;">Order Date</b>
                <p><?= h($order->orderdate) ?></p>
            </div>
            <div class="form-group">
                <b style="color: #262261;">Order Comments</b>
                <p><?= h($order->comments) ?></p>
            </div>
            <div class="form-group">
                <b style="color: #262261;">Shipping Address</b>
                <p><?= h($order->recipientname) ?><br/>
                    <?= h($order->address) ?>
                    <?= h($order->suburb) ?><br/>
                    <?= h($order->state) ?>
                    <?= h($order->postcode) ?>
            </div>
            <div class="form-group">
                <b style="color: #262261;">Contact Phone</b>
                <p> <?= h($order->phone) ?><br/>

            </div>


        </div>
    </div>

    <br>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-sm-4">
                    <h3>Payment Details</h3>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="form-group">
                <b style="color: #262261;">Payment Status</b>
                <p><?= h($order->paidstatus) ?></p>
            </div>
            <div class="form-group">
                <b style="color: #262261;">Payment Amount</b>
                <p>$ <?= h($this->Number->precision($order->totalprice,2)) ?></p>
            </div>
        </div>
    </div>

    <br>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-sm-4">
                    <h3>Order Items</h3>
                </div>
            </div>
        </div>

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
                <?php foreach($orderitems as $orderitem){ ?>
                    <div class="basket-product">
                        <div class="item">
                            <div class="product-details">
                                <h5><strong><span class="item-quantity"><?php echo $orderitem->orderquantity ?></span> x <?php echo $orderitem->orderuniformname; ?></strong></h5>
                                <p><strong> <?php echo $orderitem->ordercolour.', Size '. $orderitem->ordersize; ?></strong></p>
                            </div>
                        </div>
                        <div class="price"><?php echo $this->Number->precision($orderitem->orderprice,2) ?></div>
                        <div class="subtotal"><?php echo $this->Number->precision($orderitem->orderquantity * $orderitem->orderprice,2) ?></div>
                    </div>
                    <?php $sum+= $orderitem->orderquantity * $orderitem->orderprice; ?>
                <?php } ?>
            </div>

            <div class="shipping">
                <div class="shipping-title" style="padding: 10px 10px;">Shipping</div>
                <div class="shipping-value" id="basket-shipping" style="padding: 10px 10px;">10.00</div>
            </div>
            <div class="summary-total">
                <div class="total-title" style="padding: 10px 10px;"><b>Total</b></div>
                <div class="total-value final-value" id="basket-total"style="padding: 10px 10px"><?php echo $this->Number->precision($sum+10,2) ?></div>
            </div>
        </div>


    </div>


</div>