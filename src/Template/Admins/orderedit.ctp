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
            <?php echo $this->Html->link('< Cancel Edit', ['controller'=>'Admins', 'action'=>'orderdetails', $order->id], ['escape' => false, 'class' => 'btn btn-outline-dark']); ?>
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
                </div>
            </div>
        </div>
        <?= $this->Form->create($order,['url' => ['controller' => 'admins', 'action' => 'orderedit']]); ?>
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
                <p><?php echo $this->Form->comments('comments', ['class'=>'form-control']) ?></p>
            </div>
            <div class="form-group">
                <b style="color: #262261;">Shipping Address</b>
                <p><?php echo $this->Form->recipientname('recipientname', ['class'=>'form-control','required']) ?><br/>
                <?php echo $this->Form->address('address', ['class'=>'form-control','required']) ?><br/>
                <?php echo $this->Form->suburb('suburb', ['class'=>'form-control','required']) ?><br/>
                <?php echo $this->Form->state('state', ['class'=>'form-control','required']) ?><br/>
                <?php echo $this->Form->postcode('postcode', ['class'=>'form-control','required']) ?><br/>

            </div>
            <div class="form-group">
                <b style="color: #262261;">Contact Phone</b>
                <p> <?php echo $this->Form->phone('phone', ['class'=>'form-control','required']) ?><br/><br/>

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
                <p><?php echo $this->Form->paidstatus('paidstatus', ['class'=>'form-control','required']) ?></p>
            </div>
            <div class="form-group">
                <b style="color: #262261;">Payment Amount</b>
                <p>$ <?= h($this->Number->precision($order->totalprice,2)) ?></p>
            </div>

            <?php echo $this->Form->submit('Save', ['class'=>'btn btn-outline-success btn-block']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>

    <br>



</div>