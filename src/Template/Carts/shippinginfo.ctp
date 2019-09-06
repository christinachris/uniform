<div class="section-heading text-center"></div>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <?= $this->Flash->render() ?>
        <div class="card">
            <?= $this->Form->create('',['url' => ['controller' => 'carts', 'action' => 'placeorder']]); ?>
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
            <div>
            <?php echo $this->Form->submit('Place Order', ['class'=>'btn akame-btn active','style'=>'margin-left:35%']); ?>
            </div>
            <br/>
            </div>
            <?php echo $this->Form->end(); ?>

        </div>
        <br>

    </div>